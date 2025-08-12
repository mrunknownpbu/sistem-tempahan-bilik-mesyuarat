<?php
// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Referrer-Policy: no-referrer');
header('X-XSS-Protection: 0');

// Secure session settings
$cookieSecure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
$cookieParams = [
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => $cookieSecure,
    'httponly' => true,
    'samesite' => 'Lax',
];
if (PHP_VERSION_ID >= 70300) {
    session_set_cookie_params($cookieParams);
} else {
    session_set_cookie_params(
        $cookieParams['lifetime'],
        $cookieParams['path'].'; samesite='.$cookieParams['samesite'],
        $cookieParams['domain'],
        $cookieParams['secure'],
        $cookieParams['httponly']
    );
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// CSRF utilities
function get_csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token(?string $token): void {
    if (!isset($_SESSION['csrf_token']) || !$token || !hash_equals($_SESSION['csrf_token'], $token)) {
        http_response_code(400);
        exit('Invalid CSRF token');
    }
}

// Output escaping
function e(?string $value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// Auth utilities
function require_login(?string $requiredRole = null): void {
    if (empty($_SESSION['username']) || empty($_SESSION['user_type'])) {
        header('Location: /sistem-tempahan-bilik-mesyuarat/login_page.php');
        exit;
    }
    if ($requiredRole !== null && $_SESSION['user_type'] !== $requiredRole) {
        http_response_code(403);
        exit('Forbidden');
    }
}

function logout_and_destroy_session(): void {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
    session_destroy();
}