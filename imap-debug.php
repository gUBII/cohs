<?php
echo "<h3>IMAP Test on Gmail (Port 993)</h3>";

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'nexis365.com@gmail.com';
$password = 'sjacwlbuzxwmzvpp';

$mbox = @imap_open($hostname, $username, $password);

if ($mbox) {
    echo "<p style='color:green'>✅ Connected successfully to Gmail IMAP</p>";
    imap_close($mbox);
} else {
    echo "<p style='color:red'>❌ IMAP ERROR: " . imap_last_error() . "</p>";
}
?>
