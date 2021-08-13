<?php session_start();
 $_SESSION['labwork']="Kindly First Select laboratry slot on timetable from clicking on EDIT LABORATORY..!";

include 'connect.php';
   if (isset($_POST['dept'])) {
      $_SESSION['dept']= $_POST['dept'];
    if(isset($_SESSION['dept']))
    {

    if (isset($_POST['term'])) {
           $_SESSION['term'] = $_POST['term'];
    }

  $depte=$_SESSION['dept'];
  $tm=$_SESSION['term'];

      $query="select *from department where name='$depte'";
      $cmd=mysqli_query($con,$query);
      $sdept=mysqli_fetch_assoc($cmd);
      $_SESSION['sdept']=$sdept['sname'];
      if (!$cmd) {
         printf("Error: %s\n", mysqli_error($con));
           exit();
      }
    }
}

$dept=$_SESSION['sdept'];

$a=0;
  if ($tm=='even') {
  	for ($t=2; $t<7; $t+=2) {
        for ($i=0; $i < 6; $i++) {
          for($j=0;$j<7;$j++){
            $query="INSERT INTO slot VALUES ('$dept$t$j$i$a', 'ABCD', '000000', 'NONE', '000')";
              $cmd=mysqli_query($con,$query);
            $query="INSERT INto slotfac VALUES ('$dept$t$j$i$a','000')";
              $cmd=mysqli_query($con,$query);

           }
        }
       }

         if($cmd)
             header("Location:Table1.php" );
               else
             header("Location:slot_selection.php" );

  }
  else{
   for ($t=1; $t<6; $t+=2) {
        for ($i=0; $i < 6; $i++) {
          for($j=0;$j<7;$j++){
            $query="INSERT INTO slot VALUES ('$dept$t$j$i$a', 'ABCD', '000000', , 'NONE', '000')";
              $cmd=mysqli_query($con,$query);

            $query="INSERT INto slotfac VALUES ('$dept$t$j$i$a','000')";
              $cmd=mysqli_query($con,$query);

           }
        }
       }
         if($cmd)
             header("Location:Table1.php" );
               else
             header("Location:slot_selection.php" );


  }
?>
