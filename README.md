# Mad Mallard Personal Training

[![Preview CI](https://github.com/drakeg/madmallardpersonaltraining/actions/workflows/personal-training-preview.yml/badge.svg)](https://github.com/drakeg/madmallardpersonaltraining/actions/workflows/personal-training-preview.yml) [![HTML](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML) [![CSS](https://img.shields.io/badge/CSS-1572B6?logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS) [![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript) [![Cloudflare Workers](https://img.shields.io/badge/Cloudflare%20Workers-F38020?logo=cloudflare&logoColor=white)](https://developers.cloudflare.com/workers/)

Static personal training website. No WordPress, PHP, database or npm runtime dependencies. The sole active application is `site/`; Cloudflare serves this directory through the root Wrangler configuration.

[Cloudflare testing website](https://madmallardpersonaltraining.greg-202.workers.dev/)

Run `python3 -m http.server 8097 --bind 0.0.0.0 --directory site` for LAN testing. Run `python3 site/tests/check_preview.py` and `node --check site/inquiry.js` for validation. Cloudflare deploy: `npx wrangler deploy`; branch previews: `npx wrangler preview`. No paid services required within free-tier limits. Inquiry preparation is local-only; no delivery yet.
