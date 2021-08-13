<?php
session_start();

include "connect.php";
if ($_SESSION['term']=='even') {

	$q1="select * from faculty";
	$cmd1=mysqli_query($con,$q1);
	 while($row=mysqli_fetch_array($cmd1))
      {
      	$id=$row['fid'];
        $tload=$row['total_load'];
        $q2="update faculty set avail_load=$tload where fid='$id' ";
        $cmd2=mysqli_query($con,$q2);
      }

      $qs1="select * from subject";
      $cmds1=mysqli_query($con,$qs1);
      while($row=mysqli_fetch_array($cmds1))
      {
      	$sc=$row['scode'];
      	$lec=$row['h_lec'];
      	$lab=$row['h_lab'];
      	$qs2="update subject set rl=$lec,rp=$lab where scode=$sc";
      	$cmds2=mysqli_query($con,$qs2);
      }


	for($i=0;$i<7;$i+=2){
			$dept=$_SESSION['sdept'];
				
			$query="DELETE FROM `slot` WHERE `slot`.`sid` like '$dept$i%' ";
			$cmd=mysqli_query($con,$query);
			
	}
if (!$cmd) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
else
{
	header("Location:slot_selection.php");
}

}

else
	for($i=1;$i<6;$i+=2){
		$dept=$_SESSION['sdept'];
				$query="DELETE FROM `slot` WHERE `slot`.`sid` like '$dept$i%' ";
			$cmd=mysqli_query($con,$query);
	}
	if (!$cmd) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
else
{
	header("Location:slot_selection.php");
}

?>