
<!DOCTYPE html>
<html>
<head><title>Create Timetable</title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
  <script src="../js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../css/creatett_css.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<?php
    session_start();
        $lab=0;
          include "connect.php";

    if (isset($_POST['dept'])) {
      $_SESSION['dept']= $_POST['dept'];
    }
    if (isset($_POST['term'])) {
    $_SESSION['term'] = $_POST['term'];
      }


?>

<body>
     <h1><center>Bhailalbhai and Bhikhabhai Institute of Technology</center></h1>
     <h2><center><?php echo $_SESSION['dept'];?></center></h1><br>
      <ul class="main-navigation">
  <li><a href="adminhome.php">Home</a></li>

    </li>
    <li><a href="#"> Manage Timetable</a>
    </li>
    <li><a href="delete_timetable"> Delete This Timetable</a>
    </li>
    <li><a href="complete.php"> Complete </a>
    </li>

  <li><a href="logout.php">Log Out</a></li>
</ul>
<div>
 <form id="myform" method="post" action="table1.php">
        <?php

             $tm=$_SESSION['term'];
             $query = "SELECT * FROM division Where term='$tm'";
             $result = mysqli_query($con,$query);
             while ($row = mysqli_fetch_array($result))
                   $sem[]=$row['sem'];


         ?>

<br>
<br>
<center><input type="submit" class="divi" name="one" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[0];?>">
      <input type="submit" class="divi" name="two" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[1];?>">
      <input type="submit" class="divi" name="three" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[2];?>"></br>
</center>
<br>
<iframe src="faculty_table.php" style="border:none;float: left;" height="500px" width="30%"></iframe>
<?php
  if (isset($_POST['one']))
 {
      $_SESSION['semester']=$sem[0];
      $labname=$_SESSION['sdept'].$_SESSION['semester'].'lab';
      $lecname=$_SESSION['sdept'].$_SESSION['semester'].'lec';
      if(isset($_SESSION[$labname])){
        $true=0;
      }
      else{
        $true=1;
      }
     $_SESSION['tmp']=1;
      $term=$_SESSION['semester'];
  echo "<label  style="."margin-left:25px;"."><B>Division:</B></label>";
      $_SESSION['DIV']="DIV :".$_SESSION['sdept']."-".$sem[0];
      echo "<label class='lbldivd'>". $_SESSION['DIV']."</label>";

 }
 elseif(isset($_POST['two']))
 {  $_SESSION['semester']=$sem[1];

      $_SESSION['tmp']=2;

      $labname=$_SESSION['sdept'].$_SESSION['semester'].'lab';
      $lecname=$_SESSION['sdept'].$_SESSION['semester'].'lec';
       if(isset($_SESSION[$labname])) {
        $true=0;
      }
      else{
        $true=1;
      }
      $term=$_SESSION['semester'];

  echo "<label  style="."margin-left:25px;"."><B>Division:</B></label>";
      $_SESSION['DIV']="DIV :".$_SESSION['sdept']."-".$sem[1];
      echo "<label class='lbldivd'>". $_SESSION['DIV']."</label>";

 }
 elseif (isset($_POST['three']))
 {
     $_SESSION['semester']=$sem[2];

      $_SESSION['tmp']=3;

      $labname=$_SESSION['sdept'].$_SESSION['semester'].'lab';
      $lecname=$_SESSION['sdept'].$_SESSION['semester'].'lec';
         if(isset($_SESSION[$labname])) {
        $true=0;
      }
      else{
        $true=1;
      }
      $term=$_SESSION['semester'];

  echo "<label  style="."margin-left:25px;"."><B>Division:</B></label>";
      $_SESSION['DIV']="DIV :".$_SESSION['sdept']."-".$sem[2];
      echo "<label class='lbldivd'>". $_SESSION['DIV']."</label>";

 }
 else{
  if (!isset($_SESSION['tmp'])) {
     $_SESSION['tmp']=1;
      if ($_SESSION['tmp']==1) {
      $_SESSION['semester']=$sem[0];

      $labname=$_SESSION['sdept'].$_SESSION['semester'].'lab';
      $lecname=$_SESSION['sdept'].$_SESSION['semester'].'lec';
       if(isset($_SESSION[$labname])) {
        $true=0;
      }
      else{
        $true=1;
      }
      $term=$_SESSION['semester'];$lab=0;
    }
  }
  else
  {
     if ($_SESSION['tmp']==1) {
      $_SESSION['semester']=$sem[0];

      $labname=$_SESSION['sdept'].$_SESSION['semester'].'lab';
      $lecname=$_SESSION['sdept'].$_SESSION['semester'].'lec';
        if(isset($_SESSION[$labname])) {
        $true=0;
      }
      else{
        $true=1;
      }
      $term=$_SESSION['semester'];
    }
    elseif ($_SESSION['tmp']==2) {
  $_SESSION['semester']=$sem[1];

      $labname=$_SESSION['sdept'].$_SESSION['semester'].'lab';
      $lecname=$_SESSION['sdept'].$_SESSION['semester'].'lec';
        if(isset($_SESSION[$labname])) {
        $true=0;
      }
      else{
        $true=1;
      }
      $term=$_SESSION['semester'];
  }
   elseif ($_SESSION['tmp']==3) {
   $_SESSION['semester']=$sem[2];
       $labname=$_SESSION['sdept'].$_SESSION['semester'].'lab';
      $lecname=$_SESSION['sdept'].$_SESSION['semester'].'lec';
      if(isset($_SESSION[$labname])) {
        $true=0;
      }
      else{
        $true=1;
      }
      $term=$_SESSION['semester'];
  }
  }


  if (isset($_SESSION['DIV'])) {?>
  <div class="lbldivc" style="margin-left:25px;"><B id="sel">Division:<label id="lbldiv"><?php echo $_SESSION['DIV'];?></B></label></div><?php

     $term=$_SESSION['semester'];
  }
  else{?>
  <div class="lbldivc" style="margin-left:25px;"><B id="seles">Division:<label id="lbldiv">Select division</B></label></div><?php
    }

 }
 if (isset($_SESSION['semester'])) {

      $term=$_SESSION['semester'];//set sem and lab variable valuee
 }

  ?>
</script><br><br>
<div class="selectdiv" style="float: left; width: 30%;"><center>
 <?php
 // echo $_SESSION['semester'];
if (isset($_POST['txt'])) {
  if (!$_POST['txt']=="") {
  $_SESSION['id']=$_POST['txt'];
  $day=substr($_SESSION['id'],4,1);
  $time=substr($_SESSION['id'],3,1);
  }
  else{
}
}else{

  }
?>
     <B> <label>Day:</label></B><select name="day" id="day">
    <option id="day" value="0" <?php if(isset($day)){if ($day=="0") { echo "selected";}else{echo "";}}?>>Monday</option>
    <option id="day" value="1" <?php if(isset($day)){if ($day=="1") { echo "selected";}else{echo "";}}?> >Tuesday</option>
    <option id="day" value="2" <?php if(isset($day)){if ($day=="2") { echo "selected";}else{echo "";}}?>>Wednesday</option>
    <option id="day" value="3" <?php if(isset($day)){if ($day=="3") { echo "selected";}else{echo "";}}?>>Thursday</option>
    <option id="day" value="4" <?php if(isset($day)){if ($day=="4") { echo "selected";}else{echo "";}}?>>Friday</option>
    <option id="day" value="5" <?php if(isset($day)){if ($day=="5") { echo "selected";}else{echo "";}}?>>Saturday</otion>
  </select>
  <B> <label>Hour:</label></B><select name="hour" id="time">
    <option id="time" value="0"<?php if(isset($time)){if ($time=="0") { echo "selected";}else{echo "";}}?>>10:30 To 11:30</option>
    <option id="time" value="1"<?php if(isset($time)){if ($time=="1") { echo "selected";}else{echo "";}}?>>11:30 To 12:30</option>
    <option id="time" value="2"<?php if(isset($time)){if ($time=="2") { echo "selected";}else{echo "";}}?>>12:30 To 1:30</option>
    <option id="time" value="3"<?php if(isset($time)){if ($time=="3") { echo "selected";}else{echo "";}}?>>2:00 To 3:00</option>
    <option id="time" value="4"<?php if(isset($time)){if ($time=="4") { echo "selected";}else{echo "";}}?>>3:00 To 4:00</option>
    <option id="time" value="5"<?php if(isset($time)){if ($time=="5") { echo "selected";}else{echo "";}}?>>4:00 To 5:00</option>
    <option id="time" value="6"<?php if(isset($time)){if ($time=="6") { echo "selected";}else{echo "";}}?>>5:00 To 6:00</option>

  </select>
  <br>
  <?php
  if (isset($_SESSION['id'])) {

             $d=$_SESSION['sdept'];
      $t=substr($_SESSION['id'],2,1);
      $s=substr($_SESSION['id'],3,2);
  }


    if (isset($_SESSION['id'])) {
         $xy1=$_SESSION['id'];
         $xy=$_SESSION['id'];

    if(substr($xy1,-1)=="0")
   {

?>
  <label for="email"><b>Select Subject : </b></label><select name="subject">Your Subject
        <?php

            $semester=$_SESSION['semester'];
            $query="SELECT * FROM Subject where sem='$semester'";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select> <br>
            <label>    <b>Select Faculty : </b></label>
     <select name="faculty1">
        <?php
           $d=$_SESSION['sdept'];
      $t=substr($_SESSION['id'],2,1);
      $s=substr($_SESSION['id'],3,2);


             // minus SELECT slotfac.fid from slotfac where slotfac.sid in ('$id1','$id2','$id3')'$fac011[0]','$fac011[1]','$fac012[0]','$fac012[1]','$fac013[0]','$fac013[1],'$fac021[0]','$fac021[1]','$fac022[0]','$fac022[1]','$fac023[0]','$fac023[1]'
            $query="SELECT faculty.sname FROM faculty where faculty.fid not in
            (select fid from slotfac where sid LIKE '$d%$s%')";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select><br>

              <label for="psw-repeat"><b>Select Room : </b></label>   <select name="room">
        <?php
            $d=$_SESSION['sdept'];
      $t=substr($_SESSION['id'],2,1);
      $s=substr($_SESSION['id'],3,2);

            $query="SELECT room.rno FROM room where room.rno not in
            (select slot.rno from slot where slot.sid LIKE '$d%$s%')";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['rno'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select><br>

          <?php
           }
          else
            {?>
                <label ><b>Select Subject : </b></label><select name="subject">Your Subject
       <?php

        $semester=$_SESSION['semester'];
           $query="SELECT * FROM Subject where sem='$semester'";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select> <br>
        <label><b>Select Faculty 1</b></label>
     <select name="faculty1">Faculty-1 :
        <?php
           $d=$_SESSION['sdept'];
      $t=substr($_SESSION['id'],2,1);
      $s=substr($_SESSION['id'],3,2);

      echo $d.$t.$s;
             // minus SELECT slotfac.fid from slotfac where slotfac.sid in ('$id1','$id2','$id3')'$fac011[0]','$fac011[1]','$fac012[0]','$fac012[1]','$fac013[0]','$fac013[1],'$fac021[0]','$fac021[1]','$fac022[0]','$fac022[1]','$fac023[0]','$fac023[1]'
            $query="SELECT faculty.sname FROM faculty where faculty.fid not in
            (select fid from slotfac where sid LIKE '$d%$s%')";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select><br>
          <label><b>Select Faculty 2</b></label>
     <select name="faculty2">Faculty-2 :
        <?php
           $d=$_SESSION['sdept'];
      $t=substr($_SESSION['id'],2,1);
      $s=substr($_SESSION['id'],3,2);

      echo $d.$t.$s;
             // minus SELECT slotfac.fid from slotfac where slotfac.sid in ('$id1','$id2','$id3')'$fac011[0]','$fac011[1]','$fac012[0]','$fac012[1]','$fac013[0]','$fac013[1],'$fac021[0]','$fac021[1]','$fac022[0]','$fac022[1]','$fac023[0]','$fac023[1]'
            $query="SELECT faculty.sname FROM faculty where faculty.fid not in
            (select fid from slotfac where sid LIKE '$d%$s%')";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select><br>
                 <label for="psw-repeat"><b>Select Batch</b></label>
                 <input type="checkbox" name="batch[]" value="A">A
                 <input type="checkbox" name="batch[]" value="B">B
                 <input type="checkbox" name="batch[]" value="C">C
                 <input type="checkbox" name="batch[]" value="D">D
 <br>
              <label for="psw-repeat"><b>Select Room : </b></label>
              <select name="room">
        <?php
    $d=$_SESSION['sdept'];
      $t=substr($_SESSION['id'],2,1);
      $s=substr($_SESSION['id'],3,2);

            $query="SELECT room.rno FROM room where room.rno not in
            (select slot.rno from slot where slot.sid LIKE '$d%$s%')";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['rno'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select><br>
          <?php } } ?>

     <a id="edit" href="Select_lab.php" > Edit Laboratory</a>
       <button id="submitbtn" type="submit" name="undo" value="UNDO">UNDO</button><br>
      <button id="submitbtn" type="submit" name="Submit"value="SUBMIT" onclick="myFunction()">SUBMIT</button>
 <br><br>
 <script>
function myFunction() {
   document.getElementById("myForm").submit();
}
</script>

<input type="hidden" name="txt" id="demo">
</div></center>
<iframe src="subject_table.php" style="border:none;float: left;" height="500px" width="30%"></iframe>
 <?php
if (isset($_SESSION['id'])) {
 if (isset($_POST['undo'])) {
    $id=$_SESSION['id'];

   if (isset($_POST['subject']) && isset($_POST['faculty1']) && isset($_POST['faculty2']) && isset($_POST['room']) && isset($_POST['batch'])) {
    $query="update slot set batch='ABCD',scode='000000',rno='NONE' where sid='$id'";
      $cmd=mysqli_query($con,$query);
      $subject=$_POST['subject'];
       $faculty1=$_POST['faculty1'];
      $faculty2=$_POST['faculty2'];

        $query="select scode from subject where sname='$subject'";
      $cmd=mysqli_query($con,$query);
      $sub=mysqli_fetch_array($cmd);
     // echo $sub[0];
    $id1=$_SESSION['id'];

    $sq2="SELECT h_lab FROM subject WHERE sname='$subject' ";
    $cmds2=mysqli_query($con,$sq2);
    while($row=mysqli_fetch_array($cmds2))
      {
        $hlab=$row['h_lab'];
        //echo $qrp;
      }
      $sq2="SELECT rp FROM subject WHERE sname='$subject' ";
    $cmds2=mysqli_query($con,$sq2);
    while($row=mysqli_fetch_array($cmds2))
      {
        $qrp=$row['rp'];
        //echo $qrp;
      }
      if ($hlab>$qrp) {
         $scq2="update subject set rp=$qrp+2 where sname='$subject' ";
         $scq12=mysqli_query($con,$scq2);
     }


      $query="select fid from faculty where sname='$faculty1'";
      $cmd=mysqli_query($con,$query);
      $fac1=mysqli_fetch_array($cmd);
       $query="select fid from faculty where sname='$faculty2'";
      $cmd=mysqli_query($con,$query);
      $fac2=mysqli_fetch_array($cmd);
       $qx="select avail_load from faculty where fid='$fac1[0]' ";
      $cmdx=mysqli_query($con,$qx);
      while($row=mysqli_fetch_array($cmdx))
      {
        $avail=$row['avail_load'];
      }
       $qy="select avail_load from faculty where fid='$fac2[0]' ";
      $cmdy=mysqli_query($con,$qy);
      while($row=mysqli_fetch_array($cmdy))
      {
        $avail2=$row['avail_load'];
      }
      if ($avail<17) {
         $qf1="update faculty set avail_load=$avail+2 where fid='$fac1[0]' ";
          $cmdf1=mysqli_query($con,$qf1);
      }
      if ($avail2<17) {
          $qf2="update faculty set avail_load=$avail2+2 where fid='$fac2[0]' ";
          $cmdf2=mysqli_query($con,$qf2);
        # code...
      }




          $query="update slotfac set fid='000' where sid='$id' and fid='$fac1[0]'";
         $cmd=mysqli_query($con,$query);

          $query="update slotfac set fid='001' where sid='$id' and fid='$fac2[0]'";
           $cmd=mysqli_query($con,$query);

    }
    elseif(isset($_POST['subject']) && isset($_POST['faculty1']) && isset($_POST['room']))
    {
         $query="update slot set batch='ABCD',scode='000000',rno='NONE' where sid='$id'";
         $cmd=mysqli_query($con,$query);
         $query="update slotfac set fid='000' where sid='$id'";
         $cmd=mysqli_query($con,$query);

         $subject=$_POST['subject'];
         $faculty1=$_POST['faculty1'];

        $query="select scode from subject where sname='$subject'";
      $cmd=mysqli_query($con,$query);
      $sub=mysqli_fetch_array($cmd);

    $sq2="SELECT h_lec FROM subject WHERE sname='$subject' ";
    $cmds2=mysqli_query($con,$sq2);
    while($row=mysqli_fetch_array($cmds2))
      {
        $hlec=$row['h_lec'];
        //echo $qrp;
      }
      $sq2="SELECT rl FROM subject WHERE sname='$subject' ";
    $cmds2=mysqli_query($con,$sq2);
    while($row=mysqli_fetch_array($cmds2))
      {
        $qrl=$row['rl'];
        //echo $qrp;
      }
      if ($hlec>$qrl) {
         $scq2="update subject set rl=$qrl+1 where sname='$subject' ";
         $scq12=mysqli_query($con,$scq2);
     }

      $query="select fid from faculty where sname='$faculty1'";
      $cmd=mysqli_query($con,$query);
      $fac1=mysqli_fetch_array($cmd);
      $qx="select avail_load from faculty where fid='$fac1[0]' ";
      $cmdx=mysqli_query($con,$qx);
      while($row=mysqli_fetch_array($cmdx))
      {
        $avail=$row['avail_load'];
      }
      if ($avail<17) {
         $qf1="update faculty set avail_load=$avail+1 where fid='$fac1[0]' ";
          $cmdf1=mysqli_query($con,$qf1);
      }
    }
    else{
      echo "none";
    }
 }
 if (isset($_POST['Submit'])) {
  if (isset($_POST['subject']) && isset($_POST['faculty1']) && isset($_POST['faculty2']) && isset($_POST['room']) && isset($_POST['batch'])) {
    # code...

    $subject=$_POST['subject'];
    $faculty1=$_POST['faculty1'];
    $faculty2=$_POST['faculty2'];
    $room=$_POST['room'];
    $batch=(array)$_POST['batch'];
    $new="";
    // echo $subject."//".$faculty."//".$room."//";
    if(!empty($_POST['batch'])){
        // Loop to store and display values of individual checked checkbox.
       for($i=0;$i<sizeof($batch);$i++){
          $new=$new.$batch[$i];
       }
      }

      $query="select scode from subject where sname='$subject'";
      $cmd=mysqli_query($con,$query);
      $sub=mysqli_fetch_array($cmd);
     // echo $sub[0];
    $id1=$_SESSION['id'];

    $sq2="SELECT rp FROM subject WHERE sname='$subject' ";
    $cmds2=mysqli_query($con,$sq2);
    while($row=mysqli_fetch_array($cmds2))
      {
        $qrp=$row['rp'];
        //echo $qrp;
      }
    $scq2="update subject set rp=$qrp-2 where sname='$subject' ";
    $scq12=mysqli_query($con,$scq2);


      $query="select fid from faculty where sname='$faculty1'";
      $cmd=mysqli_query($con,$query);
      $fac1=mysqli_fetch_array($cmd);
       $query="select fid from faculty where sname='$faculty2'";
      $cmd=mysqli_query($con,$query);
      $fac2=mysqli_fetch_array($cmd);
      // echo $fac[0]."<br>";
      $id=$_SESSION['id'];
      // echo $id.$new.$sub[0].$fac[0].$room;
          $query="update slot set batch='$new',scode='$sub[0]',rno='$room' where sid='$id'";

      $qx="select avail_load from faculty where fid='$fac1[0]' ";
      $cmdx=mysqli_query($con,$qx);
      while($row=mysqli_fetch_array($cmdx))
      {
        $avail=$row['avail_load'];
      }
       $qy="select avail_load from faculty where fid='$fac2[0]' ";
      $cmdy=mysqli_query($con,$qy);
      while($row=mysqli_fetch_array($cmdy))
      {
        $avail2=$row['avail_load'];
      }


          $qf1="update faculty set avail_load=$avail-2 where fid='$fac1[0]' ";
          $qf2="update faculty set avail_load=$avail2-2 where fid='$fac2[0]' ";
          $cmdf1=mysqli_query($con,$qf1);
          $cmdf2=mysqli_query($con,$qf2);

          $cmd=mysqli_query($con,$query);
           $query="UPDATE slotfac set fid='$fac1[0]' where sid='$id' AND fid='000'";
          $cmd=mysqli_query($con,$query);
           $query="UPDATE slotfac set fid='$fac2[0]' where sid='$id' AND fid='001'";
          $cmd=mysqli_query($con,$query);
          if (!$cmd) {
              printf("Error: %s\n", mysqli_error($con));
            exit();
          }
          else{
            // echo $id."salu thi toy thTU";
          }
      unset($_POST['Submit']);
   }
    elseif(isset($_POST['subject']) && isset($_POST['faculty1']) && isset($_POST['room']))
    {

    $subject=$_POST['subject'];
    $faculty1=$_POST['faculty1'];
    $room=$_POST['room'];
      $query="select scode from subject where sname='$subject'";
      $cmd=mysqli_query($con,$query);
      $sub=mysqli_fetch_array($cmd);
      // echo $sub[0];

  $id2=$_SESSION['id'];
  //echo $id2;

    $sq4="SELECT rl FROM subject WHERE sname='$subject' ";
    $cmds4=mysqli_query($con,$sq4);
    while($row=mysqli_fetch_assoc($cmds4))
      {
        $qrp2=$row['rl'];
        //echo "<br>".$qrp2;
      }
    $scq="update subject set rl=$qrp2-1 where sname='$subject' ";
    $scq1=mysqli_query($con,$scq);

      $query="select fid from faculty where sname='$faculty1'";
      $cmd=mysqli_query($con,$query);
      $fac1=mysqli_fetch_array($cmd);

    $qz="select * from faculty where fid='$fac1[0]' ";
    //echo $fac1[0];
      $cmdz=mysqli_query($con,$qz);
      while($row=mysqli_fetch_array($cmdz))
      {
        $avail3=$row['avail_load'];
        //echo $avail3;

      }

      $qf3="update faculty set avail_load=$avail3-1 where fid='$fac1[0]'";
      $cmdf3=mysqli_query($con,$qf3);
      // echo $fac[0]."<br>";
      $id=$_SESSION['id'];
      // echo $id.$new.$sub[0].$fac[0].$room;
          $query="update slot set scode='$sub[0]',rno='$room' where sid='$id'";
          $cmd=mysqli_query($con,$query);
           $query="update slotfac set fid='$fac1[0]' where sid='$id'";
          $cmd=mysqli_query($con,$query);
          if (!$cmd) {
              printf("Error: %s\n", mysqli_error($con));
            exit();
          }
          else{
            // echo $id."salu thi toy thTU";
          }
      unset($_POST['Submit']);
      unset($_POST['subject']);
      unset($_POST['faculty1']);
      unset($_POST['room']);
    }
    else{
      echo "aa pn nai thatu la";
    }

  }
 }

 ?>

  </div>
  <?php if ($true==0) {

  ?>
  <div class="table">
  <table id="timetable">
  <?php
if (isset($_POST['faculty1'])&& isset($_POST['subject'])) {
  $subject=$_POST['subject'];
  $faculty=$_POST['faculty1'];
  $room=$_POST['room'];
}
  echo "<tr>";
        for ($col = 0; $col < 7; $col++) {
          echo "<th colspan=".'2'.">".$_SESSION['dayname'][$col]."</th>";
        }
        echo "</tr>";
   for ($row = 0,$r=0; $row < 7,$r<7; $row++,$r++) {
           echo "<tr>";
            for ($col = 0,$c=0; $col < 7,$c<7; $col++,$c++) {
                  if ($_SESSION[$lecname][$row][$col]==1) {
                          $bfr1= $_SESSION['sdept'].$r.($c-1).$lab;
                          $bfr2=$_SESSION['sdept'].$term.($r+1).($c-1).$lab;
                          $str1=$_SESSION['sdept'].$term.$r.($c-1).($lab+1);
                          $str2=$_SESSION['sdept'].$term.$r.($c-1).($lab+2);
                       //display database data

                       $query="select *from slot where sid='$str1'";
                        $cmd1=mysqli_query($con,$query);
                        $X=mysqli_num_rows($cmd1);

                        while($nt=mysqli_fetch_array($cmd1)){

                                $subj=$nt['scode'];
                                  $query="select sname from subject where scode='$subj'";
                                    $cmd=mysqli_query($con,$query);
                                   $sub=mysqli_fetch_array($cmd);
                                    $batch=$nt['batch'];

                                   // echo $sub[0];
                                    $rom=$nt['rno'];
                      }
                      //slotfac

                        $query="select *from slotfac where sid='$str1'";
                        $cmd=mysqli_query($con,$query);
                        $X=mysqli_num_rows($cmd);

                        if (!$cmd) {
                                    printf("Error: %s\n", mysqli_error($con));
                                 exit();
                        }

                         while($nt=mysqli_fetch_assoc($cmd)){
                           $facul[]=$nt['fid'];
                          }
                            $query="select sname from faculty where fid='$facul[0]'";
                            $cmd=mysqli_query($con,$query);
                            $fac1=mysqli_fetch_array($cmd);
                            $query="select sname from faculty where fid='$facul[1]'";
                            $cmd=mysqli_query($con,$query);
                            $fac2=mysqli_fetch_array($cmd);


                          echo "<td rowspan=".'2'." ><button id=".$str1." value=".$str1." name=".$str1.">".$sub[0]."<br>".$fac1[0]." ".$fac2[0]."<br>".$batch."<br>".$rom."</button></td>";$fac1[0]=0;$fac2[0]=0;
                          //for second slot
                        unset($facul);

                        $query="select *from slot where sid='$str2'";
                        $cmd=mysqli_query($con,$query);
                        while($nt=mysqli_fetch_array($cmd)){

                                $subj=$nt['scode'];
                                  $query="select sname from subject where scode='$subj'";
                                    $cmd=mysqli_query($con,$query);
                                   $sub=mysqli_fetch_array($cmd);
                                   // echo $sub[0];
                                    $batch=$nt['batch'];
                                    $rom=$nt['rno'];
                      }
                      //slotfac
                        $query="select *from slotfac where sid='$str2'";
                        $cmd=mysqli_query($con,$query);
                           while($nt=mysqli_fetch_assoc($cmd)){
                           $acu[]=$nt['fid'];
                          }
                          $query="select sname from faculty where fid='$acu[0]'";
                            $cmd=mysqli_query($con,$query);
                            $fa1=mysqli_fetch_array($cmd);
                            $query="select sname from faculty where fid='$acu[1]'";
                            $cmd=mysqli_query($con,$query);
                            $fa2=mysqli_fetch_array($cmd);

                          echo "<td rowspan=".'2'." ><button id=".$str2." value=".$str2." name=".$str2.">".$sub[0]."<br>".$fa1[0]." ".$fa2[0]."<br>".$batch."<br>".$rom."</button></td>";
                          unset($acu);
                      }
                    else if($_SESSION[$lecname][$row][$col]==2){


                            if($_SESSION[$lecname][$row][$col]=='2'){
                               }

                            if ($_SESSION[$lecname][$row][$col]=='02:00 To 03:00' && $row==3 && $col==0) {
                             echo "<td colspan=".'2'.">".$_SESSION[$lecname][$row][$col]."</td>";

                             }
                       }

                  else{
                    if (($row==0 && $col==0) || ($row==1 && $col==0) || ($row==2 && $col==0) || ($row==3 && $col==0) || ($row==4 && $col==0) || ($row==5 && $col==0) || ($row==6 && $col==0)) {
                          echo "<td colspan=".'2'.">".$_SESSION[$lecname][$row][$col]."</td>";
                           }
                    else{


                       $str3=$_SESSION['sdept'].$term.$r.($c-1).$lab;
                        $query="select *from slot where sid='$str3'";
                        $cmd=mysqli_query($con,$query);
                        while($nt=mysqli_fetch_array($cmd)){

                                $subj=$nt['scode'];
                                  $query="select sname from subject where scode='$subj'";
                                    $cmd=mysqli_query($con,$query);
                                   $sub=mysqli_fetch_array($cmd);
                                   // echo $sub[0];
                                    $rom=$nt['rno'];
                      }
                      //slotfac
                        $query="select *from slotfac where sid='$str3'";

                        $cmd=mysqli_query($con,$query);
                         while($nt=mysqli_fetch_array($cmd)){
                           $facu=$nt['fid'];
                           $query="select sname from faculty where fid='$facu'";
                            $cmd=mysqli_query($con,$query);
                            $fac=mysqli_fetch_array($cmd);


                          echo "<td colspan=".'2'."><button id=".$str3." value=".$str3." name=".$str3.">".$sub[0]."<br>".$fac[0]."<br>".$rom."</button></td>";

                      }

                    }
                    }
                    if ($row==2 && $col==6) {
                           echo "</tr><tr class='res'>";
                           echo "<td colspan=".'2'." class='res'>01:30 to 02:00</td>";
                           echo "<td colspan=".'12'." class='res'><center>Recess</center></td>";
                           echo "</tr>";

                    }

                }

           echo "</tr>";
         }
  ?>

</table>
</div>

<?php }
else{?>
<div style="float: right; width: 100%; "><center><h3>Kindly first select Laboratory slots for your Timetable</h3></center></div>
<?php }?>

<script type="text/javascript">

$("button").click(function() {
    var id=this.value; // or alert($(this).attr('id'));

  // var id="CE1000";
  var a=document.getElementById(id).value;
    document.getElementById('demo').value=a;

});
</script>
</form>
<?php
// Positive numbers:
// echo substr($str3,-1)."<br>";
?>
</body>
</html>
