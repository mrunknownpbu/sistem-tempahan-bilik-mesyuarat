<?php
require_once __DIR__ . '/../init.php';
require_login();
require_once __DIR__ . '/connection1.php';
verify_csrf_or_fail();

$unit = trim($_POST['unit'] ?? '');
$meetingname = trim($_POST['meetingname'] ?? '');
$date = trim($_POST['date'] ?? '');
$place = trim($_POST['Place'] ?? '');
$memnumber = trim($_POST['memnumber'] ?? '');
$food = trim($_POST['food'] ?? '');

if ($unit === '' || $meetingname === '' || $date === '' || $place === '' || $memnumber === '' || $food === '') {
    http_response_code(400);
    exit('Data tidak lengkap.');
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$stmt = mysqli_prepare($link, 'INSERT INTO booking (unit, name, date, place, member, foodorder) VALUES (?, ?, ?, ?, ?, ?)');
mysqli_stmt_bind_param($stmt, 'ssssss', $unit, $meetingname, $date, $place, $memnumber, $food);
mysqli_stmt_execute($stmt);

redirect_to('user/dislpay_booking.php?msg=Success');

?>
