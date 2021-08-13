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
<body><div style="float: left; width: 70%;"><center>
<table border="1" id="timetable">
  <tr>
  <th>Name</th>
  <th>TH</th>
  <th>AH</th>
</tr>
<?php
   include "connect.php";
  $query="SELECT * from faculty where fid not in ('000','001')";
  $cmd=mysqli_query($con,$query);

  while($row=mysqli_fetch_array($cmd))
  {?>
    <tr>
      <td><?php echo $row['sname'] ?> </td>
      <td><?php echo $row['total_load'] ?> </td>
      <td><?php echo $row['avail_load'] ?></td>
      <?php } ?>

</tr>
</table>
<h4>* TH=Total Hour AH=Avaiable Hour</h4>
</center>
</div>
</body>
</html>
