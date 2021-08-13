<?php
          $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
           
   if(! $con ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM slotfac where sid="CE4001"';
   $retval = mysqli_query( $con, $sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
      $sum[]=$row['fid'];
      echo "S ID :{$row['sid']}  <br> "."F ID : {$row['fid']} <br> ";
         
   }

   echo "Fetched data successfully\n";
   
   echo $sum[0].$sum[1];

   mysqli_close($con);
?>