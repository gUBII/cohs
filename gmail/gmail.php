<?php
session_start();

define('CLIENT_ID', '535144762860-n5g9b0oan6ar67mvatdg5bgq9ccbojna.apps.googleusercontent.com');
define('CLIENT_SECRET', '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');
define('REDIRECT_URI', 'https://nexis365.com/saas/gmail/gmail.php');
define('TOKEN_FILE', __DIR__ . '/token.json');

$testTo = 'sheba247.com@gmail.com';
$messagesPerPage = 10;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$startIndex = ($page - 1) * $messagesPerPage;

function getAccessToken() {
    if (file_exists(TOKEN_FILE)) {
        $token = json_decode(file_get_contents(TOKEN_FILE), true);
        if (time() < $token['created'] + $token['expires_in']) {
            return $token['access_token'];
        } else {
            $response = file_get_contents("https://oauth2.googleapis.com/token", false, stream_context_create([
                'http' => [
                    'method' => 'POST',
                    'header' => "Content-Type: application/x-www-form-urlencoded",
                    'content' => http_build_query([
                        'client_id' => CLIENT_ID,
                        'client_secret' => CLIENT_SECRET,
                        'refresh_token' => $token['refresh_token'],
                        'grant_type' => 'refresh_token'
                    ])
                ]
            ]));
            $newToken = json_decode($response, true);
            if (isset($newToken['access_token'])) {
                $newToken['refresh_token'] = $token['refresh_token'];
                $newToken['created'] = time();
                file_put_contents(TOKEN_FILE, json_encode($newToken));
                return $newToken['access_token'];
            } else {
                echo "<div class='alert alert-danger'>Token refresh failed. Re-authenticate.</div>";
            }
        }
    }

    if (isset($_GET['code'])) {
        $response = file_get_contents("https://oauth2.googleapis.com/token", false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded",
                'content' => http_build_query([
                    'code' => $_GET['code'],
                    'client_id' => CLIENT_ID,
                    'client_secret' => CLIENT_SECRET,
                    'redirect_uri' => REDIRECT_URI,
                    'grant_type' => 'authorization_code'
                ])
            ]
        ]));
        $token = json_decode($response, true);
        if (isset($token['access_token'])) {
            $token['created'] = time();
            file_put_contents(TOKEN_FILE, json_encode($token));
            header('Location: ' . REDIRECT_URI);
            exit;
        } else {
            die("Failed to obtain token.");
        }
    } else {
        $auth_url = "https://accounts.google.com/o/oauth2/auth?" . http_build_query([
            'client_id' => CLIENT_ID,
            'redirect_uri' => REDIRECT_URI,
            'response_type' => 'code',
            'scope' => 'https://www.googleapis.com/auth/gmail.readonly https://www.googleapis.com/auth/gmail.send',
            'access_type' => 'offline',
            'prompt' => 'consent'
        ]);
        echo "<a class='btn btn-primary' href='$auth_url'>Connect to Gmail</a>";
        exit;
    }
}

function getProfile($access_token) {
    $headers = ["Authorization: Bearer $access_token"];
    $response = file_get_contents("https://gmail.googleapis.com/gmail/v1/users/me/profile", false, stream_context_create([
        'http' => ['method' => 'GET', 'header' => implode("\r\n", $headers)]
    ]));
    return json_decode($response, true);
}

function listMessages($access_token, $label, $filterEmail, $startIndex, $limit) {
    $url = "https://gmail.googleapis.com/gmail/v1/users/me/messages?labelIds=$label&maxResults=50";
    $headers = ["Authorization: Bearer $access_token"];
    $result = json_decode(file_get_contents($url, false, stream_context_create([
        'http' => ['method' => 'GET', 'header' => implode("\r\n", $headers)]
    ])), true);

    $allMessages = [];
    if (isset($result['messages'])) {
        foreach ($result['messages'] as $msg) {
            $id = $msg['id'];
            $msg_url = "https://gmail.googleapis.com/gmail/v1/users/me/messages/$id?format=full";
            $message = json_decode(file_get_contents($msg_url, false, stream_context_create([
                'http' => ['method' => 'GET', 'header' => implode("\r\n", $headers)]
            ])), true);

            $headersList = $message['payload']['headers'];
            $subject = $from = $to = '';
            foreach ($headersList as $h) {
                if ($h['name'] === 'Subject') $subject = $h['value'];
                if ($h['name'] === 'From') $from = $h['value'];
                if ($h['name'] === 'To') $to = $h['value'];
            }

            if (stripos($from, $filterEmail) !== false || stripos($to, $filterEmail) !== false) {
                $body = '';
                if (isset($message['payload']['parts'])) {
                    foreach ($message['payload']['parts'] as $part) {
                        if (isset($part['body']['data'])) {
                            $body = base64_decode(strtr($part['body']['data'], '-_', '+/'));
                            break;
                        }
                    }
                } else {
                    $body = isset($message['payload']['body']['data']) ? base64_decode(strtr($message['payload']['body']['data'], '-_', '+/')) : '';
                }

                $allMessages[] = ['id' => $id, 'subject' => $subject, 'from' => $from, 'to' => $to, 'body' => $body];
            }
        }
    }

    $paginated = array_slice($allMessages, $startIndex, $limit);
    $total = count($allMessages);
    return [$paginated, $total];
}

function sendMessage($access_token, $to, $subject, $body) {
    $strRawMessage = "To: $to\r\nSubject: $subject\r\n\r\n$body";
    $encodedMessage = rtrim(strtr(base64_encode($strRawMessage), '+/', '-_'), '=');
    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => "Authorization: Bearer $access_token\r\nContent-Type: application/json",
            'content' => json_encode(['raw' => $encodedMessage])
        ]
    ]);
    $response = file_get_contents("https://gmail.googleapis.com/gmail/v1/users/me/messages/send", false, $context);
    if ($response === false) {
        echo "<div class='alert alert-danger'>Email send failed.</div>";
    } else {
        $result = json_decode($response, true);
        echo "<div class='alert alert-success'>Email sent successfully!</div>";
        echo "<pre>Response:\n"; print_r($result); echo "</pre>";
    }
}

$access_token = getAccessToken();
$profile = getProfile($access_token);
$senderEmail = $profile['emailAddress'];

$testSubject = 'Urgent Notification - New Task Assignment for Mr. David';
$testBody = <<<TEXT
Dear Team,

Please be informed that Mr. David has been assigned a new task and is expected to commence work immediately. Kindly notify us as soon as possible to confirm receipt and ensure a smooth start.

Best regards,
TEXT;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_email'])) {
    sendMessage($access_token, $_POST['to'], $_POST['subject'], $_POST['message']);
}

$view = $_GET['view'] ?? 'inbox';
$readId = $_GET['read'] ?? null;

[$inbox, $inboxTotal] = listMessages($access_token, 'INBOX', $testTo, $startIndex, $messagesPerPage);
[$sent, $sentTotal] = listMessages($access_token, 'SENT', $testTo, $startIndex, $messagesPerPage);
$totalPages = ceil(($view === 'sent' ? $sentTotal : $inboxTotal) / $messagesPerPage);
?>



<!DOCTYPE html>
<html>
<head>
    <title>Gmail API Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
</head>
<body class="container py-5">
    <h1 class="mb-3">Gmail API Client</h1>
    <div class="alert alert-info">Authenticated as: <strong><?= htmlspecialchars($senderEmail) ?></strong></div>

    <div class="row">
        <div class="col-md-2">
            <div class="d-grid gap-2">
                <a href="?view=compose" class="btn btn-outline-primary <?= $view == 'compose' ? 'active' : '' ?>">Compose</a>
                <a href="?view=inbox" class="btn btn-outline-primary <?= $view == 'inbox' ? 'active' : '' ?>">Inbox</a>
                <a href="?view=sent" class="btn btn-outline-primary <?= $view == 'sent' ? 'active' : '' ?>">Sent</a>
            </div>
        </div>
        <div class="col-md-10">
            <?php if ($view === 'compose'): ?>
                <form method="post" class="card card-body mb-4">
                    <input type="hidden" name="send_email" value="1">
                    <div class="mb-3"><label>To</label>
                        <input type="email" name="to" class="form-control" value="<?= htmlspecialchars($testTo) ?>" required>
                    </div>
                    <div class="mb-3"><label>Subject</label>
                        <input type="text" name="subject" class="form-control" value="<?= htmlspecialchars($testSubject) ?>" required>
                    </div>
                    <div class="mb-3"><label>Message</label>
                        <textarea name="message" class="form-control" rows="7" required><?= htmlspecialchars($testBody) ?></textarea>
                    </div>
                    <button class="btn btn-primary">Send Email</button>
                </form>
            <?php else: ?>
                <h3><?= ucfirst($view) ?> (Page <?= $page ?> of <?= $totalPages ?>)</h3>
                <ul class="list-group mb-3">
                    <?php foreach (($view === 'sent' ? $sent : $inbox) as $msg): ?>
                        <li class="list-group-item">
                            <strong><?= htmlspecialchars($msg['subject']) ?></strong><br>
                            <small class="text-muted"><?= htmlspecialchars($msg['from']) ?></small><br>
                            <button class="btn btn-sm btn-link read-btn"
                                    data-body="<?= htmlspecialchars($msg['body']) ?>"
                                    data-from="<?= htmlspecialchars($msg['from']) ?>"
                                    data-subject="<?= htmlspecialchars($msg['subject']) ?>">
                                Read
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div id="message-body-area" class="card d-none"><div class="card-body" id="message-body"></div></div>
            <?php endif; ?>

            <?php if ($totalPages > 1): ?>
                <nav>
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="?view=<?= $view ?>&page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </div>

    <!-- Reply Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" class="modal-content">
                <input type="hidden" name="send_email" value="1">
                <div class="modal-header">
                    <h5 class="modal-title">Reply to Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><label>To</label><input type="email" name="to" id="reply-to" class="form-control" readonly></div>
                    <div class="mb-3"><label>Subject</label><input type="text" name="subject" id="reply-subject" class="form-control"></div>
                    <div class="mb-3"><label>Message</label>
                        <textarea name="message" id="reply-message" class="form-control" rows="6" required></textarea>
                        <div id="original-message" style="border-top:1px solid #ccc; padding-top:10px; margin-top:10px; font-size:0.9em; color:#555;"></div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Send Reply</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
$(document).ready(function () {
    // Show message and reply button
    $('.read-btn').click(function () {
        let body = $(this).data('body');
        let from = $(this).data('from');
        let subject = $(this).data('subject');

        $('#message-body').html(
            body.replace(/\n/g, '<br>') +
            `<hr><button class="btn btn-sm btn-primary reply-btn"
                data-from="${from}"
                data-subject="${subject}"
                data-body="${body}">Reply</button>`
        );
        $('#message-body-area').removeClass('d-none');
    });

    // Delegate reply button click from dynamic content
    $(document).on('click', '.reply-btn', function () {
        let from = $(this).data('from');
        let subject = $(this).data('subject');
        let body = $(this).data('body');

        let quoted = "\n\n------------\n" + body;

        $('#reply-to').val(from);
        $('#reply-subject').val("Re: " + subject);
        $('#reply-message').val(quoted); // Put full content into the textarea

        let modal = new bootstrap.Modal(document.getElementById('replyModal'));
        modal.show();
    });

    // You can keep or remove this form handler if not modifying further
    $('#replyModal form').on('submit', function () {
        // Optional: trim or validate here
    });
});
</script>


</body>
</html>

</body>
</html>
