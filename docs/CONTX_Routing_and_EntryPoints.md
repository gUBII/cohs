# CONTX_Routing_and_EntryPoints
Routing model: single front-controllers (`index.php`, `app.php`) that include files from `modules/` based on the `url` query parameter. Auxiliary PHP files in repo act as AJAX/processor endpoints or standalone utilities.

## High-level flow
- login.php clears cookies then posts credentials to security.php; on success it sets `userid` and `dbname` cookies.
- include.php chooses DB connection: if on login/register -> master DB `saas`; otherwise uses tenant DB from `dbname` cookie, also checks subscription via `subscription` table in master DB.
- index.php checks `userid`; if missing it redirects to login.php. When present it loads head.php, nav_bars.php, then includes `modules/<url>` or defaults to role-specific dashboards.
- app.php is a parallel entry that defaults to `modules/ndis_dashboard.php`.
- scripts.php injects a hidden iframe to `x.php` and loads global JS (jQuery, Bootstrap, DataTables, Chart.js, Select2, Intro.js, html2canvas, jsPDF).
- nav_bars.php builds user dropdown and notification bell; JS polls `notif_count.php` every 8s and posts to `notif_read.php`.
- Notification modal content pulled via `notify.php`, `notify_list.php`, `notify_read.php`, etc.
- AI side panels: `index.php` contains a fetch call to OpenAI Chat Completions; voice search modal loads assets/voice-script4.js and writes audio files to voice_search/.
- Twilio calls: `call/make_call.php` invoked by forms/posts, points to external twiml.xml; Xero OAuth/cron endpoints live under api/xero/.

## Security notes
- The `url` parameter is used directly in include path (`modules/<url>`); ensure only whitelisted values are allowed to avoid arbitrary include.
- Secrets for DB, OpenAI, Twilio, Gmail, Xero are committed in code; rotate and move to env vars.
- Cookies drive tenant selection; enforce HTTPS and HttpOnly in production.

## Auth entrypoints (16)
- authenticator.php
- authenticator_app.php
- authenticator_backup.php
- blank-login.php
- get_oauth_token.php
- google-oauth.php
- login-backup.php
- login.php
- logout-register.php
- logout.php
- reg_security.php
- register-backup.php
- register.php
- resetpassword.php
- security.php
- signup_cookie.php

## Processors entrypoints (24)
- accountsprocessor.php
- ai_wizard_processor.php
- appointmentprocessor.php
- dataprocessor.php
- dataprocessor02.php
- dataprocessor03.php
- dataprocessor_1.php
- documentsprocessor.php
- formprocessor_1.php
- invoiceprocessor.php
- invoiceprocessor_25082025.php
- invoiceprocessor_gwc.php
- lead_quote_processor.php
- logs_processor.php
- projectprocessor.php
- report_processor.php
- retailprocessor.php
- setting_processor.php
- sorting_processor_modules.php
- sorting_processor_solutions.php
- taskprocessor.php
- workspace_budget_processor.php
- workspace_budget_quotation_processor.php
- workspace_processor.php

## Imports entrypoints (8)
- client_importer.php
- client_importer1.php
- employee_importer.php
- import_csv.php
- importer_appointments_1.php
- importer_appointments_2.php
- importer_eod_1.php
- importer_eod_2.php

## Finance entrypoints (12)
- lead_quote.php
- print_quotation_pdf.php
- quote_creator.php
- workspace_budget.php
- workspace_budget_allocated.php
- workspace_budget_editor.php
- workspace_budget_quotation.php
- workspace_budget_quotation_allocated.php
- workspace_budget_quotation_valuation.php
- workspace_budget_shifts.php
- workspace_budget_shifts_backkup.php
- workspace_budget_valuation.php

## Schedule entrypoints (12)
- calendar.php
- calendar_backend.php
- calendar_backend_schedule.php
- calendar_backend_schedule_allocated.php
- calendar_backend_schedule_backup.php
- calendar_backend_schedule_backup2.php
- calendar_backend_schedule_backup3.php
- calendar_backend_schedule_main.php
- calendar_backend_schedule_unallocated.php
- calendar_backend_schedule_x.php
- schedule-allocation-set.php
- workspace_budget_schedule.php

## Email Sms entrypoints (12)
- admin_email_tester.php
- admin_gmail_tester.php
- email-auth.php
- email_invoice.php
- email_roster.php
- email_roster_suspend.php
- email_roster_update.php
- email_sender.php
- email_task.php
- global_email.php
- PHPMailer.Pro.php
- PHPMailer2.php

## Notifications entrypoints (14)
- add_notification.php
- notif_count.php
- notif_read.php
- notification.php
- notifications.php
- notifications_modal.php
- notify.php
- notify_check.php
- notify_list.php
- notify_mark_read.php
- notify_poll.php
- notify_read.php
- notify_read_list.php
- notify_read_selected.php

## Ai Voice entrypoints (8)
- admin_daily_database_backup.php
- ai_wizard.php
- bot.php
- form-wizard.php
- include_main.php
- main.php
- voice.php
- voice_data.php

## Misc entrypoints (96)
- addrecord.php
- admin_database_compare_update.php
- aged_care_bar.php
- aged_care_client_bar.php
- aged_managed.php
- app.php
- au_holidays.php
- bars.php
- blank-file.php
- blank-workspace.php
- blank.php
- case_bar.php
- client-cb-set.php
- client-cb-unset.php
- client-cb-unset2.php
- client_card_manager.php
- clockinout.php
- clockinout2.php
- cookie-backup.php
- cookie.php
- cookie_manager.php
- cookie_set.php
- cost_center_unset.php
- createdb.php
- crm_bar.php
- dataupdate.php
- dbcon.php
- delete_records.php
- deleterecords.php
- deleterecords2.php
- deletetask.php
- education.php
- esignature.php
- esignaturelist.php
- esignaturesave.php
- experience.php
- family.php
- features.php
- footer.php
- forgot-backup.php
- forgot.php
- global-set.php
- global-unset.php
- handwriting.php
- head-light.php
- head-light2.php
- head-sub.php
- head.php
- hrm_chart.php
- imap-debug.php
- include.php
- include_general.php
- include_sub.php
- index.php
- index_light.php
- message.php
- nav_bars.php
- nav_bars_backup.php
- nav_bars_blank.php
- nav_bars_with_role.php
- null.php
- print_data.php
- print_excel.php
- privacy-policy.php
- project_bar.php
- reg_include.php
- repeat_backend.php
- scan_n_deploy.php
- scheduling-geo-in.php
- scheduling-geo-out.php
- scheduling-set.php
- scheduling-unset.php
- scheduling-unset2.php
- scripts-light.php
- scripts-light2.php
- scripts.php
- signatureimage.php
- sorting.php
- subscription-plans.php
- subscription.php
- success.php
- suspendrecord.php
- sync_holidays.php
- terms-of-services.php
- test-dbc.php
- test.php
- theme_bar.php
- theme_color.php
- theme_layout.php
- update_drop.php
- update_order.php
- updaterecord.php
- upload_audio.php
- uset.php
- workspace_documents.php
- x.php

