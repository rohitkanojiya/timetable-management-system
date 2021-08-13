<?php
	include'connect.php';
	$id1=$_GET['id'];
	$query="DELETE FROM `faculty` WHERE `fid`='$id1' ";
	$cmd=mysqli_query($con,$query);
	
	header('location:facultyview.php');
	
?>