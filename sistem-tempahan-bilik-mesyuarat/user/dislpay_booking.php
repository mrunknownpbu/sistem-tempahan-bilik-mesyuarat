<?php
require_once __DIR__ . '/../init.php';
require_login();
require_once __DIR__ . '/connection1.php';
?>
<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Senarai Tempahan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="../user.php">Sistem Tempahan</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="../user.php">Laman Utama</a></li>
        <li class="nav-item"><a class="nav-link" href="booking.php">Tempahan</a></li>
        <li class="nav-item"><a class="nav-link active" href="dislpay_booking.php">Senarai Tempahan</a></li>
      </ul>
      <a class="btn btn-outline-light" href="../logout.php">Log Keluar</a>
    </div>
  </div>
</nav>
<main class="container py-4">
  <h3 class="mb-3">Senarai Tempahan</h3>
  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead class="table-light">
        <tr>
          <th scope="col">Unit</th>
          <th scope="col">Nama Mesyuarat</th>
          <th scope="col">Tarikh</th>
          <th scope="col">Tempat Mesyuarat</th>
          <th scope="col">Jumlah Ahli Mesyuarat</th>
          <th scope="col">Tempahan Makanan</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $query = 'SELECT unit, name, date, place, member, foodorder FROM booking ORDER BY date DESC';
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . e($row['unit']) . '</td>';
            echo '<td>' . e($row['name']) . '</td>';
            echo '<td>' . e($row['date']) . '</td>';
            echo '<td>' . e($row['place']) . '</td>';
            echo '<td>' . e((string)$row['member']) . '</td>';
            echo '<td>' . e($row['foodorder']) . '</td>';
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