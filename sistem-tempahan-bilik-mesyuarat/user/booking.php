<?php
require_once __DIR__ . '/../init.php';
require_login();
?>
<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Buat Tempahan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="../user.php">Sistem Tempahan</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="../user.php">Laman Utama</a></li>
        <li class="nav-item"><a class="nav-link active" href="booking.php">Tempahan</a></li>
        <li class="nav-item"><a class="nav-link" href="dislpay_booking.php">Senarai Tempahan</a></li>
      </ul>
      <a class="btn btn-outline-light" href="../logout.php">Log Keluar</a>
    </div>
  </div>
</nav>
<main class="container py-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="h4 mb-4">Tempahan</h2>
          <form action="addbookingdata.php" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>" />
            <div class="mb-3">
              <label class="form-label">Unit</label>
              <select name="unit" class="form-select" required>
                <option value="Tanah">Tanah</option>
                <option value="BKP">BKP</option>
                <option value="PLB">PLB</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Mesyuarat</label>
              <input type="text" class="form-control" name="meetingname" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Tarikh</label>
              <input type="date" class="form-control" name="date" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Tempat/Bilik Mesyuarat</label>
              <select name="Place" class="form-select" required>
                <option value="Bunga Raya">Bunga Raya</option>
                <option value="Unit Pelupusan">Unit Pelupusan</option>
                <option value="Pejabat Tanah Tingkat 3">Pejabat Tanah Tingkat 3</option>
                <option value="Lain Lain">Lain Lain</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Jumlah Ahli Mesyuarat</label>
              <input type="number" class="form-control" name="memnumber" min="1" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Tempahan Makanan</label>
              <select name="food" class="form-select" required>
                <option value="Set A">Set A</option>
                <option value="Set B">Set B</option>
                <option value="Set C">Set C</option>
              </select>
            </div>
            <div class="d-grid">
              <button class="btn btn-primary" type="submit" name="submit">Hantar</button>
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