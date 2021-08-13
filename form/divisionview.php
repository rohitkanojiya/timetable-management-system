<html>
<head>
<title>Division view</title>
<link rel="stylesheet" type="text/css" href="table.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
<?php
  include'menu.php';
  ?>
<center>
<br>
<table border="1" id="div">
<tr>
	<th>div_id</th>
	<th>sem</th>
	<th>duration</th>
	<th>term</th>
	<th>entry</th>
	<th>update</th>
	<th>delete</th>
</tr>
<?php
	include'connect.php';
	$query="select * from division where div_id not in ('000')";
	$cmd=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($cmd))
	{?>
		<tr>
			<td><?php echo $row['div_id'] ?> </td>
			<td><?php echo $row['sem'] ?> </td>
			<td><?php echo $row['duration'] ?> </td>
			<td><?php echo $row['term'] ?> </td>
			<td><?php echo $row['entry'] ?> </td>
			<td id="update"><a href="divisionupdate.php?id=<?php echo $row['div_id']; ?>">update</a></td>
			<td id="delete"><a href="divisiondel.php?id=<?php echo $row['div_id']; ?>">delete</a></td>
		</tr>
	<?php } ?>
<tr>
<td colspan=7><center><b><a href="divisionhtm.php">Insert New Data</a></b></center></td>
</tr>
</table>
</center>
</body>
</html>
