<?php
	$div_id=$_POST['div_id'];
	$sem=$_POST['sem'];
	$duration=$_POST['duration'];
	$term=$_POST['term'];
	$entry=$_POST['entry'];
	$div=$_POST['div'];
	include'connect.php';
	$query="insert into division values('$div_id',$sem,'$duration','$term',$entry,'$div')";
	$cmd=mysqli_query($con,$query);
	if (!$cmd) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

	header('location:divisionview.php');
?>