<html>
<head>
<title>Room table</title>
<link rel="stylesheet" type="text/css" href="table.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>

<?php
  include'menu.php';
  ?>
<center>
<h1>Room Details</h1>
<br>
<table border="1"id="div">
<tr>
	<th>Room No</th>
	<th>Type</th>
	<th>Floor</th>
	<th>Block</th>
	<th>update</th>
	<th>delete</th>

</tr>
<?php
	include'connect.php';
	$query="select * from room where rno not in ('NONE')";
	$cmd=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($cmd))
	{?>
		<tr>
			<td><?php echo $row['rno'] ?> </td>
			<td><?php echo $row['type'] ?> </td>
			<td><?php echo $row['floor'] ?> </td>
			<td><?php echo $row['block'] ?> </td>
			<td id="update"><a href="roomupdate.php?id=<?php echo $row['rno']; ?>">update</a></td>
			<td id="delete"><a href="roomdel.php?id=<?php echo $row['rno']; ?>">delete</a></td>
		</tr>
	<?php } ?>
<tr>
<td colspan=6><center><b><a href="roomhtm.php">Insert New Data</a></b></center></td>
</tr>
</table>
</center>
</body>
</html>
