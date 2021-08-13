<?php
include'connect.php';
$id1=$_GET['id'];
if(isset($_POST['submit']))
{
	

	$sem=$_POST['sem'];
	$dur=$_POST['duration'];
	$term=$_POST['term'];
	$entry=$_POST['entry'];

	$query="UPDATE `division` SET `sem`=$sem,`duration`='$dur',`term`='$term',`entry`=$entry WHERE `div_id`='$id1' ";
	$cmd=mysqli_query($con,$query);

	header('location:divisionview.php');
}
?>
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
<h1>Update Division Details</h1>
<form method="post" action="">
Division ID <input type="text" name="div_id" placeholder="<?php echo $id1; ?>" readonly/>
<br><br>
Semester <input type="number" name="sem" placeholder="Semester" max=6 />
<br><br>
Duration <input type="text" name="duration" placeholder="Duration">
<br><br>
<label>select term</label>
<select name="term">
    <option value="odd">Odd</option>
    <option value="even">Even</option>
</select>
<br><br>
Entry <input type="number" name="entry" placeholder="Entry">
<br><br>
<input type="submit" name="submit" value="submit">
</form></center>
</body>
</html>

