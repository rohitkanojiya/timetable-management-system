<?php
	
/* It's as it is */
	
		$con = mysql_connect ("localhost","root");
	
	
/* Here krishna is database name which you are created in a phpmyadmin	*/
	
		$db = mysql_selectdb("krishna");
	
/* This query for inset a record in a database 
		Here student is a table name which you are create in a krishna database in phpmyadmin*/ 
	
		$query = "insert into student values ('$_POST[rollno]','$_POST[name]',$_POST[standard],'$_POST[div]','$_POST[city]')";
	
/* It's as it is */	
		$cmd = mysql_query($query, $con);
		if ($cmd) echo "Record Successfully Inserted ";
		else echo "Record Not Inserted !!!";	
	
		
?>