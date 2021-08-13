<?php
include'connect.php';
$i=$_GET['id'];
$q="select * from department where dept_id='$i' ";
$q1=mysqli_query($con,$q);
$q2=mysqli_fetch_array($q1);

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
		
	$query="UPDATE `department` SET `name`='$name' WHERE dept_id='$i' ";
	$cmd=mysqli_query($con,$query);

	header('location:deptview.php');
}
?>
<html>
<head>
<title>
Enter Department Details
</title><link rel="stylesheet" type="text/css" href="table.css">

</head>
<body><center><?php
  include'menu.php';
  ?>
<center>
<h1>Update Department Details</h1>
<form method="POST" action="">
Department ID <input type="text" name="dept_id" placeholder="<?php echo $q2['dept_id']; ?>" readonly><br><br>
Department Name <input type="text" name="name" placeholder="<?php echo $q2['name']; ?>"><br><br>
<input type="submit" name="submit" value="submit">
</form>
</center>
</body>
</html>

