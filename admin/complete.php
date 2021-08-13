<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><title><?php echo $_SESSION['DIV']; ?></title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
  <script src="../js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../css/aftertt.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style type="text/css">
  table, td, th {
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
</style>
</head>
<?php
        $lab=0;
          include 'connect.php';

    if (isset($_POST['dept'])) {
      $_SESSION['dept']= $_POST['dept'];
    }
    if (isset($_POST['term'])) {
    $_SESSION['term'] = $_POST['term'];
      }


?>

<body>
  <form id="form1" runat='server'>



      <ul class="main-navigation">
  <li><a href="adminhome.php">Home</a></li>

    </li>
    <li><a href="slot_view.php"> Manage Timetable</a>
    </li>
    <li><a href="delete_timetable.php"> Delete This Timetable</a>
    </li>
     <li><a href="table1.php"> Edit This Timetable</a>
    </li>
    <li><input type="button" id="printe" value="Print" onclick="javascript:printDiv('sample')" />
    </li>
  <li><a href="logout.php">Log Out</a></li>
</ul>
</form>
<div>
 <form method="post" action="Complete.php">
        <?php
            if (isset($_POST['dept']) && isset($_POST['term'])) {
            $dept=$_POST['dept'];
            $query="select *from department where name='$dept'";
            $cmd=mysqli_query($con,$query);
            $sdept=mysqli_fetch_assoc($cmd);
            $_SESSION['sdept']=$sdept['sname'];
            $_SESSION['term']=$_POST['term'];
            $_SESSION['tm']=$_SESSION['term'];
          }
          if (isset( $_SESSION['sdept'])) {
            $_SESSION['tm']=$_SESSION['term'];
            $term=$_SESSION['semester'];
          $labname=$_SESSION['sdept'].$term.'lab';
          $lecname=$_SESSION['sdept'].$term.'lec';
          }
        include 'connect.php';
            $tm=$_SESSION['tm'];
          $query = "SELECT * FROM division Where term='$tm'";
          $result = mysqli_query($con,$query);
            while ($row = mysqli_fetch_array($result))
                  $sem[]=$row['sem'];

         ?>

<br>
<br>

<center><input type="submit" class="button" name="one" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[0];?>">
      <input type="submit" class="button" name="two" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[1];?>">
      <input type="submit" class="button" name="three" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[2];?>"></br>


<br>

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
<div style="float: left;">
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
  $tm=$_SESSION['term'];
  $query="Select *from division where term='$tm' and sem=$term";
 $result = mysqli_query($con,$query);
  while ($row = mysqli_fetch_array($result)) {
    $year=$row['entry'];
    $duration= $row['duration'];}
?>


 </center>
 <div class='sample' id='sample'>

     <h2><center>Bhailalbhai and Bhikhabhai Institute of Technology</h2>
     <h4><?php if(isset($_SESSION['DIV']))echo $_SESSION['DIV'];  ?></center></h4></b>
     <div><h3>
      <div class="data"style="margin-left: 20px;">
        ENTRY YEAR :   <?php if(isset($year))echo $year;  ?>

     <div style="float:right; margin-right: 20px;">
      TERM :   <?php echo $tm;  ?></div>
     <div style=" padding-top: 5px;margin-right: 20px;">
     DURATION :  <?php if(isset($duration))echo $duration;   ?></div></h3>
    </div>
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
                          $bfr1=$_SESSION['sdept'].$term.$r.($c-1).$lab;
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


                          echo "<td rowspan=".'2'." class='labtd'>".$sub[0]."<br>".$fac1[0]." ".$fac2[0]."<br>".$batch."<br>".$rom."</td>";$fac1[0]=0;$fac2[0]=0;
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

                          echo "<td rowspan=".'2'." class='labtd'>".$sub[0]."<br>".$fa1[0]." ".$fa2[0]."<br>".$batch."<br>".$rom."</td>";
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


                          echo "<td colspan=".'2'.">".$sub[0]."<br>".$fac[0]."<br>".$rom."</td>";

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
<div class="subject" style="margin-left: 10px; margin-top: 10px;">
  <?php
    $query="Select *from subject where sem=$term";
  $result = mysqli_query($con,$query);
  while ($row = mysqli_fetch_array($result)) {
    $name=$row['name'];
    $sname=$row['sname'];
    echo "<B>".$sname."</B>"." : ".$name."  ||  " ;
    }


  ?>
</div>
  <hr style="
  width: 200px;
  margin-top: 45px;
  margin-left: 10px;
  margin-bottom: 17px;
  border: 2px solid black;
  border-radius: 5px;">
<div style="margin-left: 50px;">
  <?php
   $query="Select *from faculty where designation='HOD'";
  $result = mysqli_query($con,$query);
  while ($row = mysqli_fetch_array($result))
    $name=$row['fullname'];
    echo $name;
    ?>

</div>


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

    <script language="javascript" type="text/javascript">
        function printDiv(divID)
    {
            var divElements = document.getElementById(divID).innerHTML;
            var oldPage = document.body.innerHTML;

            document.body.innerHTML =
              "<html><head><title></title></head><body>" +
              divElements + "</body>";

            window.print();

            document.body.innerHTML = oldPage;
        }
    </script>
</body>
</html>
