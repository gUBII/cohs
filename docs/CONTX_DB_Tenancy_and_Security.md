# CONTX_DB_Tenancy_and_Security
Legend: <span style="background:#d62728;color:#fff;padding:2px 6px;border-radius:4px">RISK</span> <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> <span style="background:#2ca02c;color:#fff;padding:2px 6px;border-radius:4px">DATA</span>.

## Connection strategy (multi-tenant)
- include.php: detects current script via `$_SERVER['PHP_SELF']` and cookies. If on `/cohs/index.php` and cookie `dbname` is set, it connects to tenant DB (`mysqli('localhost','saas','Bangladesh$$786', $_COOKIE['dbname'])`) and also to master DB `saas` to check subscription table.
- login/register pages connect only to master `saas`.
- include_sub.php: alternate connector using MySQL root user for tenant DB when cookie present.
- include_main.php and include_general.php: fixed connections to master DBs `saas` and `saas_maeynuor_gmail_com` respectively.

## Cookie contract
- `userid` (required) and `dbname` (tenant selector) drive access. Missing cookies force redirect to logout/login.
- `sourcefrom` toggles APP vs DESKTOP view; influences mobile footer.
- `sortset`, `viewset`, `track`, `assistant`, etc. used for UI preferences and walkthroughs.

## Subscription enforcement
- include.php queries master `saas.subscription` for the current `cid` (dbname) to enforce plan and expiry. If inactive, it redirects to `subscription-plans.php` via auto-submitted form.

## Sensitive hardcoded secrets
- DB credentials: user `saas` pass `Bangladesh$$786` (and `root` variant) across include*.php and dbcon.php.
- OpenAI API key in index.php JS fetch (publicly exposed to browser).
- Twilio SID/token in call/make_call.php.
- Xero tokens stored as JSON in api/xero/; Gmail token in gmail/token.json.

## Security concerns
- `url` parameter directly included (`include $url;`) in index.php; without whitelist can allow local file inclusion if attacker controls filename under modules/.
- Cookies not forced HttpOnly/Secure; session hijack risk. No CSRF tokens on processor endpoints.
- Credentials are committed to repo; rotate and move to env vars. Add .gitignore for token/backup files.
- Many processor scripts likely accept GET/POST without auth checks; audit `dataprocessor*.php`, `addrecord.php`, `notify_*.php`, etc.

## Recommended hardening tasks
- Centralize config: create config/env loader and replace hardcoded creds.
- Whitelist allowed module names before include; reject `../` patterns.
- Set session cookie params to Secure/HttpOnly/SameSite=Lax; use PHP sessions instead of bare cookies for auth data.
- Add CSRF tokens to forms and AJAX endpoints; use prepared statements everywhere (currently string concatenation). 
- Restrict file upload folders and validate mime types; ensure `uploads/`, `media/`, `voice_search/` are not executable.
- Move token JSON (Xero, Gmail) outside webroot or protect via .htaccess.
