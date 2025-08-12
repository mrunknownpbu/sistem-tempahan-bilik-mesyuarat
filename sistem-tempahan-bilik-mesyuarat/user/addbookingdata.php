<html><head><title>SISTEM TEMPAHAN BILIK MESYUARAT</title></head>

<?php
	include('connection1.php');
	
	$var_unit=$_POST['unit'];
	$var_meetingname=$_POST['meetingname'];
	$var_date=$_POST['date'];
	$var_Place=$_POST['Place'];
	$var_memnumber=$_POST['memnumber'];
	$var_food=$_POST['food'];
	
	$result=mysqli_query($link,"INSERT INTO `booking`(`unit`, `name`, `date`, `place`, `member`, `foodorder`) VALUES ('$var_unit','$var_meetingname','$var_date','$var_Place','$var_memnumber','$var_food')");
		
	if($result)
	{
		header("location:dislpay_booking.php?msg='Success'");
		}
	else
		echo
		"Problem occured !";
		
	mysqli_close($link);
	?>
