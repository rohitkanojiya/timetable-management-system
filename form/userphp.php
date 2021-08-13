<?php
	$dept_id=$_POST['user'];
	$name=$_POST['password'];

	$con=mysql_connect("localhost","root");
	$db=mysql_selectdb("timetable");
	$query="insert into user values('','$user','$password')";
	$cmd=mysql_query($query);
	
	if($cmd)
		echo "Record inserted";
	else
		echo "Record not inserted";
?>