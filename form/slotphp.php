<?php
	$sid=$_POST['sid'];
	$time=$_POST['time'];
	$day=$_POST['day'];
	$batch=$_POST['batch'];

	$con=mysql_connect("localhost","root");
	$db=mysql_selectdb("timetable");
	$query="insert into slot values('$sid','$time','$day','$batch')";
	$cmd=mysql_query($query);
	
	if($cmd)
		echo "Record inserted";
	else
		echo "Record not inserted";
?>