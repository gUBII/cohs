# CONTX_Repo_Map
Legend: <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> <span style="background:#2ca02c;color:#fff;padding:2px 6px;border-radius:4px">DATA</span> <span style="background:#ff7f0e;color:#fff;padding:2px 6px;border-radius:4px">API</span> <span style="background:#9467bd;color:#fff;padding:2px 6px;border-radius:4px">UI</span> <span style="background:#d62728;color:#fff;padding:2px 6px;border-radius:4px">RISK</span>.

## Birds-eye
- Total top-level folders scanned: 35; heavy ones `media` (2769 files) and `theme-1` (2689 files) carry most UI/media weight.
- Application style: classic PHP includes with cookie-driven multi-tenant DB selection, no modern framework; routing is querystring driven (e.g., `index.php?url=modules/<page>.php`).

## Top-level folders
- <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> api/ (42 files) - Xero payroll sync flow (`xero_auth.php`, `xero_refresh.php`, token JSON, CSV exports).
- <span style="background:#ff7f0e;color:#fff;padding:2px 6px;border-radius:4px">API</span> call/ (7 files) - Twilio voice bridge (`make_call.php`, `twiml.xml`, upload/). Credentials in plain PHP.
- <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> chatbot/ (4 files) - iframe chatbot UI (`bot.php`, `message.php`) with custom CSS.
- <span style="background:#9467bd;color:#fff;padding:2px 6px;border-radius:4px">UI</span> css/ (200) - Compiled vendor CSS, Select2, Bootstrap, theme overrides.
- <span style="background:#9467bd;color:#fff;padding:2px 6px;border-radius:4px">UI</span> js/ (479) - Vendor + app scripts; `scripts.php` loads many (jQuery 3.7.1, Bootstrap, DataTables, Chart.js, Select2, Intro.js, html2canvas, jsPDF).
- <span style="background:#9467bd;color:#fff;padding:2px 6px;border-radius:4px">UI</span> assets/ (40) & theme-1/ (2689) - UI images, icons, animations; `theme-1` bundles full Acorn-like admin theme variant.
- <span style="background:#9467bd;color:#fff;padding:2px 6px;border-radius:4px">UI</span> font/, icon/, images/, img/ - font icon sets, logos, favicons, misc imagery (img/ has 127 items).
- <span style="background:#2ca02c;color:#fff;padding:2px 6px;border-radius:4px">DATA</span> media/ (2769) - user-uploaded or sample media; check for PII before sharing.
- <span style="background:#2ca02c;color:#fff;padding:2px 6px;border-radius:4px">DATA</span> uploads/ (9) & upload/ (empty) & temp_uploads/ (1) - user uploads/temp.
- <span style="background:#2ca02c;color:#fff;padding:2px 6px;border-radius:4px">DATA</span> database_backup/ (100) - SQL dumps/backups; watch for credentials/PII.
- <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> modules/ (453) - primary feature pages loaded via `index.php?url=`; see `CONTX_Modules_Index.md`.
- <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> main-files/ (789) - additional feature PHP/HTML, likely legacy or alternate layouts.
- <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> tools/ (579) - static HTML demo set (doctor/patient templates etc.) with its own assets.
- <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> gpt/ (19) - mini accounting app with its own DB config (`gpt/config/db.php`).
- <span style="background:#ff7f0e;color:#fff;padding:2px 6px;border-radius:4px">API</span> gmail/ (5) - Gmail OAuth tokens (`token.json`), `gmail.php` helper.
- <span style="background:#ff7f0e;color:#fff;padding:2px 6px;border-radius:4px">API</span> voice_search/ (22) - stored WebM audio captures from voice search.
- <span style="background:#ff7f0e;color:#fff;padding:2px 6px;border-radius:4px">API</span> PHPMailer/ & vendor/ (67) - PHPMailer library vendored twice; `vendor/send_email.php` helper.
- <span style="background:#d62728;color:#fff;padding:2px 6px;border-radius:4px">RISK</span> cache/, logs/ - runtime artifacts; confirm before cleaning.
- <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> working-files/, updated-files/, testrun/, test/, excel/, import_data/, json/, flow/, sass/ - utility or staging directories for specific workflows.

## Key root PHP entry points (non-module)
- <span style="background:#d62728;color:#fff;padding:2px 6px;border-radius:4px">RISK</span> include.php / include_main.php / include_sub.php / include_general.php - MySQL connections with hardcoded credentials; include `mainurl` + multi-tenant cookie logic.
- <span style="background:#d62728;color:#fff;padding:2px 6px;border-radius:4px">RISK</span> authenticator.php / reg_security.php / security.php - auth checks, cookie handling.
- <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> index.php - primary router with mobile footer, modals, AI sidebar, `url` param to `modules/` files; requires `userid` cookie else redirects to `login.php`.
- <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> app.php - secondary router defaulting to `modules/ndis_dashboard.php`.
- <span style="background:#ff7f0e;color:#fff;padding:2px 6px;border-radius:4px">API</span> ai_wizard*.php - AI-assisted project wizard; pulls records from `ai_wizard` table, assigns workers.
- <span style="background:#ff7f0e;color:#fff;padding:2px 6px;border-radius:4px">API</span> bot.php / chatbot/message.php - chat bot iframe content.
- <span style="background:#ff7f0e;color:#fff;padding:2px 6px;border-radius:4px">API</span> call/make_call.php - Twilio outbound call using `twiml.xml` at fufoon.com.
- <span style="background:#ff7f0e;color:#fff;padding:2px 6px;border-radius:4px">API</span> api/xero/*.php - OAuth + sync for Xero: authorize (`xero_auth.php`), refresh, fetch employees/earning rates, sync, CSV exports.
- <span style="background:#ff7f0e;color:#fff;padding:2px 6px;border-radius:4px">API</span> gmail/gmail.php - Gmail API access using `token.json`.
- <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> gpt/index.php - accounting dashboard linking to accounts/journal/ledger pages backed by `gpt_accounts` DB.
- <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> numerous processors/importers: `dataprocessor*.php`, `documentsprocessor.php`, `invoiceprocessor*.php`, `importer_*`, `workspace_*_processor.php` etc. handle form submissions/AJAX writes.

## Data/credential touchpoints
- DB creds repeated as `('localhost','saas','Bangladesh$$786', <dbname>)` and variants (root in `include_sub.php`, `gpt/config/db.php`).
- OpenAI secret in `index.php` JS fetch (sk-proj-... hardcoded).
- Twilio SID/token in `call/make_call.php`.
- Gmail token and Xero tokens stored as JSON under `api/xero/` and `gmail/`.

## Multi-tenant behavior
- Cookie `dbname` selects tenant DB; `include.php` wires `$conn` accordingly and enforces subscription (checks `subscription` table in master `saas`).
- Cookie `userid` gates access; absence triggers redirect to `login.php` which flushes all cookies.
- `mainurl` hardcoded to `https://nexis365.com/cohs` (index) or `/saas` (app.php); breakpoints for mobile view toggles via `$sourcefrom` cookie.

## Visual/system assets
- `head.php` loads Google Fonts (Nunito Sans, Montserrat), Bootstrap, OverlayScrollbars, Select2, DataTables, Plyr, Intro.js; meta tags abundant for SEO/social.
- `theme_bar.php`, `theme_color.php`, `theme_layout.php` manage UI theme switches.
- `assets/voice-script*.js`, `voice_data.php`, `voice_search/` tie into speech features.

## Housekeeping flags
- Credentials and tokens are committed-treat repo as sensitive; rotate secrets before deploying.
- Paths assume hosting at `/cohs`; for local dev adjust `$mainurl` / `$dirurl` or set virtual host alias to match.

