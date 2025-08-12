<?php
require_once __DIR__ . '/init.php';
require_login();
?>
<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>SISTEM TEMPAHAN BILIK MESYUARAT - Pengguna</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="Template/custom.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="user.php">Sistem Tempahan</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="user.php">Laman Utama</a></li>
        <li class="nav-item"><a class="nav-link" href="user/booking.php">Tempahan</a></li>
        <li class="nav-item"><a class="nav-link" href="user/dislpay_booking.php">Senarai Tempahan</a></li>
      </ul>
      <span class="navbar-text me-3"><?php echo e($_SESSION['username'] ?? ''); ?></span>
      <a class="btn btn-outline-light" href="logout.php">Log Keluar</a>
    </div>
  </div>
</nav>
<main class="container py-4">
  <div class="p-4 bg-light rounded-3">
    <h2 class="mb-3">Sistem Tempahan Bilik Mesyuarat</h2>
    <p class="mb-0">Selamat datang. Sila buat tempahan atau semak status tempahan anda.</p>
  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
