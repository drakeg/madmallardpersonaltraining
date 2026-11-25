from html.parser import HTMLParser
from pathlib import Path
import unittest
import json

ROOT = Path(__file__).resolve().parents[1]
class Page(HTMLParser):
    def __init__(self):
        super().__init__()
        self.ids = []
        self.labels = []
        self.anchors = []
        self.scripts = []
        self.goals = []
    def handle_starttag(self, tag, attrs):
        a = dict(attrs)
        if "id" in a: self.ids.append(a["id"])
        if tag == "label": self.labels.append(a.get("for"))
        if tag == "a" and a.get("href", "").startswith("#") and a["href"] != "#": self.anchors.append(a["href"][1:])
        if tag == "script" and "src" in a: self.scripts.append(a["src"])
        if "data-goal" in a: self.goals.append(a["data-goal"])

class PreviewTests(unittest.TestCase):
    def test_navigation_and_forms(self):
        page = Page()
        page.feed((ROOT / "index.html").read_text())
        self.assertEqual(len(page.ids), len(set(page.ids)))
        self.assertTrue(set(page.anchors + page.labels) <= set(page.ids))
        self.assertTrue({"goal", "experience", "equipment", "schedule", "inquiry", "download", "result"} <= set(page.ids))
        self.assertEqual(len(page.goals), 3)
        for src in page.scripts: self.assertTrue((ROOT / src).is_file())
    def test_preview_config(self):
        config = json.loads((ROOT.parent / "wrangler.jsonc").read_text())
        self.assertEqual(config["assets"]["directory"], "./site-preview")
        self.assertEqual(config["assets"]["not_found_handling"], "404-page")
        self.assertIn("X-Robots-Tag: noindex", (ROOT / "_headers").read_text())
        self.assertIn("Disallow: /", (ROOT / "robots.txt").read_text())
        self.assertTrue((ROOT / "404.html").is_file())
        self.assertIn("tests/", (ROOT / ".assetsignore").read_text())

if __name__ == "__main__":
    unittest.main()
