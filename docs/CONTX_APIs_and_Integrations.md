# CONTX_APIs_and_Integrations
Purpose: map every external API/service touchpoint and where it is called.

## OpenAI
- File: index.php (AI sidebar inside `index.php` ~line 230). JS `fetch` to `https://api.openai.com/v1/chat/completions` with model `gpt-3.5-turbo`; bearer key hardcoded (`sk-proj-...`).
- Inputs: textarea `#userQuestion`; outputs to `#gptResponse` div.
- Risk: key exposed to browser; move to server-side proxy and env var `OPENAI_API_KEY`.

## Twilio Voice
- File: call/make_call.php. Uses `Calls.json` REST endpoint with Account SID `ACace0...` and Auth Token `8bfe75...`. Caller ID `+61340597623`; TwiML URL `https://fufoon.com/tools/call/twiml.xml`.
- Related: call/twiml.xml, twiml_bridge.xml define call handling; handle_key.php, hangup.php, save_call.php capture events.
- Risk: credentials committed; rotate and keep outside repo.

## Xero Payroll/HR
- Location: api/xero/
  * xero_auth.php - starts OAuth flow; uses client id/secret (not committed) and writes tokens to `xero_tokens.json`/`tenant_id.json`.
  * callback.php - handles OAuth redirect and persists refresh/access tokens.
  * xero_refresh.php - refreshes token; uses stored JSON.
  * fetch_employees.php, fetch_earnings_rates.php, xero_sync.php - call Xero API to pull employees, rates, and push sync; CSV exports `xero_employees.csv` generated.
  * read_xero_tokens.php - debugging helper to dump stored tokens.
- Risk: token JSON files under version control; restrict permissions and add to .gitignore.

## Gmail API
- Folder gmail/
  * gmail.php - uses Google API client with OAuth token stored in token.json to access Gmail. Intended for sending/reading mail or testing connectivity.
  * admin_gmail_tester.php - front-end tester for Gmail connectivity.
- Missing: credentials.json (client secret) not in repo; required for re-auth.

## PHPMailer / SMTP
- Library: PHPMailer/ and vendor/PHPMailer (composer copy) plus vendor/send_email.php helper.
- Usage spots: email_roster*.php, email_invoice.php, email_sender.php, email_task.php, admin_email_tester.php rely on PHPMailer to send emails. Update SMTP host/user/pass there.

## Google OAuth (non-Gmail)
- Files: google-oauth.php, get_oauth_token.php - handle Google OAuth login (exact scopes unknown; inspect if enabling). Store tokens likely in session or token files.

## PDF/HTML-to-PDF
- Client-side: html2pdf.js loaded in index.php; functions `printDiv`, `printPDF`, `printPDF2` in scripts.php convert sections to PDF (no server API call).

## Speech/Voice Search
- Assets: assets/voice-script*.js; voice_data.php handles processing; audio files saved to voice_search/.
- index.php search modal triggers `voice_data.php?cid=1&sheba=2` for server-side speech recognition (implementation in voice_data.php).

## Chatbot
- chatbot/bot.php + chatbot/message.php serve iframe-based chat; backend logic is local PHP, not external API (unless customized inside message.php).

## Payment/Subscription
- Subscription checks use local DB tables (`subscription` in master `saas`); no external gateway calls found in scan.

## Integration hardening checklist
- External secrets must move to environment variables and be excluded from VCS.
- Add outbound timeouts and error logging around curl/fetch calls (Twilio, Xero, OpenAI) to avoid hanging requests.
- Validate/whitelist callback URLs for OAuth (Xero, Google) when deploying.

