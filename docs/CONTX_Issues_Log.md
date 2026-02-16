# CONTX_Issues_Log
Purpose: capture recon findings (no code changes). Grouped by area. Use as a backlog for future hardening.

## Security / Secrets
- Hardcoded SMTP credentials in mailers: [email_sender.php](email_sender.php), [email_task.php](email_task.php), [email_roster.php](email_roster.php), [email_roster_suspend.php](email_roster_suspend.php), [email_roster_update.php](email_roster_update.php), [email_invoice.php](email_invoice.php), [admin_email_tester.php](admin_email_tester.php).
- Hardcoded Google Speech-to-Text API key in [upload_audio.php](upload_audio.php); endpoint accepts uploads without auth.
- Hardcoded OCR.Space API key in [ai_wizard.php](ai_wizard.php).
- Hardcoded Twilio Account SID/Auth Token in [call/make_call.php](call/make_call.php).
- Account recovery endpoint [email-auth.php](email-auth.php) sets cookies and sends OTP from GET params without auth/rate limits.
- GET-driven email sender [global_email.php](global_email.php) can be used as open relay.
- Gmail tester [admin_gmail_tester.php](admin_gmail_tester.php) contains app password and fixed recipient.

## Data Integrity / Logic Bugs
- [notify_poll.php](notify_poll.php) uses $mysqli but include.php defines $conn; likely runtime error.
- [email_roster_suspend.php](email_roster_suspend.php) and [email_roster_update.php](email_roster_update.php) read $_POST["$clientname"] and similar keys; likely undefined fields.
- [ai_wizard.php](ai_wizard.php) and [ai_wizard_processor.php](ai_wizard_processor.php) assign $found from $rs2 instead of $rs22 after insert; may keep $found unset.

## Auth / Access Control
- Endpoints act without verifying session or permission:
  - [add_notification.php](add_notification.php) inserts notifications without auth.
  - [upload_audio.php](upload_audio.php) accepts uploads and writes to voice_search/ without auth.
  - notify_* endpoints allow read/mark-read based on user_id or cookies only.
  - [calendar_backend.php](calendar_backend.php) exposes tasks CRUD without auth.
  - [calendar_backend_schedule.php](calendar_backend_schedule.php), [calendar_backend_schedule_main.php](calendar_backend_schedule_main.php), [calendar_backend_schedule_allocated.php](calendar_backend_schedule_allocated.php), [calendar_backend_schedule_unallocated.php](calendar_backend_schedule_unallocated.php) expose shift CRUD/accept/cancel/template actions without auth.
  - [calendar_backend_schedule_backup.php](calendar_backend_schedule_backup.php), [calendar_backend_schedule_backup2.php](calendar_backend_schedule_backup2.php), [calendar_backend_schedule_backup3.php](calendar_backend_schedule_backup3.php), [calendar_backend_schedule_x.php](calendar_backend_schedule_x.php) expose shift CRUD/accept/cancel/template actions without auth.
  - [repeat_backend.php](repeat_backend.php) exposes repeat copy/list without auth.
  - [scheduling-set.php](scheduling-set.php), [scheduling-unset.php](scheduling-unset.php), [scheduling-unset2.php](scheduling-unset2.php), [schedule-allocation-set.php](schedule-allocation-set.php) mutate shift state/cookies without auth/CSRF controls.

## Input Handling / Injection Risk
- [email-auth.php](email-auth.php) uses GET params for identity and writes cookies; can be forged.
- [chatbot/message.php](chatbot/message.php) uses root DB and LIKE on user text; even with escaping, this allows broad data probing.
- [voice_data.php](voice_data.php) echoes cookie content without escaping (XSS risk).
- [scheduling-set.php](scheduling-set.php) builds SQL with raw GET/POST values (clockin/out approvals, activity log, timeclock updates), creating SQLi/parameter tampering risk.
- Multiple schedule endpoints accept GET for state changes (approve/reject, set cookies) and POST JSON without CSRF, increasing CSRF risk.

## Data Integrity / Concurrency
- Schedule backends manually compute new ids via MAX(id)+1 instead of AUTO_INCREMENT in several insert paths; risk of collisions under concurrent inserts.

## Data Exposure / Privacy
- email_* handlers include internal logos and references to goodwillcare.net and hardcoded recipients.
- Admin/tester endpoints reveal operational credentials and behavior.

## Notes
- This log is a recon snapshot; update as more files are reviewed.
