<?php
	echo $dept_id=$_POST['dept_id'];
	echo $name=$_POST['name'];
	echo $sname=$_POST['sname'];

	include'connect.php';

	$query="INSERT INTO `department`(`dept_id`, `name`, `sname`) VALUES ('$dept_id','$name','$sname')";
	$cmd=mysqli_query($con,$query);
	if (!$cmd) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

	header('location:deptview.php');
?>