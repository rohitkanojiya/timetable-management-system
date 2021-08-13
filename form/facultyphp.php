<?php
	$fid=$_POST['fid'];
	$sname=$_POST['sname'];
	$fullname=$_POST['fullname'];
	$contact_no=$_POST['contact_no'];
	$email_id=$_POST['email_id'];
	$joining_date=$_POST['joining_date'];
	$designation=$_POST['designation'];
	$avail_load=$_POST['avail_load'];

	include'connect.php';
	$query="insert into faculty values('$fid','$sname','$fullname',$contact_no,'$email_id',$joining_date,'$designation',$avail_load)";
	$cmd=mysql_query($query);
	
	header('location:facultyview.php');
?>