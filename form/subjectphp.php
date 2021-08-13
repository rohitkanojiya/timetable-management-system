<?php
	$scode=$_POST['scode'];
	$name=$_POST['name'];
	$credit=$_POST['credit'];
	$h_lec=$_POST['h_lec'];
	$h_lab=$POST['h_lab'];

	$con=mysql_connect("localhost","root");
	$db=mysql_selectdb("timetable");
	$query="insert into subject values($sid,'$name',$credit,$h_lec,$h_lab)";
	$cmd=mysql_query($query);
	
	if($cmd)
		echo "Record inserted";
	else
		echo "Record not inserted";
?>