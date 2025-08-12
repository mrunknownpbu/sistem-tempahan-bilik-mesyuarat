<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../Template/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../Template/custom.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../Template/timePicker.css" media="screen" />
<link rel="stylesheet" href="../Template/jquery-ui-1.7.custom.css" type="text/css" />
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="../jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="../jquery/jquery.timepicker.js"></script>
<script type="text/javascript" src="../jquery/jquery.charcounter.js"></script>
<title>SISTEM TEMPAHAN BILIK MESYUARAT</title>
<script>var delay = null; currDisplay = null;function layerout(obj, bgid){var element= document.getElementById(bgid);if(element!=currDisplay){if (currDisplay) { currDisplay.style.cssText+=";display:none;"; }} clearTimeout(delay);var x,y;oRect=obj.getBoundingClientRect();x= oRect.left;y= oRect.bottom;h=obj.offsetHeight;sh = 0;sh=Math.max(document.documentElement.scrollTop, document.body.scrollTop);delay= window.setTimeout(function(){element.style.cssText+=";display:block;left:"+x+"px;top:"+(y+sh+5)+"px;";},800)}function layerin(obj,e,bgid) {clearTimeout(delay); var element = document.getElementById(bgid);currDisplay = element;if (e.currentTarget){if (e.relatedTarget != obj){if (obj != e.relatedTarget.parentNode){delay = window.setTimeout(function(){element.style.cssText+=";display:none;";}, 500);}}} else {if (e.toElement != obj){if (obj != e.toElement.parentNode) {delay = window.setTimeout(function(){element.style.cssText+=";display:none;";}, 500);}}}};function MyClose(divId){clearTimeout(delay);var element = document.getElementById(divId);element.style.cssText+=";display:none;"};</script><style type="text/css">
:root #header + #content > #left > #rlblock_left
{ display: none !important; }</style></head>

</head>

<body>
<div id="header">
        <div class="sleeve">
            <img src="../Image/logoPDTbatugajah.png" width="689" height="81" />
            <small>
                <a href="index.html">Sistem Tempahan Bilik Mesyuarat </a>
            </small>
            <div class="navbar">
            	<span><a href="../admin.php">Laman Utama</a></span>
				<span><a href="#">Kalendar</a></span>
				<span><a href="#">Tempahan</a></span>
				<span><a href="adduser.html">Daftar Baru</a></span>
                <span class="current"><a href="admin_display_user.php">Papar Pengguna</a></span>
            </div>
        </div>
    </div>
    
    <div id="wrapper">
    <div class="sleeve_main">
            <div id="main">
            
            <form action="admin.php" method="post" id="loginform">


<h3>Senarai User</h3>
	<table width="620" border="1">
    <tr bgcolor="#00cc66">
    	<th width="58">ID</th>
        <th width="188">User Type</th>
        <th width="147">Username</th>
        <th width="99">Password</th>
        </tr>
        
        <?php
        include("connection1.php");
        $query="SELECT*FROM useracc";
        $result=mysqli_query($link,$query) or die ("Select Error".mysqli_error($link));
        while($row=mysqli_fetch_array($result)){
        ?>
        
        
     <tr>
     	<td><?php echo $row['id']; ?>&nbsp;</td>
        <td><?php echo $row['usertype'];?>&nbsp;</td>
        <td><?php echo $row['username'];?>&nbsp;</td>
        <td><?php echo $row['password'];?>&nbsp;</td>
        </tr>
        
        <?php
            }
            mysqli_close($link);
        ?>
        
        
<table>
    <input type="submit" value="Home Page" />
    </form>