<html>
<head>
<title>Time table
</title>
<link rel="stylesheet" type="text/css" href="../css/creatett_css.css">
<style type="text/css">
    *{
        padding: 0px;
        margin: 0px;
    }
</style>
</head>
<body><div style="float: left;width: 100%"><center>
<table border="1" id="timetable">
<tr>
  <th>Subject Code</th>
  <th>Name</th>
  <th>L</th>
  <th>RL</th>
  <th>P</th>
  <th>RP</th>
</tr>
<?php
session_start();
  if (isset($_SESSION['semester'])) {
include 'connect.php';
  $query="select * from subject where sem=".$_SESSION['semester'];
  $cmd=mysqli_query($con,$query);
  while($row=mysqli_fetch_array($cmd))
  {?>

    <tr>
      <td><?php echo $row['scode'] ?> </td>
      <td><?php echo $row['sname'] ?> </td>
      <td><?php echo $row['h_lec'] ?> </td>
      <td><?php echo $row['rl'] ?> </td>
      <td><?php echo $row['h_lab'] ?> </td>
      <td><?php echo $row['rp'] ?> </td>

    </tr>
  <?php } }?>
</table>
<h4>* L=Lecture P=Practical T=Tutorial
<p>RL=Remaining lecture RP=Remainig Practical</p></h4>
 </div></center>
</body>
</html>
