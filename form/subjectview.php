<html>
<head>
<title>Subject table</title>
<link rel="stylesheet" type="text/css" href="table.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
<?php
  include'menu.php';
  ?>
<center>
<h1>Subject Details</h1>
<br>
<table border="1" id="div">
<tr>
	<th>Subject Code</th>
	<th>Name</th>
	<th>sname</th>
	<th>sem</th>
	<th>Credit</th>
	<th>h_lec</th>
	<th>h_lab</th>
	<th>Update</th>
	<th>Delete</th>
</tr>
<?php

		include'connect.php';
	$query="select * from subject where scode not in ('0')";
	$cmd=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($cmd))
	{?>
		<tr>
			<td><?php echo $row['scode'] ?> </td>
			<td><?php echo $row['name'] ?> </td>
			<td><?php echo $row['sname'] ?></td>
			<td><?php echo $row['sem']; ?></td>
			<td><?php echo $row['credit'] ?> </td>
			<td><?php echo $row['h_lec'] ?> </td>
			<td><?php echo $row['h_lab'] ?> </td>
			<td id="update"><a href="subupdate.php?id=<?php echo $row['scode']; ?>">update</a></td>
			<td id="delete"><a href="subdel.php?id=<?php echo $row['scode']; ?>">delete</a></td>
		</tr>
	<?php } ?>
<tr>
<td colspan=9><center><b><a href="subjecthtm.php">Insert New Data</a></b></center></td>
</tr>
</table>
</center>
</body>
</html>
