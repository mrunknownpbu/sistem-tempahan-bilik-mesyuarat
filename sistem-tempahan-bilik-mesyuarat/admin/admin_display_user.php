<?php
require_once __DIR__ . '/../init.php';
require_role('admin');
require_once __DIR__ . '/connection1.php';
?>
<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Papar Pengguna</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="../admin.php">Sistem Tempahan</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="../admin.php">Laman Utama</a></li>
        <li class="nav-item"><a class="nav-link active" href="admin_display_user.php">Papar Pengguna</a></li>
        <li class="nav-item"><a class="nav-link" href="adduser.php">Daftar Baru</a></li>
      </ul>
      <a class="btn btn-outline-light" href="../logout.php">Log Keluar</a>
    </div>
  </div>
</nav>
<main class="container py-4">
  <h3 class="mb-3">Senarai Pengguna</h3>
  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead class="table-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Jenis Pengguna</th>
          <th scope="col">Nama Pengguna</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $query = 'SELECT id, usertype, username FROM useracc ORDER BY id ASC';
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . e((string)$row['id']) . '</td>';
            echo '<td>' . e($row['usertype']) . '</td>';
            echo '<td>' . e($row['username']) . '</td>';
            echo '</tr>';
        }
        mysqli_close($link);
      ?>
      </tbody>
    </table>
  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>