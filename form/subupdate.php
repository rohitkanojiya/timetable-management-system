<?php
include'connect.php';
$i=$_GET['id'];
$q="select * from subject where scode='$i' ";
$q1=mysqli_query($con,$q);
$q2=mysqli_fetch_array($q1);

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$sname=$_POST['sname'];
	$sem=$_POST['sem'];
	$credit=$_POST['credit'];
	//$lec=$_POST['hlec'];
	//$lab=$_POST['hlab'];
	$lec=$_POST['hlec'];$lab=$_POST['hlab'];	
	$query="UPDATE `subject` SET `name`='$name',`sname`='$sname',`sem`=$sem,`credit`=$credit,`h_lec`=$lec,`h_lab`=$lab WHERE scode=$i ";
	$cmd=mysqli_query($con,$query);

	header('location:subjectview.php');
}
?>
<html>
<head>
<title><link rel="stylesheet" type="text/css" href="table.css">

</head>
<body><center><?php
  include'menu.php';
  ?>

<center>
<h1>Update Department Details</h1>
<form method="POST" action="">
Subject Code <input type="number" name="scode" placeholder="<?php echo $i;?>" readonly/>
<br><br>
Name <input type="text" name="name" placeholder="Name" >
<br><br>
Short Name <input type="text" name="sname" placeholder="Short name" >
<br><br>
Semester <input type="number" name="sem" placeholder="Semester">
<br><br>
Credit <input type="number" name="credit" placeholder="Credit">
<br><br>
Hours Of lecture <input type="number" name="hlec" placeholder="Hours of lecture">
<br><br>
Hours Of Lab <input type="number" name="hlab" placeholder="Hours of lab">
<br><br>
<input type="submit" name="submit" value="submit">
</form>
</center>
</body>
</html>

