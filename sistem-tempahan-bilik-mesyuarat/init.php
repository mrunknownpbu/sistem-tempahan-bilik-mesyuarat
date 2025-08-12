<?php
// Security and session initialization
$usingHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $usingHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

// Basic security headers
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
// Allow self and bootstrap CDN. Relax inline to avoid breaking legacy pages
header("Content-Security-Policy: default-src 'self'; img-src 'self' data:; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdn.jsdelivr.net/npm; script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdn.jsdelivr.net/npm;");

// Base URL for redirects (adjust if served under a different path)
if (!defined('BASE_URL')) {
    define('BASE_URL', '/sistem-tempahan-bilik-mesyuarat/');
}

function redirect_to(string $relativePath): void {
    $location = rtrim(BASE_URL, '/') . '/' . ltrim($relativePath, '/');
    header('Location: ' . $location, true, 302);
    exit;
}

function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_or_fail(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tokenSession = $_SESSION['csrf_token'] ?? '';
        $tokenPost = $_POST['csrf_token'] ?? '';
        if (!$tokenSession || !$tokenPost || !hash_equals($tokenSession, $tokenPost)) {
            http_response_code(400);
            exit('Invalid CSRF token');
        }
    }
}

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function require_login(): void {
    if (empty($_SESSION['username'])) {
        redirect_to('login_page.php');
    }
}

function require_role(string $role): void {
    require_login();
    if (($_SESSION['user_type'] ?? '') !== $role) {
        http_response_code(403);
        exit('Forbidden');
    }
}