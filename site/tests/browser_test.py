import unittest
from pathlib import Path
from functools import partial
from http.server import ThreadingHTTPServer, SimpleHTTPRequestHandler
from threading import Thread
from playwright.sync_api import sync_playwright

ROOT = Path(__file__).resolve().parents[1]

class BrowserTests(unittest.TestCase):
    @classmethod
    def setUpClass(cls):
        cls.server = ThreadingHTTPServer(("127.0.0.1", 0), partial(SimpleHTTPRequestHandler, directory=str(ROOT)))
        cls.thread = Thread(target=cls.server.serve_forever, daemon=True)
        cls.thread.start()
        cls.url = f"http://127.0.0.1:{cls.server.server_port}/"
        cls.playwright = sync_playwright().start()
        cls.browser = cls.playwright.chromium.launch()

    @classmethod
    def tearDownClass(cls):
        cls.browser.close()
        cls.playwright.stop()
        cls.server.shutdown()
        cls.server.server_close()
        cls.thread.join()

    def test_responsive_assets_and_navigation(self):
        for width in (390, 768, 1024, 1440):
            with self.subTest(width=width):
                page = self.browser.new_page(viewport={"width": width, "height": 900}, reduced_motion="reduce")
                errors = []
                page.on("pageerror", lambda error: errors.append(str(error)))
                try:
                    response = page.goto(self.url)
                    self.assertEqual(response.status, 200)
                    self.assertTrue(page.locator("h1").is_visible())
                    self.assertTrue(page.evaluate("Array.from(document.images).every(i => i.complete && i.naturalWidth > 0)"))
                    self.assertTrue(page.evaluate("document.documentElement.scrollWidth <= window.innerWidth"))
                    page.keyboard.press("Tab")
                    self.assertEqual(page.evaluate("document.activeElement.className"), "skip")
                    page.keyboard.press("Enter")
                    self.assertTrue(page.url.endswith("#main"))
                    page.locator('nav a[href="#resources"]').click()
                    self.assertTrue(page.url.endswith("#resources"))
                    page.locator('details summary').first.click()
                    self.assertTrue(page.locator('details').first.get_attribute("open") is not None)
                    self.assertEqual(errors, [])
                finally:
                    page.close()

    def test_consultation_workflow(self):
        page = self.browser.new_page(viewport={"width":390,"height":844}, accept_downloads=True, reduced_motion="reduce")
        try:
            page.goto(self.url)
            page.locator('[data-goal="Build strength"]').click()
            self.assertEqual(page.locator("#goal").input_value(), "Build strength")
            page.get_by_role("button", name="Prepare inquiry").click()
            self.assertFalse(page.locator("#download").is_visible())
            page.locator("#experience").select_option(label="Beginner")
            page.locator("#equipment").select_option(label="Gym access")
            page.locator("#schedule").select_option(label="1–2 days")
            page.get_by_role("button", name="Prepare inquiry").click()
            self.assertIn("Build strength", page.locator("#result").inner_text())
            with page.expect_download() as download:
                page.get_by_role("button", name="Save inquiry").click()
            self.assertIn("Build strength", Path(download.value.path()).read_text(encoding="utf-8"))
            page.locator("#schedule").select_option(label="3–4 days")
            self.assertFalse(page.locator("#download").is_visible())
            page.get_by_role("button", name="Prepare inquiry").click()
            page.get_by_role("button", name="Start over").click()
            self.assertEqual(page.locator("#goal").input_value(), "")
            self.assertFalse(page.locator("#download").is_visible())
        finally:
            page.close()

if __name__ == "__main__":
    unittest.main()
