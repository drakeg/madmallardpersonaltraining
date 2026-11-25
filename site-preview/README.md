# Website preview

Original Creative Studio concept: Taste visual direction, MengTo implementation, Owl accessibility. No external assets or dependencies. Existing website files remain untouched.

## Local preview
From repository root: `python3 -m http.server 8097 --bind 0.0.0.0 --directory site-preview`. Open http://localhost:8097 or the host LAN IP. No paid hosting required.

## Sprint 1 acceptance
- Responsive layout at 390, 768, 1024 and 1440 px; keyboard navigation and focus; FAQ; required fields and inquiry preview.
- Browser tests pending. No real inquiry submission or persistence.

## Backlog
- Confirm official logo, contact address, service formats, credentials, pricing, privacy notice and existing hosting configuration.
- Connect and verify actual inquiry delivery; do not collect health information.
- Test browser workflow and accessibility, then deploy to approved free host where supported.
- Inspect root stack and workflows before adding verified README badges or replacing existing website.

## Cloudflare Workers preview
Worker: `madmallardpersonaltraining`. URL: https://madmallardpersonaltraining.greg-202.workers.dev/. Repository root is the build root; no build command is needed; deploy command `npx wrangler deploy`. The root Wrangler config serves only site-preview, excludes Markdown via .assetsignore, and returns a custom 404. Do not attach the production domain. Preview is public, not an authenticated staging site. Search indexing is discouraged, not guaranteed blocked.

Verify after merge: homepage, unknown URL returns 404, robots.txt, X-Robots-Tag, mobile layout, keyboard navigation and inquiry behavior. Verify Cloudflare build commit matches main. Dashboard Git connection and actual deployment are not independently verified.
