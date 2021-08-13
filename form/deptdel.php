<?php
	include'connect.php';
	$id1=$_GET['id'];
	$query="DELETE FROM `department` WHERE `dept_id`='$id1' ";
	$cmd=mysqli_query($con,$query);
	
	header('location:deptview.php');
	
?>