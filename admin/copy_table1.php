
            //1
            $num=substr($xy1,-1,1);
            $xy=$_SESSION['id'];

            $id1=str_replace($num,"1",$xy);
            $query="select *from slotfac where sid='$id1'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac011[]=$nt['fid'];

            $id1=str_replace($num,"1",$xy);
            $query="select *from slotfac where sid='$id2'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac012[]=$nt['fid'];

            $id1=str_replace($num,"1",$xy);
            $query="select *from slotfac where sid='$id3'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac013[]=$nt['fid'];  

            //2
            $num=substr($xy1,-1,1);
            $xy=$_SESSION['id'];

            $id1=str_replace($num,"2",$xy);
            $query="select *from slotfac where sid='$id1'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac021[]=$nt['fid'];

            $id1=str_replace($num,"2",$xy);
            $query="select *from slotfac where sid='$id2'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac022[]=$nt['fid'];

            $id1=str_replace($num,"2",$xy);
            $query="select *from slotfac where sid='$id3'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac023[]=$nt['fid'];
        }
       elseif ($x1=="1") {
            $query="select *from slotfac where sid='$id1'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac11[]=$nt['fid'];

            $query="select *from slotfac where sid='$id2'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac12[]=$nt['fid'];

            $query="select *from slotfac where sid='$id3'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac13[]=$nt['fid'];
                        
       }
       else if ($x1=="2") {
            $query="select *from slotfac where sid='$id1'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac21[]=$nt['fid'];

            $query="select *from slotfac where sid='$id2'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac22[]=$nt['fid'];

            $query="select *from slotfac where sid='$id3'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac23[]=$nt['fid'];
       }   
    ?>   
<!DOCTYPE html>
<html>
<head><title>Create Timetable</title>
  <script src="../js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../css/creatett_css.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<?php 
    session_start();

          $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
           
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
<div>
 <form method="post" action="table1.php">
  <center>  <label for="salarieids"><B>Division:</B></label>
        <?php

          $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            
            $tm=$_SESSION['term'];
          $query = "SELECT * FROM division Where term='$tm'";  
          $result = mysqli_query($con,$query);
            while ($row = mysqli_fetch_array($result)) 
                  $sem[]=$row['sem'];
          
         ?>

<br>
<br>

      <input type="submit" name="one" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[0];?>">
      <input type="submit" name="two" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[1];?>">
      <input type="submit" name="three" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[2];?>"></br>

<br>
<?php
  if (isset($_POST['one']))
 {
      $_SESSION['semester']=$sem[0];

      echo "DIV :".$_SESSION['sdept']."-".$sem[0];

      $_SESSION['numb']=$_SESSION['num1'];
          $_SESSION['labs']=$_SESSION['lab1']; 
      $_SESSION['labpage']="Select_lab_1";

      
 }
 elseif(isset($_POST['two']))
 {
      $_SESSION['semester']=$sem[1];
      
      echo "DIV :".$_SESSION['sdept']."-".$sem[1];
    
        if (isset($_SESSION['num2'])){ 
      $_SESSION['numb']=$_SESSION['num2'];
          $_SESSION['labs']=$_SESSION['lab2']; 

    }
      $_SESSION['labpage']="Select_lab_2";

 }
 elseif (isset($_POST['three']))
 {
      $_SESSION['semester']=$sem[2];
      

      echo "DIV :".$_SESSION['sdept']."-".$sem[2];
      
      if (isset($_SESSION['num3'])){
      $_SESSION['numb']=$_SESSION['num3'];
      $_SESSION['labs']=$_SESSION['lab3']; 
    }
      $_SESSION['labpage']="Select_lab_3";

 }
 if (isset($_SESSION['semester'])) {
      
      $term=$_SESSION['semester'];$lab=0;//set sem and lab variable valuee
 }

  ?>
</script>
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
    echo "nai maltu la";
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
  <br><br>
  <?php
  if (isset($_SESSION['id'])) {
         $xy1=$_SESSION['id'];
         $xy=$_SESSION['id'];

    if(substr($xy1,-1)=="0")
   { 
      $num=substr($xy1,2,1);
       if ($num%2==0) {
              $id1=str_replace($num,"2",$xy);
              $id2=str_replace($num,"4",$xy);
              $id3=str_replace($num,"6",$xy);
            }
            else
            {
              $id1=str_replace($num,"1",$xy);
              $id2=str_replace($num,"3",$xy);
              $id3=str_replace($num,"5",$xy);
            }
        $x1=substr($xy1,-1);
        if ($x1=="0") {
            //0
           $query="SELECT fid FROM slotfac where sid in ('$id1','$id2','$id3')";
            $result = mysqli_query($con,$query);
            if (!$result) {
                printf("Error: %s\n", mysqli_error($con));
                exit();
             }
            while($nt=mysqli_fetch_array($result))
            $fid[]= $nt['fid'];

            //1
            $num=substr($xy1,-1,1);
            $xy=$_SESSION['id'];

            $id1=str_replace($num,"1",$xy);
            $query="select *from slotfac where sid='$id1'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac011[]=$nt['fid'];

            $id1=str_replace($num,"1",$xy);
            $query="select *from slotfac where sid='$id2'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac012[]=$nt['fid'];

            $id1=str_replace($num,"1",$xy);
            $query="select *from slotfac where sid='$id3'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac013[]=$nt['fid'];  

            //2
            $num=substr($xy1,-1,1);
            $xy=$_SESSION['id'];

            $id1=str_replace($num,"2",$xy);
            $query="select *from slotfac where sid='$id1'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac021[]=$nt['fid'];

            $id1=str_replace($num,"2",$xy);
            $query="select *from slotfac where sid='$id2'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac022[]=$nt['fid'];

            $id1=str_replace($num,"2",$xy);
            $query="select *from slotfac where sid='$id3'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac023[]=$nt['fid'];
        }
       elseif ($x1=="1") {
            $query="select *from slotfac where sid='$id1'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac11[]=$nt['fid'];

            $query="select *from slotfac where sid='$id2'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac12[]=$nt['fid'];

            $query="select *from slotfac where sid='$id3'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac13[]=$nt['fid'];
                        
       }
       else if ($x1=="2") {
            $query="select *from slotfac where sid='$id1'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac21[]=$nt['fid'];

            $query="select *from slotfac where sid='$id2'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac22[]=$nt['fid'];

            $query="select *from slotfac where sid='$id3'";
            $cmd=mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($cmd))
            $fac23[]=$nt['fid'];
       }   
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
            </select> 
                    <b>Select Faculty : </b></label>
     <select name="faculty1">
        <?php
           
             // minus SELECT slotfac.fid from slotfac where slotfac.sid in ('$id1','$id2','$id3')
            $query="SELECT faculty.sname FROM faculty where faculty.fid not in 
            ('$fid[0]','$fid[1]','$fid[2]','000','001','$fac011[0]','$fac011[1]','$fac012[0]','$fac012[1]','$fac013[0]','$fac013[1],'$fac021[0]','$fac021[1]','$fac022[0]','$fac022[1]','$fac023[0]','$fac023[1]')";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select>

              <label for="psw-repeat"><b>Select Room : </b></label>   <select name="room">
        <?php
            $query="SELECT * FROM Room";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['rno'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select><br><br>

          <?php
           }
          else
            {?>
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
            </select> 
                    <b>Select Faculty 1</b></label>
     <select name="faculty1">Faculty-1 : 
        <?php
            $query="SELECT * FROM Faculty ";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select>
        <b>Select Faculty 2</b></label>
     <select name="faculty2">Faculty-2 :
        <?php
            $query="SELECT * FROM Faculty ";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select>
                 <label for="psw-repeat"><b>Select Batch</b></label>   
                 <input type="checkbox" name="batch[]" value="A">A
                 <input type="checkbox" name="batch[]" value="B">B
                 <input type="checkbox" name="batch[]" value="C">C
                 <input type="checkbox" name="batch[]" value="D">D

              <label for="psw-repeat"><b>Select Room : </b></label>   <select name="room">
        <?php
            $query="SELECT * FROM Room";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['rno'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select><br><br>
          <?php } } ?>
          
      <button id="submitbtn"type="submit" name="Submit"value="Submit" ><a id="edit" href=<?php if(isset($_SESSION['labpage']))echo $_SESSION['labpage']; ?> >Edit Laboratory</a></button>
      <button id="submitbtn"type="submit" name="Submit"value="Submit" >Submit</button></center>
 <br><br>
<input type="hidden" name="txt" id="demo">


 <?php
if (isset($_SESSION['id'])) {
   echo $_SESSION['id'];
 
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
      echo $new."<br>";
      }
     
      $query="select scode from subject where sname='$subject'";
      $cmd=mysqli_query($con,$query);
      $sub=mysqli_fetch_array($cmd);
      // echo $sub[0];
// 
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
// 
      $query="select fid from faculty where sname='$faculty1'";
      $cmd=mysqli_query($con,$query);
      $fac1=mysqli_fetch_array($cmd);
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

    }
    else{
      echo "aa pn nai thatu la";
    }
    
  }
 }
 ?> 

  </div>
  <?php if (isset($_SESSION['dayname'])) {
    
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
   for ($row = 0,$r=0; $row < 7,$r<6; $row++,$r++) {
           echo "<tr>";
            for ($col = 0,$c=0; $col < 7,$c<7; $col++,$c++) {
                  if ($_SESSION['numb'][$row][$col]==1) {
                          $bfr1=$_SESSION['sdept'].$term.$r.($c-1).$lab;
                          $bfr2=$_SESSION['sdept'].$term.($r+1).($c-1).$lab; 
                          $str1=$_SESSION['sdept'].$term.$r.($c-1).($lab+1);
                          $str2=$_SESSION['sdept'].$term.$r.($c-1).($lab+2);
                       //display database data

                        $query="select *from slot where sid='$str1'";
                        $cmd=mysqli_query($con,$query);
                        while($nt=mysqli_fetch_array($cmd)){
                      
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
                        echo $X;
                         while($nt=mysqli_fetch_assoc($cmd)){
                           $facu[]=$nt['fid'];
                          }
                          $query="select sname from faculty where fid='$facu[0]'";
                            $cmd=mysqli_query($con,$query);
                            $fac1=mysqli_fetch_array($cmd);
                            $query="select sname from faculty where fid='$facu[1]'";
                            $cmd=mysqli_query($con,$query);
                            $fac2=mysqli_fetch_array($cmd);
                            

                          echo "<td rowspan=".'2'." ><button id=".$str1." value=".$str1." name=".$str1.">".$sub[0]."<br>".$fac1[0]." ".$fac2[0]."<br>".$batch."<br>".$rom."</button></td>";
                          //for second slot 
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
                      }
                    else if($_SESSION['numb'][$row][$col]==2){


                            if($_SESSION['numb'][$row][$col]=='2'){   
                               }
                  
                            if ($_SESSION['numb'][$row][$col]=='02:00 To 03:00' && $row==3 && $col==0) {
                             echo "<td colspan=".'2'.">".$_SESSION['numb'][$row][$col]."</td>";
                    
                             }
                       }
                  
                  else{
                    if (($row==0 && $col==0) || ($row==1 && $col==0) || ($row==2 && $col==0) || ($row==3 && $col==0) || ($row==4 && $col==0) || ($row==5 && $col==0) || ($row==6 && $col==0)) {
                          echo "<td colspan=".'2'.">".$_SESSION['numb'][$row][$col]."</td>"; 
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
                }
              
           echo "</tr>";
         }
  ?>

</table>
</div>

<?php }
else{
echo "<center><h3>Kindly first select Laboratory slots for your Timetable</h3></center> ";
}?>
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
<?php  session_start();

?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="../css/creatett_css.css">
  <title>timetable</title>
</head>
<body>
  <?php
  if (isset($_POST['division'])) {
    echo $_POST['division'];
  }
  else{
    echo "nai avatu";
  }
  ?>
  <form action="Select_lab.php" method="post">

<h4>Select Day And Time Where you want to add LABORATORY Slot in table</h4></br>
  <label>Division :<?php echo $_SESSION['term'];?> </label><br>
     <B> <label>Select Day:</label></B><select id="day" name="day">
    <option value="0">Monday</option>
    <option value="1">Tuesday</option>
    <option value="2">Wednesday</option>
    <option value="3">Thursday</option>
    <option value="4">Friday</option>
    <option value="5">Saturday</otion>
  </select>
  <B> <label>Select Hour:</label></B><select name="time" id="hour">
    <option value="0">10:30 To 12:30</option>
    <option value="1">11:30 To 1:30</option>
    <option value="3">2:00 To 4:00</option>
    <option value="4">3:00 To 5:00</option>
    <option value="5">4:00 To 6:00</option>
  </select>

<input type="submit" name="submit" value="submit">
<input type="submit" name="reset" value="Reset">
<input type="submit" name="done" value="Done">
<?php echo $_SESSION['term'].$_SESSION['dept'];
if($_SESSION['term']=="odd"){
  $term=1;$lab=0;}
 ?>

<br>
<?php
if (isset($_POST['done'])) {
header("Location: table1.php");
}
  ?>
<?php 
  $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
  $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
  $query="SELECT * FROM slot";
  $result = mysqli_query($con,$query);
 
?>
<table border="1">
  
  <?php
  if (isset($_POST['submit'])) {
     $flag=1;//for reverse lab
  }
  if (isset($_POST['reset'])) {
       $flag=0;//reverse in db
    if (isset($_SESSION['numb'])) {

    $_SESSION['numb'] = array(
           array('10:30 To 11:30',0,0,0,0,0,0),
           array('11:30 To 12:30',0,0,0,0,0,0),
           array('12:30 To 01:30',0,0,0,0,0,0),
           array('02:00 To 03:00',0,0,0,0,0,0),
           array('03:00 To 04:00',0,0,0,0,0,0),
           array('04:00 To 05:00',0,0,0,0,0,0),
           array('05:00 To 06:00',0,0,0,0,0,0)
          );  }

    if (isset($_SESSION['labs'])) {
      $_SESSION['labs'] = array(0,0,0,0,0,0,0);
    }

  }
  if (!isset($_SESSION['numb'])) {
    $_SESSION['labs'] = array(0,0,0,0,0,0,0);
    $_SESSION['numb'] = array(
           array('10:30 To 11:30',0,0,0,0,0,0),
           array('11:30 To 12:30',0,0,0,0,0,0),
           array('12:30 To 01:30',0,0,0,0,0,0),
           array('02:00 To 03:00',0,0,0,0,0,0),
           array('03:00 To 04:00',0,0,0,0,0,0),
           array('04:00 To 05:00',0,0,0,0,0,0),
           array('05:00 To 06:00',0,0,0,0,0,0)
          );
    }
    $_SESSION['dayname'] = array('','Monday','Tuesday','Wendesnday','Thursday','Friday','Saturday');
    if (isset($_POST['day']) && isset($_POST['time'])){
      if (isset($_POST['submit'])) {
        $day=$_POST['day'];$time=$_POST['time'];$day++;
         $_SESSION['numb'][$time][$day]=1;
        
        for ($i=0; $i <6 ; $i++) { 
          $_SESSION['labs'][$day]=1;
        }echo "<br>";
           $time++;
          $_SESSION['numb'][$time][$day]=2;
            }
          echo "<tr>";
        for ($col = 0; $col < 7; $col++) {
          echo "<th colspan=".'2'.">".$_SESSION['dayname'][$col]."</th>";
        }
        echo "</tr>";

      for ($row = 0,$r=0; $row < 7,$r<7; $row++,$r++) {
           echo "<tr>";
            for ($col = 0,$c=0; $col < 7,$c<7; $col++,$c++) {
                  if ($_SESSION['numb'][$row][$col]==1) {
                    if($flag==1){
                          $bfr1=$_SESSION['sdept'].$term.$r.($c-1).$lab;//CE1000
                          $bfr2=$_SESSION['sdept'].$term.($r+1).($c-1).$lab;//CE1100 
                          $str1=$_SESSION['sdept'].$term.$r.($c-1).($lab+1);//CE1001
                          $str2=$_SESSION['sdept'].$term.$r.($c-1).($lab+2);//CE1002
                          $data="DELETE FROM `slot` WHERE `slot`.`sid` = '$bfr1'";//delete before record
                           $result=mysqli_query($con,$data);
                             $data2="INSERT INTO slot VALUES ('$str1', 'ABCD', '000000', '000', 'NONE', '000')";//add new
                           $result=mysqli_query($con,$data2);
                        
                          if(!$result) {
                                       printf("Error: %s\n", mysqli_error($con));
                                       exit();
                                  }
                          $data="DELETE FROM `slot` WHERE `slot`.`sid` = '$bfr2'";
                           $result=mysqli_query($con,$data);
                           $data2="INSERT INTO slot VALUES ('$str2', 'ABCD', '000000', '000', 'NONE', '000')";
                            $result=mysqli_query($con,$data2);

                          echo "<td rowspan=".'2'." >".$str1."</td>";
                          echo "<td rowspan=".'2'.">".$str2."</td>";
                        }
                        else{
                           $bfr1=$_SESSION['sdept'].$term.$r.($c-1).$lab;
                          $bfr2=$_SESSION['sdept'].$term.($r+1).($c-1).$lab; 
                          $str1=$_SESSION['sdept'].$term.$r.($c-1).($lab+1);
                          $str2=$_SESSION['sdept'].$term.$r.($c-1).($lab+2);
                            echo "f".$bfr1.$bfr2;
                          echo "f".$str1.$str2;

                           $data="update slot set sid='$bfr1' where sid='$str1'";
                          $result=mysqli_query($con,$data);
                          if(!$result) {
                                       printf("Error: %s\n", mysqli_error($con));
                                       exit();
                                  }


                           $data1="update slot set sid='$bfr2' where sid='$str2'"; 
                          $result1=mysqli_query($con,$data1);
                          echo "<td rowspan=".'2'." >".$str1."</td>";
                          echo "<td rowspan=".'2'.">".$str2."</td>";
                        }
                      }
                    else if($_SESSION['numb'][$row][$col]==2){


                            if($_SESSION['numb'][$row][$col]=='2'){   
                               }
                  
                            if ($_SESSION['numb'][$row][$col]=='02:00 To 03:00' && $row==3 && $col==0) {
                             echo "<td colspan=".'2'.">".$_SESSION['numb'][$row][$col]."</td>";
                    
                             }
                       }
                  
                  else{
                   if (($row==0 && $col==0) || ($row==1 && $col==0) || ($row==2 && $col==0) || ($row==3 && $col==0) || ($row==4 && $col==0) || ($row==5 && $col==0) || ($row==6 && $col==0)) {
                          echo "<td colspan=".'2'.">".$_SESSION['numb'][$row][$col]."</td>"; 
                           }                         
                    else{
                      if($flag==0)
                      {
                          $bfr1=$_SESSION['sdept'].$term.$r.($c-1).$lab;
                          $bfr2=$_SESSION['sdept'].$term.($r+1).($c-1).$lab; 
                          $str1=$_SESSION['sdept'].$term.$r.($c-1).($lab+1);
                          $str2=$_SESSION['sdept'].$term.$r.($c-1).($lab+2);
                            echo "n1".$bfr1.$bfr2."<br>";
                          echo "n2".$str1.$str2."<br>";
                          
                           $data="update slot set sid='$bfr1' where sid='$str1'";
                          $result=mysqli_query($con,$data);
                          if(!$result) {
                                       printf("Error: %s\n", mysqli_error($con));
                                       exit();
                                  }


                           $data1="update slot set sid='$bfr2' where sid='$str2'"; 
                          $result1=mysqli_query($con,$data1);
                      }
                      else
                      {
                            
                          $bfr1=$_SESSION['sdept'].$term.$r.($c-1).$lab;
                          $bfr2=$_SESSION['sdept'].$term.($r+1).($c-1).$lab; 
                          $str1=$_SESSION['sdept'].$term.$r.($c-1).($lab+1);
                          $str2=$_SESSION['sdept'].$term.$r.($c-1).($lab+2);
                            echo "n1".$bfr1.$bfr2."<br>";
                          echo "n2".$str1.$str2."<br>";
                          
                           $data="update slot set sid='$bfr1' where sid='$str1'";
                          $result=mysqli_query($con,$data);
                          if(!$result) {
                                       printf("Error: %s\n", mysqli_error($con));
                                       exit();
                                  }


                           $data1="update slot set sid='$bfr2' where sid='$str2'"; 
                          $result1=mysqli_query($con,$data1);
                      }
                          echo "<td colspan=".'2'.">".$_SESSION['sdept'].$term.$r.($c-1).$lab."</td>";

                     }
                    }
                }
              }
           echo "</tr>";
         }
      else {
        echo "Please select day and time .!!!!";
      }
  ?><br>
</table>

</form>
</body>
</html><!-- 
How to change value of the array when click on submit button without clearing changes made before?
    There is a Problem When value change of array it works but When I change 
    second value changes made before gone because array redeclare on page 
    loading please give a solution when I submit array value permanently change 
    and 
    I can change much value of value. -->
<?php 
    session_start();

          $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
           
    if (isset($_POST['dept'])) {
      $_SESSION['dept']= $_POST['dept'];
    }
    if (isset($_POST['term'])) {
    $_SESSION['term'] = $_POST['term'];
      }
      if($_SESSION['term']=="odd"){
  $term=1;$lab=0;}

?>

<body>
     <h1><center>Bhailalbhai and Bhikhabhai Institute of Technology1</center></h1><br><br>
     <h2><center><?php echo $_SESSION['dept'];?></center></h1><br><br>

<!DOCTYPE html>
<html>
<head><title>Create Timetable</title>
  <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" type="text/css" href="../css/creatett_css.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
     <h1><center>Bhailalbhai and Bhikhabhai Institute of Technology1</center></h1><br><br>
<div>
<?php 
    session_start();

          $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
           
    if (isset($_POST['dept'])) {
      $_SESSION['dept']= $_POST['dept'];
    }
    if (isset($_POST['term'])) {
    $_SESSION['term'] = $_POST['term'];
      }
      if($_SESSION['term']=="odd"){
  $term=1;$lab=0;}

?>

 <form method="post" action="table1.php">
 
  <center>
        <label for="salarieids"><B>Division:</B></label>
        <?php
            $tm=$_SESSION['term'];
          $query = "SELECT * FROM division Where term='$tm'";  
          $result = mysqli_query($con,$query);
          if ($result) :
        ?>

        <select id="salarieids" name="division" ><
           <?php
            while ($row = mysqli_fetch_array($result)) 
              echo '<option value="'.$row['sem'].'">'."DIV :".$row['sem'].'</option>'; 
          ?>
        </select><br><br>
        <?php endif ?>
      <script>
         $(function(){
      // bind change event to select
      $('#division').on('change', function () {
          var url = $(this).val(); // get selected valu
           $("#test1").val(url);
          if (url==2 || url==1) { // require a URL
              window.location = "table1.php" ;
               // redirect
          }
          if (url==4 || url ==3) { // require a URL
              window.location = "table2.php" ; // redirect
          }
          if (url==6 || url==5) { // require a URL
              window.location = "table3.php" ; // redirect
          }
          return false;
      });
    });
      
</script>

 <?php
if (isset($_POST['txt'])) {
  if (!$_POST['txt']=="") {
  $_SESSION['id']=$_POST['txt'];
  $day=substr($_SESSION['id'],4,1);
  $time=substr($_SESSION['id'],3,1);
  
  }
  else{
}
}else{
    echo "nai maltu la";
  }
?>
     <B> <label>Select Day:</label></B><select name="day" id="day">
    <option id="day" value="0" <?php if(isset($day)){if ($day=="0") { echo "selected";}else{echo "";}}?>>Monday</option>
    <option id="day" value="1" <?php if(isset($day)){if ($day=="1") { echo "selected";}else{echo "";}}?> >Tuesday</option>
    <option id="day" value="2" <?php if(isset($day)){if ($day=="2") { echo "selected";}else{echo "";}}?>>Wednesday</option>
    <option id="day" value="3" <?php if(isset($day)){if ($day=="3") { echo "selected";}else{echo "";}}?>>Thursday</option>
    <option id="day" value="4" <?php if(isset($day)){if ($day=="4") { echo "selected";}else{echo "";}}?>>Friday</option>
    <option id="day" value="5" <?php if(isset($day)){if ($day=="5") { echo "selected";}else{echo "";}}?>>Saturday</otion>
  </select>
  <B> <label>Select Hour:</label></B><select name="hour" id="time">
    <option id="time" value="0"<?php if(isset($time)){if ($time=="0") { echo "selected";}else{echo "";}}?>>10:30 To 11:30</option>
    <option id="time" value="1"<?php if(isset($time)){if ($time=="1") { echo "selected";}else{echo "";}}?>>11:30 To 12:30</option>
    <option id="time" value="2"<?php if(isset($time)){if ($time=="2") { echo "selected";}else{echo "";}}?>>12:30 To 1:30</option>
    <option id="time" value="3"<?php if(isset($time)){if ($time=="3") { echo "selected";}else{echo "";}}?>>2:00 To 3:00</option>
    <option id="time" value="4"<?php if(isset($time)){if ($time=="4") { echo "selected";}else{echo "";}}?>>3:00 To 4:00</option>
    <option id="time" value="5"<?php if(isset($time)){if ($time=="5") { echo "selected";}else{echo "";}}?>>4:00 To 5:00</option>
    <option id="time" value="6"<?php if(isset($time)){if ($time=="6") { echo "selected";}else{echo "";}}?>>5:00 To 6:00</option>

  </select> 
  <br><br>
  <?php
  $xy1=$_SESSION['id'];
    
    if(substr($xy1,-1)=="0")
   {?>   
  <label for="email"><b>Select Subject  </b></label><select name="subject">Your Subject
        <?php

           $query="SELECT * FROM Subject";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select> 
                    <b>Select Faculty</b></label>
     <select name="faculty">
        <?php
            $query="SELECT * FROM Faculty ";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select>

              <label for="psw-repeat"><b>Select Room</b></label>   <select name="room">
        <?php
            $query="SELECT * FROM Room";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['rno'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select><br><br>

          <?php
           }
          else
            {?>
                <label for="email"><b>Select Subject  </b></label><select name="subject">Your Subject
        <?php

           $query="SELECT * FROM Subject";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select> 
                    <b>Select Faculty 1</b></label>
     <select name="faculty">
        <?php
            $query="SELECT * FROM Faculty ";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select>
        <b>Select Faculty 2</b></label>
     <select name="faculty">
        <?php
            $query="SELECT * FROM Faculty ";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select>
                 <label for="psw-repeat"><b>Select Batch</b></label>   
                 <input type="checkbox" name="batch[]" value="A">A
                 <input type="checkbox" name="batch[]" value="B">B
                 <input type="checkbox" name="batch[]" value="C">C
                 <input type="checkbox" name="batch[]" value="D">D

              <label for="psw-repeat"><b>Select Room</b></label>   <select name="room">
        <?php
            $query="SELECT * FROM Room";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['rno'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select><br><br>
          <?php
        }?>
          
      <button id="submitbtn"type="submit" name="Submit"value="Submit" ><a id="edit" href="Select_lab.php">Edit Laboratory</a></button>
      <button id="submitbtn"type="submit" name="Submit"value="Submit" >Submit</button></center>
 <br><br>
<input type="hidden" name="txt" id="demo">


 <?php
 echo $_SESSION['id'];
 if (isset($_POST['Submit'])) {
  if (isset($_POST['subject']) && isset($_POST['faculty']) && isset($_POST['room']) && isset($_POST['batch'])) {
    # code...
  
    $subject=$_POST['subject'];
    $faculty=$_POST['faculty'];
    $room=$_POST['room'];
    $batch=(array)$_POST['batch'];
    $new="";
    // echo $subject."//".$faculty."//".$room."//";
  if(!empty($_POST['batch'])){
        // Loop to store and display values of individual checked checkbox.
       for($i=0;$i<sizeof($batch);$i++){
          $new=$new.$batch[$i];
       }
      echo $new."<br>";
}

    if(isset($subject) || isset($faculty))
    {
      $query="select scode from subject where sname='$subject'";
      $cmd=mysqli_query($con,$query);
      $sub=mysqli_fetch_array($cmd);
      // echo $sub[0];
// 
      $query="select fid from faculty where sname='$faculty'";
      $cmd=mysqli_query($con,$query);
      $fac=mysqli_fetch_array($cmd);
      // echo $fac[0]."<br>";
      $id=$_SESSION['id'];
      // echo $id.$new.$sub[0].$fac[0].$room;
          $query="update slot set batch='$new',scode='$sub[0]',fid='$fac[0]',rno='$room' where sid='$id'";
          $cmd=mysqli_query($con,$query);
          if (!$cmd) {
              printf("Error: %s\n", mysqli_error($con));
            exit();
          }
          else{
            echo $id."salu thi toy thTU";
          }

    }
   
    }
    else{
      echo "aa pn nai thatu la";
    }
    
  }
 ?> 

  </div>
  <div class="table">
  <table id="timetable">
  <?php    
if (isset($_POST['subject'])) {
  $subject=$_POST['subject'];
  $faculty=$_POST['faculty'];
  $room=$_POST['room'];
}
  echo "<tr>";
        for ($col = 0; $col < 7; $col++) {
          echo "<th colspan=".'2'.">".$_SESSION['dayname'][$col]."</th>";
        }
        echo "</tr>";
   for ($row = 0,$r=0; $row < 7,$r<6; $row++,$r++) {
           echo "<tr>";
            for ($col = 0,$c=0; $col < 7,$c<7; $col++,$c++) {
                  if ($_SESSION['numb'][$row][$col]==1) {
                          $bfr1=$_SESSION['dept'].$term.$r.($c-1).$lab;
                          $bfr2=$_SESSION['dept'].$term.($r+1).($c-1).$lab; 
                          $str1=$_SESSION['dept'].$term.$r.($c-1).($lab+1);
                          $str2=$_SESSION['dept'].$term.$r.($c-1).($lab+2);
                       
                          echo "<td rowspan=".'2'." >".$str1."</td>";
                          echo "<td rowspan=".'2'.">".$str2."</td>";
                      }
                    else if($_SESSION['numb'][$row][$col]==2){


                            if($_SESSION['numb'][$row][$col]=='2'){   
                               }
                  
                            if ($_SESSION['numb'][$row][$col]=='02:00 To 03:00' && $row==3 && $col==0) {
                             echo "<td colspan=".'2'.">".$_SESSION['numb'][$row][$col]."</td>";
                    
                             }
                       }
                  
                  else{
                   if (($row==0 && $col==0) || ($row==1 && $col==0) || ($row==2 && $col==0) || ($row==3 && $col==0) || ($row==4 && $col==0) || ($row==5 && $col==0) || ($row==6 && $col==0)) {
                          echo "<td colspan=".'2'.">".$_SESSION['numb'][$row][$col]."</td>"; 
                           }                         
                    else{
                      if (isset($dbvar)) {
                         $str3=$_SESSION['dept'].$term.$r.($c-1).$lab;
                          echo "<td colspan=".'2'."><button id=".$str3." value=".$str3." name=".$str3.">".$dbvar."</button></td>";
                      }
                      else{
                       $str3=$_SESSION['dept'].$term.$r.($c-1).$lab;
                        $query="select *from slot where sid='$str3'";
                        $cmd=mysqli_query($con,$query);
                        while($nt=mysqli_fetch_array($cmd)){
                      
                                $subj=$nt['scode'];
                                  $query="select sname from subject where scode='$subj'";
                                    $cmd=mysqli_query($con,$query);
                                   $sub=mysqli_fetch_array($cmd);
                                   // echo $sub[0];

                                   $facu=$nt['fid'];
                                    $query="select sname from faculty where fid='$facu'";
                                   $cmd=mysqli_query($con,$query);
                                  $fac=mysqli_fetch_array($cmd);
                                
                                    $rom=$nt['rno'];
                      }
                          echo "<td colspan=".'2'."><button id=".$str3." value=".$str3." name=".$str3.">".$sub[0]."<br>".$fac[0]."<br>".$rom."</button></td>";
                        
                      }
                     
                    }
                    }
                }
              
           echo "</tr>";
         }
  ?>

</table>
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
echo substr($str3,-1)."<br>";
?>
</body>
</html> 