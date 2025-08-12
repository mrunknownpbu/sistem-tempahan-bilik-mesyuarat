<?php require_once __DIR__ . '/init.php'; ?>
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
                <span class="current"><a href="index.php">Laman Utama</a></span>
                <span><a href="#">Kalendar</a></span>
                <?php if (!empty($_SESSION['user_type'])): ?>
                    <?php if ($_SESSION['user_type'] === 'admin'): ?>
                        <span><a href="admin.php">Halaman Admin</a></span>
                    <?php else: ?>
                        <span><a href="user.php">Halaman Pengguna</a></span>
                    <?php endif; ?>
                    <span style="float:right"><a href="logout.php">Log Keluar (<?php echo e($_SESSION['username']); ?>)</a></span>
                <?php else: ?>
                    <span><a href="login_page.php">Log Masuk</a></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div id="wrapper">
    <div class="sleeve_main">
            <div id="main">
                <h2>Sistem Tempahan Bilik Mesyuarat </h2>
<p>Selamat datang ke Sistem Tempahan Bilik Mesyuarat. Ia merupakan aplikasi 
atas talian yang dibangunkan bertujuan memberi kemudahkan kepada 
pihak PDT menguruskan tempahan bilik mesyuarat di bawah seliaan PDT.</p>
    </div>
</div>
    
</body>
</html>