<html><head><title>SISTEM TEMPAHAN BILIK MESYUARAT</title></head>

<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/connection1.php';

require_login('admin');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: adduser.html');
    exit;
}

verify_csrf_token($_POST['csrf_token'] ?? null);

$userType = trim($_POST['usertype'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = (string)($_POST['password'] ?? '');

if ($userType === '' || ($userType !== 'admin' && $userType !== 'user') || $username === '' || $password === '') {
    header('Location: admin_display_user.php?msg=' . urlencode('Invalid input'));
    exit;
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$stmt = mysqli_prepare($link, 'INSERT INTO `useracc`(`usertype`, `username`, `password`) VALUES (?, ?, ?)');
if (!$stmt) {
    http_response_code(500);
    exit('Failed to prepare statement');
}

mysqli_stmt_bind_param($stmt, 'sss', $userType, $username, $passwordHash);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if ($ok) {
    header('Location: admin_display_user.php?msg=' . urlencode('Success'));
} else {
    header('Location: admin_display_user.php?msg=' . urlencode('Problem occurred'));
}
exit;
?>
