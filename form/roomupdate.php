<?php
include'connect.php';
	$id1=$_GET['id'];
if(isset($_POST['submit']))
{
	
	$type=$_POST['type'];
	$floor=$_POST['floor'];
	$block=$_POST['block'];
	$query="UPDATE `room` SET `type`='$type',`floor`='$floor',`block`='$block' WHERE `rno`='$id1' ";
	$cmd=mysqli_query($con,$query);
if (!$cmd) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

	header('location:roomview.php');
}
?>

<html>
<head>
<title>
Room
</title><link rel="stylesheet" type="text/css" href="table.css">

</head>
<body><center><?php
  include'menu.php';
  ?>
<center>
<h1> Room Update</h1>
<form method="post" action="">

Room No <input type="text" name="rno" placeholder="<?php echo $id1; ?>" readonly/>
<br><br>
Type <input type="text" name="type" placeholder="Type" />
<br><br>
Floor <input type="text" name="floor" placeholder="Floor">
<br><br>
Block <input type="text" name="block" placeholder="block">
<br><br>
<input type="submit" name="submit" value="submit">
</form></center>
</body>
</html>