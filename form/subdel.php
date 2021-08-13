<?php
	include'connect.php';
	$id1=$_GET['id'];
	$query="DELETE FROM `subject` WHERE scode=$id1 ";
	$cmd=mysqli_query($con,$query);
	
	header('location:subjectview.php');
	
?>