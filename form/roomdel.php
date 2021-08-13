<?php
include'connect.php';
	$id1=$_GET['id'];
	$query="DELETE FROM `room` WHERE `rno`='$id1' ";
	$cmd=mysqli_query($con,$query);
	
	header('location:roomview.php');
	
?>