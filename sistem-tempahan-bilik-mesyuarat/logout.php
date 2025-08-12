<?php
require_once __DIR__ . '/init.php';
logout_and_destroy_session();
header('Location: /sistem-tempahan-bilik-mesyuarat/login_page.php');
exit;