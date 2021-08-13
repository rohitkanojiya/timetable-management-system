<?php
	include'connect.php';
	$id1=$_GET['id'];
	$query="DELETE FROM `division` WHERE `div_id`='$id1' ";
	$cmd=mysqli_query($con,$query);
	
	header('location:divisionview.php');
	
?>