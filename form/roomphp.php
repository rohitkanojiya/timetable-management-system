<?php
	$rno=$_POST['rno'];
	$type=$_POST['type'];
	$floor=$_POST['floor'];
	$block=$_POST['block'];

	include'connect.php';
	$query="insert into room values('$rno','$type','$floor','$block')";
	$cmd=mysqli_query($con,$query);
if (!$cmd) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
	header('location:roomview.php');
?>