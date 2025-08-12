<?php
require_once __DIR__ . '/../init.php';
require_role('admin');
?>
<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Daftar Pengguna Baru</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="../admin.php">Sistem Tempahan</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="../admin.php">Laman Utama</a></li>
        <li class="nav-item"><a class="nav-link" href="admin_display_user.php">Papar Pengguna</a></li>
        <li class="nav-item"><a class="nav-link active" href="adduser.php">Daftar Baru</a></li>
      </ul>
      <a class="btn btn-outline-light" href="../logout.php">Log Keluar</a>
    </div>
  </div>
</nav>
<main class="container py-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="h4 mb-4">Daftar Pengguna Baru</h2>
          <form action="adduserdata.php" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>" />
            <div class="mb-3">
              <label class="form-label">Jenis Pengguna</label>
              <select name="usertype" class="form-select" required>
                <option value="">Pilih jenis pengguna</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Pengguna</label>
              <input type="text" class="form-control" name="username" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Kata Laluan</label>
              <input type="password" class="form-control" name="password" required />
            </div>
            <div class="d-grid">
              <button class="btn btn-primary" type="submit" name="submit">Tambah Pengguna</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>