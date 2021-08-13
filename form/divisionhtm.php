<html>
<head>
<title>
Division
</title><link rel="stylesheet" type="text/css" href="table.css">

</head>
<body><center><?php
  include'menu.php';
  ?>
<center>
<h1>Enter Division Details</h1>
<form method="post" action="divisionphp.php">
<input type="text" name="div_id" placeholder="Division ID" required/>
<br><br>
<input type="number" name="sem" placeholder="Semester" max=6 required/>
<br><br>
<input type="text" name="duration" placeholder="Duration">
<br><br>
<label>select term</label>
<select name="term">
    <option value="odd">Odd</option>
    <option value="even">Even</option>
</select>
<br><br>
<input type="number" name="entry" placeholder="Entry">
<br><br>
<Select name="div">
<?php
	include'connect.php';
	$query="select * from department where dept_id not in ('000')";
	$cmd=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($cmd))
	{?>
			<option value=<?php echo $row['dept_id'] ?>> <?php echo $row['name'] ?></optisson>
		<?php }?>
	</select>

<br><br>
<input type="submit" name="submit" value="submit">
</form></center>
</body>
</html>