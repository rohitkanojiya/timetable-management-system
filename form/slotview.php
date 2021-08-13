<html>
<head>
<title>Room table</title>
<link rel="stylesheet" type="text/css" href="table.css">
<style>
#slot tr:nth-child(even){background-color:gray;}
//#slot tr:hover {background-color: #ddd;}
</style>
<body><center>
<h1>Slot Details</h1>
<br>
<table border="1" id="div">
<tr>
	<th>Slot ID</th>
	<th>Time</th>
	<th>Day</th>
	<th>Batch</th>

</tr>
<?php
	$con=mysqli_connect("localhost","root");
	$db=mysqli_selectdb($con,"timetable");
	$query="select * from slot";
	$cmd=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($cmd))
	{?>
		<tr>
			<td><?php echo $row['sid'] ?> </td>
			<td><?php echo $row['time'] ?> </td>
			<td><?php echo $row['day'] ?> </td>
			<td><?php echo $row['batch'] ?> </td>
		</tr>
	<?php } ?>
</table>
</center>
</body>
</html>
