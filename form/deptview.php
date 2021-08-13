<html>
<head>
<title>Department View</title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
<?php
  include'menu.php';
  ?>
<center>
<br>
<table border="1" id="div">
<tr>
	<th>Department ID</th>
	<th>Name</th>
	<th>Update</th>
	<th>Delete</th>
</tr>
<?php
	include'connect.php';
	$query="select * from department where dept_id not in ('000')";
	$cmd=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($cmd))
	{?>
		<tr>
			<td><?php echo $row['dept_id'] ?> </td>
			<td><?php echo $row['name'] ?> </td>
			<td id="update"><a href="deptupdate.php?id=<?php echo $row['dept_id']; ?>">Update</a></td>
			<td id="delete"><a href="deptdel.php?id=<?php echo $row['dept_id']; ?>">Delete</a></td>
		</tr>
	<?php } 
?>
<tr>
<td colspan=5><center><b><a href="depthtm.php">Insert New Data</a></b></center></td>
</tr>
</table>
</center>
</body>
</html>
