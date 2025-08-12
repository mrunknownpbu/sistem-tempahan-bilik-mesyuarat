<?php
require_once __DIR__ . '/../init.php';
require_role('admin');
require_once __DIR__ . '/connection1.php';
verify_csrf_or_fail();

$usertype = trim($_POST['usertype'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($usertype === '' || $username === '' || $password === '') {
    http_response_code(400);
    exit('Data tidak lengkap.');
}

$hash = password_hash($password, PASSWORD_DEFAULT);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$stmt = mysqli_prepare($link, 'INSERT INTO useracc (usertype, username, password) VALUES (?, ?, ?)');
mysqli_stmt_bind_param($stmt, 'sss', $usertype, $username, $hash);
mysqli_stmt_execute($stmt);

redirect_to('admin/admin_display_user.php?msg=Success');

?>
