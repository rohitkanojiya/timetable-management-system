<?php
	$id=$_POST['id'];
	$name=$_POST['name'];
	$cont=$_POST['contact_no'];
	$email=$_POST['email'];
	$adhar_no=$_POST['adhar_no'];
	$salary=$_POST['salary'];
	$psw=$_POST['psw'];

	include'connect.php';

	$query="INSERT INTO `manager` VALUES ('$id','$name',$cont,'$email',$adhar_no,$salary,'$psw')";
	$cmd=mysqli_query($con,$query);
	if (!$cmd) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

	//header('location:deptview.php');
?>