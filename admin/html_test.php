
<!DOCTYPE html>
<html>
<head><title>Create Timetable</title>
  <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" type="text/css" href="../css/creatett_css.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<script>
function show(shown, hidden,hidden1) {
  document.getElementById(shown).style.display='block';
  document.getElementById(hidden).style.display='none';
  document.getElementById(hidden1).style.display='none';

  return false;
}
</script>
<style type="">
  a{
  text-decoration: none;
  background-color: #4caf50;
  padding: 15px 5px;
  font-size: 16px;
  cursor: pointer;
  border-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<label for="salarieids"><B>Division:</B></label>
        <?php
          session_start();

          $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            
            $tm=$_SESSION['term'];
          $query = "SELECT * FROM division Where term='$tm'";  
          $result = mysqli_query($con,$query);
     
            while ($row = mysqli_fetch_array($result)) 
                  $sem[]=$row['sem'];
          
         ?>

<br>

     <h1><center>Bhailalbhai and Bhikhabhai Institute of Technology1</center></h1>
     <h2><center><?php echo $_SESSION['dept'];?></center></h1><br><br>
<center>   
    <input type="" name="">><?php echo "DIV :".$_SESSION['sdept']."-".$sem[0];?></button>
    <a href="#" onclick="return show('Page2','Page1','Page3');"><?php echo "DIV :".$_SESSION['sdept']."-".$sem[1];?></a>
    <a href="#" onclick="return show('Page3','Page2','Page1');"><?php echo "DIV :".$_SESSION['sdept']."-".$sem[2];?></a>
</center>

 <br><br>
  <div id="Page1">
    <?php echo "DIV :".$_SESSION['sdept']."-".$sem[0];?>
    <br><br>Table 1
 
          <?php
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
    elseif(isset($_POST['subject']) && isset($_POST['faculty']) && isset($_POST['room']))
    {

    $subject=$_POST['subject'];
    $faculty=$_POST['faculty'];
    $room=$_POST['room'];
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
          $query="update slot set scode='$sub[0]',fid='$fac[0]',rno='$room' where sid='$id'";
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
                          $bfr1=$_SESSION['sdept'].$term.$r.($c-1).$lab;
                          $bfr2=$_SESSION['sdept'].$term.($r+1).($c-1).$lab; 
                          $str1=$_SESSION['sdept'].$term.$r.($c-1).($lab+1);
                          $str2=$_SESSION['sdept'].$term.$r.($c-1).($lab+2);
                       
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
                         $str3=$_SESSION['sdept'].$term.$r.($c-1).$lab;
                          echo "<td colspan=".'2'."><button id=".$str3." value=".$str3." name=".$str3.">".$dbvar."</button></td>";
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
  </div>
  <div id="Page2" style="display:none">
    <?php echo "DIV :".$_SESSION['sdept']."-".$sem[1];?>
   <br> Table 2
  </div>
  <div id="Page3" style="display:none">
    <?php echo "DIV :".$_SESSION['sdept']."-".$sem[2];?>
   <br> Table 3
  </div>
</body>
</html> 