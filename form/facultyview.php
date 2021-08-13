<html>
<head>
<title>Faculty table</title>
<link rel="stylesheet" type="text/css" href="table.css">
<link rel="stylesheet" type="text/css" href="../css/main.css"></head>
<body>
<?php
  include'menu.php';
  ?>
<center>
<h1>Faculty Details</h1>
<br>
<table border="1" id="div">
<tr>
	<th>Faculty ID</th>
	<th>Short Name</th>
	<th>Full Name</th>
	<th>Conatact No</th>
	<th>Email</th>
	<th>joining Date</th>
	<th>Designation</th>
	<th>Avial Load</th>
	<th>update</th>
	<th>delete</th>
</tr>
<?php
	include'connect.php';
	$query="select * from faculty where fid not in ('000','001')";
	$cmd=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($cmd))
	{?>
		<tr>
			<td><?php echo $row['fid'] ?> </td>
			<td><?php echo $row['sname'] ?> </td>
			<td><?php echo $row['fullname'] ?> </td>
			<td><?php echo $row['contact_no'] ?> </td>
			<td><?php echo $row['email_id'] ?> </td>
			<td><?php echo $row['joining_date'] ?> </td>
			<td><?php echo $row['designation'] ?> </td>
			<td><?php echo $row['total_load'] ?> </td>
			<td id="update"><a href="facultyupdate.php?id=<?php echo $row['fid']; ?>">update</a></td>
			<td id="delete"><a href="facultydel.php?id=<?php echo $row['fid']; ?>">delete</a></td>
		</tr>
	<?php } ?>
<tr>
<td colspan=10><center><b><a href="facultyhtm.php">Insert New Data</a></b></center></td>
</tr>
</table>
</center>
</body>
</html>
