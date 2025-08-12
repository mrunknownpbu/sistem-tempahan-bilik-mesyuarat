<html><head><title>SISTEM TEMPAHAN BILIK MESYUARAT</title></head>

<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/connection1.php';

require_login('user');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: booking.html');
    exit;
}

verify_csrf_token($_POST['csrf_token'] ?? null);

$unit = trim($_POST['unit'] ?? '');
$meetingName = trim($_POST['meetingname'] ?? '');
$date = trim($_POST['date'] ?? '');
$place = trim($_POST['Place'] ?? '');
$member = trim($_POST['memnumber'] ?? '');
$food = trim($_POST['food'] ?? '');

if ($unit === '' || $meetingName === '' || $date === '' || $place === '' || $member === '' || $food === '') {
    header('Location: dislpay_booking.php?msg=' . urlencode('Invalid input'));
    exit;
}

$stmt = mysqli_prepare($link, 'INSERT INTO `booking`(`unit`, `name`, `date`, `place`, `member`, `foodorder`) VALUES (?, ?, ?, ?, ?, ?)');
if (!$stmt) {
    http_response_code(500);
    exit('Failed to prepare statement');
}

mysqli_stmt_bind_param($stmt, 'ssssss', $unit, $meetingName, $date, $place, $member, $food);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if ($ok) {
    header('Location: dislpay_booking.php?msg=' . urlencode('Success'));
} else {
    header('Location: dislpay_booking.php?msg=' . urlencode('Problem occurred'));
}
exit;
?>
