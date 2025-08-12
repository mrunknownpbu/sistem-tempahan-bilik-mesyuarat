<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/connection1.php';

if (!empty($_SESSION['user_type'])) {
    if ($_SESSION['user_type'] === 'admin') {
        header('Location: admin.php');
        exit;
    }
    if ($_SESSION['user_type'] === 'user') {
        header('Location: user.php');
        exit;
    }
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf_token($_POST['csrf_token'] ?? null);

    $username = trim($_POST['username'] ?? '');
    $password = (string)($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $error = 'Sila masukkan nama pengguna dan kata laluan.';
    } else {
        $stmt = mysqli_prepare($link, 'SELECT username, usertype, password FROM useracc WHERE username = ? LIMIT 1');
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $dbUsername, $dbUsertype, $dbPasswordHashOrPlain);
            if (mysqli_stmt_fetch($stmt)) {
                $isValid = password_verify($password, $dbPasswordHashOrPlain) || hash_equals($dbPasswordHashOrPlain, $password);
                if ($isValid) {
                    session_regenerate_id(true);
                    $_SESSION['username'] = $dbUsername;
                    $_SESSION['user_type'] = $dbUsertype;
                    if ($dbUsertype === 'admin') {
                        header('Location: admin.php');
                        exit;
                    } else {
                        header('Location: user.php');
                        exit;
                    }
                }
            }
            mysqli_stmt_close($stmt);
        }
        $error = 'Nama pengguna atau kata laluan tidak sah.';
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="Template/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="Template/custom.css" media="screen" />
<link rel="stylesheet" type="text/css" href="Template/timePicker.css" media="screen" />
<link rel="stylesheet" href="Template/jquery-ui-1.7.custom.css" type="text/css" />
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="jquery/jquery.timepicker.js"></script>
<script type="text/javascript" src="jquery/jquery.charcounter.js"></script>
<title>SISTEM TEMPAHAN BILIK MESYUARAT</title>
<script>var delay = null; currDisplay = null;function layerout(obj, bgid){var element= document.getElementById(bgid);if(element!=currDisplay){if (currDisplay) { currDisplay.style.cssText+=";display:none;"; }} clearTimeout(delay);var x,y;oRect=obj.getBoundingClientRect();x= oRect.left;y= oRect.bottom;h=obj.offsetHeight;sh = 0;sh=Math.max(document.documentElement.scrollTop, document.body.scrollTop);delay= window.setTimeout(function(){element.style.cssText+=";display:block;left:"+x+"px;top:"+(y+sh+5)+"px;";},800)}function layerin(obj,e,bgid) {clearTimeout(delay); var element = document.getElementById(bgid);currDisplay = element;if (e.currentTarget){if (e.relatedTarget != obj){if (obj != e.relatedTarget.parentNode){delay = window.setTimeout(function(){element.style.cssText+=";display:none;";}, 500);}}} else {if (e.toElement != obj){if (obj != e.toElement.parentNode) {delay = window.setTimeout(function(){element.style.cssText+=";display:none;";}, 500);}}}};function MyClose(divId){clearTimeout(delay);var element = document.getElementById(divId);element.style.cssText+=";display:none;"};</script><style type="text/css">
:root #header + #content > #left > #rlblock_left
{ display: none !important; }</style></head>

</head>

<body>
<div id="header">
        <div class="sleeve">
            <img src="Image/logoPDTbatugajah.png" width="500" height="81" />
            <small>
                <a href="index.php">Sistem Tempahan Bilik Mesyuarat </a>
            </small>
<div class="navbar">
                <span><a href="index.php">Laman Utama</a></span>
                <span><a href="#">Kalendar</a></span>
                <span><a href="#">Tempahan</a></span>
                <span class="current"><a href="login_page.php">Log Masuk</a></span>
          </div>
          
          <div class="disabled" id="wrapper">
    <div class="sleeve_main">
            <div id="main">
                <h2>Log Masuk </h2>
<?php if ($error): ?>
                <div style="color:#b00020; margin-bottom:10px;"><?php echo e($error); ?></div>
<?php endif; ?>
<form action="login_page.php" method="post" id="loginform">
            <input type="hidden" name="csrf_token" value="<?php echo e(get_csrf_token()); ?>" />
            <p>
              <label>Username</label>
              <input type="text" placeholder="" name="username" required autocomplete="username">
        </p>
            <p>
              <label>Password</label>
              <input type="password" placeholder="" name="password" required autocomplete="current-password">
        </p>
            <button type="submit" name="Submit">Login</button>
        </form>
    </div>
            
  </div>
</div>
</div>
</body>
</html>
