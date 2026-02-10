<?php
require_once 'include.php';
$res = mysqli_query($conn, "SELECT id, full_name, email, signature_path, signed_at FROM signatures ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Signature Submissions</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Submissions</h5>
    <a href="index.php" class="btn btn-outline-primary">Back to Form</a>
  </div>
  <div class="card shadow-sm">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Signature</th>
              <th>Signed At</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($res && mysqli_num_rows($res)>0): ?>
              <?php while($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                  <td><?php echo (int)$row['id']; ?></td>
                  <td><?php echo htmlspecialchars($row['full_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><img src="<?php echo htmlspecialchars($row['signature_path'], ENT_QUOTES, 'UTF-8'); ?>" alt="Signature" style="height:60px"></td>
                  <td><?php echo htmlspecialchars($row['signed_at'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr><td colspan="5" class="text-center text-muted">No records yet.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>
