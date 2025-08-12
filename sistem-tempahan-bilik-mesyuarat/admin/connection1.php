<?php
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$name = getenv('DB_NAME') ?: 'useracc';
$port = getenv('DB_PORT') ?: 3306;

$link = mysqli_init();
if (!$link) {
    http_response_code(500);
    exit('Database initialization failed');
}

mysqli_options($link, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
if (!mysqli_real_connect($link, $host, $user, $pass, $name, (int)$port)) {
    http_response_code(500);
    exit('Database connection failed');
}

if (!mysqli_set_charset($link, 'utf8mb4')) {
    http_response_code(500);
    exit('Failed to set charset');
}
?>