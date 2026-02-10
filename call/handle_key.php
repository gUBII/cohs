<?php
header('Content-Type: text/xml');

$digits = $_POST['Digits'] ?? '';
$destination = '';

switch ($digits) {
    case '1':
        $destination = '+8801707938108'; // Hasan
        break;
    case '2':
        $destination = '+8801707938108'; // Client A
        break;
    case '3':
        $destination = '+8801707938108'; // Support
        break;
    default:
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<Response><Say>Invalid input. Goodbye.</Say><Hangup/></Response>';
        exit;
}

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<Response>
    <Say voice="alice">Connecting you now.</Say>
    <Dial 
        record="record-from-answer-dual"
        action="https://fufoon.com/tools/call/hangup.php"
        recordingStatusCallback="https://fufoon.com/tools/call/save_call.php"
        recordingStatusCallbackMethod="POST">
        <Number><?= htmlspecialchars($destination) ?></Number>
    </Dial>
</Response>
