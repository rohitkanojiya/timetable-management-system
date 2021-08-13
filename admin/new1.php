<html>
<head>
<title>Faculty table</title>
<style>
#fact tr:nth-child(even){background-color:gray;}
//#fact tr:hover {background-color: #ddd;}
</style>
<body><center>
<h1>Faculty Details</h1>
<br>
<table border="1" id="fact">
	<tr>
	<th>Name</th>
	<th>TH</th>
	<th>AH</th>
</tr>
<?php
	$con=mysqli_connect("localhost","root");
	$db=mysqli_select_db($con,"timetable");
	$query="select * from faculty";
	$cmd=mysqli_query($con,$query);


		for($i=1;$i<=15;$i++)
		{
			if($i>=10)
			{	
				$a=$i;
				$c="f".$a;
			}
			else
			{
				$a=$i;
				$b=0;
				$c="f".$b.$a;
				
			}
		
	
	
			$q2="select * from slotfac where fid='$c' ";
			$cmd2=mysqli_query($con,$q2);
			$rowcount=mysqli_num_rows($cmd2);
			//printf(" %d .\n",$rowcount);
 
			$q3="SELECT total_load FROM faculty WHERE fid ='$c' ";
			$cmd3=mysqli_query($con,$q3);
			$row3=mysqli_fetch_array($cmd3);
			//echo $row3['0'];
			//echo "<br>";
			$ans=$row3['0']-$rowcount;
			$up="UPDATE `faculty` SET `avail_load`='$ans' WHERE `fid`='$c' ";
			$up1=mysqli_query($con,$up);
	
		}	
	
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
</body>
</html>
