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
  $term=$_SESSION['semester'];$lab=0;
  ?>
  <form action="Select_lab_1.php" method="post">

<h4>Select Day And Time Where you want to add LABORATORY Slot in table1</h4></br>
  <label>Division :<?php   echo "DIV :".$_SESSION['sdept']."-".$_SESSION['semester'];?> </label><br>
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
 
  $labname=$_SESSION['sdept'].$term.'lab';
  $lecname=$_SESSION['sdept'].$term.'lec';

?>
<table border="1">
  
  <?php
  if (isset($_POST['submit'])) {
     $flag=1;//for reverse lab
  }
  if (isset($_POST['reset'])) {
       $flag=0;//reverse in db

    if (isset($_SESSION[$lecname])) {
       $_SESSION[$lecname]=array();
         $_SESSION[$lecname] = array(
           array('10:30 To 11:30',0,0,0,0,0,0),
           array('11:30 To 12:30',0,0,0,0,0,0),
           array('12:30 To 01:30',0,0,0,0,0,0),
           array('02:00 To 03:00',0,0,0,0,0,0),
           array('03:00 To 04:00',0,0,0,0,0,0),
           array('04:00 To 05:00',0,0,0,0,0,0),
           array('05:00 To 06:00',0,0,0,0,0,0)
          );  }

    if (isset($_SESSION[$labname])) {
       $_SESSION[$labname]=array();
      $_SESSION[$labname]= array(0,0,0,0,0,0,0);
    }

  }
  if (!isset($_SESSION[$lecname])) {
    $_SESSION[$labname]=array();
    $_SESSION[$labname] = array(0,0,0,0,0,0,0);
    $_SESSION[$lecname]= array();
    $_SESSION[$lecname]= array(
           array('10:30 To 11:30',0,0,0,0,0,0),
           array('11:30 To 12:30',0,0,0,0,0,0),
           array('12:30 To 01:30',0,0,0,0,0,0),
           array('02:00 To 03:00',0,0,0,0,0,0),
           array('03:00 To 04:00',0,0,0,0,0,0),
           array('04:00 To 05:00',0,0,0,0,0,0),
           array('05:00 To 06:00',0,0,0,0,0,0)
          );
    }

print_r($_SESSION[$labname]);
echo "<br>";
print_r($_SESSION[$lecname]);
    $_SESSION['dayname'] = array('','Monday','Tuesday','Wendesnday','Thursday','Friday','Saturday');
    if (isset($_POST['day']) && isset($_POST['time'])){
      if (isset($_POST['submit'])) {
        $day=$_POST['day'];$time=$_POST['time'];$day++;
         $_SESSION[$lecname][$time][$day]=1;
        
        for ($i=0; $i <6 ; $i++) { 
          $_SESSION[$labname][$day]=1;
        }echo "<br>";
           $time++;
          $_SESSION[$lecname][$time][$day]=2;
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
                       
                          $bfr1=$_SESSION['sdept'].$term.$r.($c-1).$lab;//CE1000
                          $bfr2=$_SESSION['sdept'].$term.($r+1).($c-1).$lab;//CE1100 
                          $str1=$_SESSION['sdept'].$term.$r.($c-1).($lab+1);//CE1001
                          $str2=$_SESSION['sdept'].$term.$r.($c-1).($lab+2);//CE1002
                          if ($flag==1) {
                              $query="select * from slot where sid='$str1'";
                              $result=mysqli_query($con,$query);
                              $x=mysqli_num_rows($result);
                              if ($x==0) {
                                $data="DELETE FROM `slot` WHERE `slot`.`sid` = '$bfr1'";//delete before record
                                $result=mysqli_query($con,$data);
                                $data2="INSERT INTO slot VALUES ('$str1', 'ABCD', '000000', 'NONE', '000')";//add new
                                $result=mysqli_query($con,$data2);
                                $data2="INSERT INTO slotfac VALUES ('$str1', '000')";//add new
                                $result=mysqli_query($con,$data2);
                                $data2="INSERT INTO slotfac VALUES ('$str1', '001')";//add new
                                $result=mysqli_query($con,$data2);
                                
                                if(!$result) {
                                       printf("Error: %s\n", mysqli_error($con));
                                       exit();
                                  }
                     
                               $data="DELETE FROM `slot` WHERE `slot`.`sid` = '$bfr2'";
                               $result=mysqli_query($con,$data);
                               $data2="INSERT INTO slot VALUES ('$str2', 'ABCD', '000000', 'NONE', '000')";
                               $result=mysqli_query($con,$data2);
                                 $data2="INSERT INTO slotfac VALUES ('$str2', '000')";//add new
                                $result=mysqli_query($con,$data2);
                                 $data2="INSERT INTO slotfac VALUES ('$str2', '001')";//add new
                                $result=mysqli_query($con,$data2);
                                }
                               echo "<td rowspan=".'2'.">".$str1."</td>";
                               echo "<td rowspan=".'2'.">".$str2."</td>";
                              }
                            else{
                               echo "<td rowspan=".'2'.">".$str1."</td>";
                               echo "<td rowspan=".'2'.">".$str2."</td>";

                            }
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
                      if($flag==0)
                      {
                          $bfr1=$_SESSION['sdept'].$term.$r.($c-1).$lab;
                          $bfr2=$_SESSION['sdept'].$term.($r+1).($c-1).$lab; 
                          $str1=$_SESSION['sdept'].$term.$r.($c-1).($lab+1);
                          $str2=$_SESSION['sdept'].$term.$r.($c-1).($lab+2);

                                $data="DELETE FROM `slot` WHERE `slot`.`sid` = '$str1'";//delete before record
                                $result=mysqli_query($con,$data);
                                $data2="INSERT INTO slot VALUES ('$bfr1', 'ABCD', '000000', 'NONE', '000')";//add new
                                $result=mysqli_query($con,$data2);
                                $data2="INSERT INTO slotfac VALUES ('$bfr1', '000')";//add new
                                $result=mysqli_query($con,$data2);


                                $data="DELETE FROM `slot` WHERE `slot`.`sid` = '$str2'";//delete before record
                                $result=mysqli_query($con,$data);
                                $data2="INSERT INTO slot VALUES ('$bfr2', 'ABCD', '000000', 'NONE', '000')";//add new
                                $result=mysqli_query($con,$data2);
                                $data2="INSERT INTO slotfac VALUES ('$bfr2', '000')";//add new
                                $result=mysqli_query($con,$data2);
                             
                     }
                          echo "<td colspan=".'2'.">".$_SESSION['sdept'].$term.$r.($c-1).$lab."</td>";

                     }
                    }
                     if($flag==0)
                      {
                                $bfr1=$_SESSION['sdept'].$term.$r.($c-1).$lab;

                                 $query="update `slot` set scode='000000',rno='NONE' where `slot`.`sid`='$bfr1'";//updatebefore record
                                $result=mysqli_query($con,$query);
                        }
                     if ($row==2 && $col==6) {
                           echo "</tr><tr id='res'>";

                           echo "<td colspan=".'2'.">01:30 to 02:00</td>";
                           echo "<td colspan=".'12'."><center>Recess</center></td>";
                           echo "</tr>";

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
<?php

if (isset($_POST['done'])) {
header("Location: table1.php");
}
  ?>
</form>
</body>
</html><!-- 
How to change value of the array when click on submit button without clearing changes made before?
    There is a Problem When value change of array it works but When I change 
    second value changes made before gone because array redeclare on page 
    loading please give a solution when I submit array value permanently change 
    and 
    I can change much value of value. -->