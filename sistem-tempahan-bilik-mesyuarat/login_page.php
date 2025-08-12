<?php session_start() ;

if(isset($_POST['Submit'])){
	
$username=trim($_POST['username']);
$password=trim($_POST['password']);

if($username == "")
$error="error: Please enter your username.";

elseif($password == "")
$error="error: Please enter your password.";

else
{
	include('connection1.php');
	$row=mysqli_query($link,"SELECT * FROM useracc WHERE username='$username' and password ='$password'") or die ("Couldn't connect to database".mysqli_error($link));
	
if(mysqli_num_rows($row) >0){
	while ($res=mysqli_fetch_assoc($row)){
		$_SESSION['username']=$res['username'];
		$_SESSION['user_type']=$res['usertype'];
	}
		if($_SESSION['user_type']== 'admin')
		header("location:admin.php");
		
	if($_SESSION['user_type'] == 'user')
		header("location:user.php");
}
else {
	$error='error: You are not registered to this website';
}}} ?>

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
                <a href="index.html">Sistem Tempahan Bilik Mesyuarat </a>
            </small>
<div class="navbar">
            	<span><a href="index.html">Laman Utama</a></span>
                <span><a href="#">Kalendar</a></span>
                <span><a href="#">Tempahan</a></span>
                <span class="current"><a href="login_page.php">Log Masuk</a></span>
          </div>
          
          <div class="disabled" id="wrapper">
    <div class="sleeve_main">
            <div id="main">
                <h2>Log Masuk </h2>
<form action="login_page.php" method="post" id="loginform">
			<p>
			  <label>Username</label>
              <input type="text" placeholder="" name="username" required>
	    </p>
			<p>
              <label>Password</label>
			  <input type="password" placeholder="" name="password" required>
	    </p>
			<button type="submit" name="Submit">Login</button>
		</form>
	</div>
            
  </div>
</div>
</div>
</body>
</html>
