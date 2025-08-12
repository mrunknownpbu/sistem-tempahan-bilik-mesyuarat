<?php
require_once __DIR__ . '/init.php';
require_role('admin');
?>
<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>SISTEM TEMPAHAN BILIK MESYUARAT - Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="Template/custom.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="admin.php">Sistem Tempahan</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="admin.php">Laman Utama</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Pengguna</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="admin/admin_display_user.php">Papar Pengguna</a></li>
            <li><a class="dropdown-item" href="admin/adduser.php">Daftar Baru</a></li>
          </ul>
        </li>
      </ul>
      <span class="navbar-text me-3"><?php echo e($_SESSION['username'] ?? ''); ?> (admin)</span>
      <a class="btn btn-outline-light" href="logout.php">Log Keluar</a>
    </div>
  </div>
</nav>
<main class="container py-4">
  <div class="p-4 bg-light rounded-3">
    <h2 class="mb-3">Sistem Tempahan Bilik Mesyuarat</h2>
    <p class="mb-0">Selamat datang ke Sistem Tempahan Bilik Mesyuarat. Aplikasi ini membantu PDT menguruskan tempahan bilik mesyuarat.</p>
  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
