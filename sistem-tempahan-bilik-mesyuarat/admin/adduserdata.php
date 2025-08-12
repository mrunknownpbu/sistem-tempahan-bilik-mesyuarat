<html><head><title>SISTEM TEMPAHAN BILIK MESYUARAT</title></head>

<?php
	include('connection1.php');
	
	$var_usertype=$_POST['usertype'];
	$var_username=$_POST['username'];
	$var_password=$_POST['password'];
	
	$result=mysqli_query($link,"INSERT INTO `useracc`(`id`, `usertype`, `username`, `password`) VALUES ('NULL','$var_usertype','$var_username','$var_password')");
		
	if($result)
	{
		header("location:admin_display_user.php?msg='Success'");
		}
	else
		echo
		"Problem occured !";
		
	mysqli_close($link);
	?>
