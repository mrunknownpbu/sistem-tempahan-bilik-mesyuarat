<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/connection1.php';
require_login('user');
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
<body>
<div id="header">
        <div class="sleeve">
            <img src="Image/logoPDTbatugajah.png" width="500" height="81" />
            <small>
                <a href="../index.php">Sistem Tempahan Bilik Mesyuarat </a>
            </small>
            <div class="navbar">
                <span class="current"><a href="user.php">Laman Utama</a></span>
                <span><a href="#">Kalendar</a></span>
                <span><a href="booking.php">Tempahan</a></span>
            </div>
        </div>
    </div>
    
    <div id="wrapper">
    <div class="sleeve_main">
            <div id="main">
            
            <form action="admin.php" method="post" id="loginform">


<h3>Senarai Tempahan</h3>
<?php if (isset($_GET['msg'])): ?>
<div style="margin:6px 0; color:#064;">Status: <?php echo e($_GET['msg']); ?></div>
<?php endif; ?>
    <table width="620" border="1">
    <tr bgcolor="#00cc66">
        <th width="58">Unit</th>
        <th width="58">Nama Mesyuarat</th>
        <th width="188">Tarikh</th>
        <th width="147">Tempat Mesyuarat</th>
        <th width="99">Jumlah Ahli Mesyuarat</th>
        <th width="58">Tempahan Makanan</th>
        </tr>
        
        <?php
        $query = 'SELECT unit, name, date, place, member, foodorder FROM booking ORDER BY date DESC';
        $result = mysqli_query($link, $query) or die ('Select Error'.mysqli_error($link));
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        
     <tr>
        <td><?php echo e($row['unit']); ?>&nbsp;</td>
        <td><?php echo e($row['name']); ?>&nbsp;</td>
        <td><?php echo e($row['date']); ?>&nbsp;</td>
        <td><?php echo e($row['place']); ?>&nbsp;</td>
        <td><?php echo e($row['member']); ?>&nbsp;</td>
        <td><?php echo e($row['foodorder']); ?>&nbsp;</td>
        </tr>
        
        <?php
            }
            mysqli_close($link);
        ?>
        
        
<table>
    <input type="submit" value="Home Page" />
    </form>
    </div>
    </div>
</div>
</body>
</html>