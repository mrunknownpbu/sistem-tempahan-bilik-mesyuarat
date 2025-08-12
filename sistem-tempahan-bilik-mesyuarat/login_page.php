<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/connection1.php';

$loginError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf_or_fail();

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $loginError = 'Sila masukkan nama pengguna dan kata laluan.';
    } else {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $stmt = mysqli_prepare($link, 'SELECT id, username, usertype, password FROM useracc WHERE username = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = $result ? mysqli_fetch_assoc($result) : null;

        if ($user) {
            $stored = $user['password'];
            $isValid = password_verify($password, $stored) || hash_equals($stored, $password);

            if ($isValid) {
                // Migrate legacy plaintext passwords to hashed
                if (!password_needs_rehash($stored, PASSWORD_DEFAULT) && hash_equals($stored, $password)) {
                    $newHash = password_hash($password, PASSWORD_DEFAULT);
                    $upd = mysqli_prepare($link, 'UPDATE useracc SET password = ? WHERE id = ?');
                    mysqli_stmt_bind_param($upd, 'si', $newHash, $user['id']);
                    mysqli_stmt_execute($upd);
                }

                session_regenerate_id(true);
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_type'] = $user['usertype'];

                if ($user['usertype'] === 'admin') {
                    redirect_to('admin.php');
                } else {
                    redirect_to('user.php');
                }
            } else {
                $loginError = 'Nama pengguna atau kata laluan tidak sah.';
            }
        } else {
            $loginError = 'Nama pengguna atau kata laluan tidak sah.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>SISTEM TEMPAHAN BILIK MESYUARAT - Log Masuk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="Template/custom.css" />
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.html">Sistem Tempahan</a>
    <div class="ms-auto">
      <a class="btn btn-outline-light" href="login_page.php">Log Masuk</a>
    </div>
  </div>
</nav>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-5">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <div class="text-center mb-3">
            <img src="Image/logoPDTbatugajah.png" class="img-fluid" style="max-height:64px" alt="Logo" />
          </div>
          <h1 class="h4 text-center mb-4">Log Masuk</h1>
          <?php if ($loginError): ?>
            <div class="alert alert-danger" role="alert"><?php echo e($loginError); ?></div>
          <?php endif; ?>
          <form action="login_page.php" method="post" novalidate>
            <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>" />
            <div class="mb-3">
              <label for="username" class="form-label">Nama Pengguna</label>
              <input type="text" class="form-control" id="username" name="username" required />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Kata Laluan</label>
              <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required />
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Log Masuk</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
