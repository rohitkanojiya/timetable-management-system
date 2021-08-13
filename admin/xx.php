
<!DOCTYPE html>
<html>
<head><title>Create Timetable</title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
  <script src="../js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../css/aftertt.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<?php 
    session_start();
        $lab=0;
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
  <form id="form1" runat='server'>    
      

  
      <ul class="main-navigation">
  <li><a href="adminhome.php">Home</a></li>
  
    </li>
    <li><a href="#"> Manage Timetable</a>
    </li>
    <li><a href="delete_timetable.php"> Delete This Timetable</a>
    </li>
     <li><a href="table1.php"> Edit This Timetable</a>
    </li>
    <li><a href="#"> Complete </a>
    </li>
    <li><input type="button" id="printe" value="Print" onclick="javascript:printDiv('sample')" />
    </li>
  <li><a href="logout.php">Log Out</a></li>
</ul>
</form>
<div>
 <form method="post" action="xx.php"> 
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
<center><input type="submit" class="divi" name="one" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[0];?>">
      <input type="submit" class="divi" name="two" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[1];?>">
      <input type="submit" class="divi" name="three" value="<?php echo "DIV :".$_SESSION['sdept']."-".$sem[2];?>"></br>

      
<br>

<?php
  if (isset($_POST['one']))
 {
      $_SESSION['semester']=$sem[0];

     $_SESSION['tmp']=1;
      $_SESSION['labpage']="Select_lab_1";
      if (isset($_SESSION['num1'])){
      $_SESSION['numb']=$_SESSION['num1'];
          $_SESSION['labs']=$_SESSION['lab1']; 
      }
      $term=$_SESSION['semester'];
  echo "<label><B>Division:</B></label>";
      $_SESSION['DIV']="DIV :".$_SESSION['sdept']."-".$sem[0];
      echo "<label class='lbldivd'>". $_SESSION['DIV']."</label>";
      
 }
 elseif(isset($_POST['two']))
 {  $_SESSION['semester']=$sem[1];

      $_SESSION['tmp']=2;
      $_SESSION['labpage']="Select_lab_2";
      if (isset($_SESSION['num2'])){
      $_SESSION['numb']=$_SESSION['num2'];
          $_SESSION['labs']=$_SESSION['lab2']; 
      }
      $term=$_SESSION['semester']; 

  echo "<label><B>Division:</B></label>";
      $_SESSION['DIV']="DIV :".$_SESSION['sdept']."-".$sem[1];
      echo "<label class='lbldivd'>". $_SESSION['DIV']."</label>";
   
 }
 elseif (isset($_POST['three']))
 {
     $_SESSION['semester']=$sem[2];

      $_SESSION['tmp']=3;
      $_SESSION['labpage']="Select_lab_3";
      if (isset($_SESSION['num3'])){
      $_SESSION['numb']=$_SESSION['num3'];
          $_SESSION['labs']=$_SESSION['lab3']; 
      }
      $term=$_SESSION['semester']; 

  echo "<label><B>Division:</B></label>";
      $_SESSION['DIV']="DIV :".$_SESSION['sdept']."-".$sem[2];
      echo "<label class='lbldivd'>". $_SESSION['DIV']."</label>";
   
 }
 else{
  if (!isset($_SESSION['tmp'])) {
     $_SESSION['tmp']=1;
      if ($_SESSION['tmp']==1) {
      $_SESSION['semester']=$sem[0];
      $_SESSION['labpage']="Select_lab_1";
      if (isset($_SESSION['num1'])){
      $_SESSION['numb']=$_SESSION['num1'];
          $_SESSION['labs']=$_SESSION['lab1']; 
      }
      $term=$_SESSION['semester'];$lab=0; 
    }
  }
  else
  {
     if ($_SESSION['tmp']==1) {
      $_SESSION['semester']=$sem[0];
      $_SESSION['labpage']="Select_lab_1";
      if (isset($_SESSION['num1'])){
      $_SESSION['numb']=$_SESSION['num1'];
          $_SESSION['labs']=$_SESSION['lab1']; 
      }
      $term=$_SESSION['semester']; 
    }
    elseif ($_SESSION['tmp']==2) {
  $_SESSION['semester']=$sem[1];
      $_SESSION['labpage']="Select_lab_2";
      if (isset($_SESSION['num2'])){
      $_SESSION['numb']=$_SESSION['num2'];
          $_SESSION['labs']=$_SESSION['lab2']; 
      }
      $term=$_SESSION['semester']; 
  }
   elseif ($_SESSION['tmp']==3) {
   $_SESSION['semester']=$sem[2];
      $_SESSION['labpage']="Select_lab_2";
      if (isset($_SESSION['num2'])){
      $_SESSION['numb']=$_SESSION['num2'];
          $_SESSION['labs']=$_SESSION['lab2']; 
      }
      $term=$_SESSION['semester'];
  }
  }
  

  if (isset($_SESSION['DIV'])) {
  echo "<div class='lbldivc'><B>Division:<label id='lbldivd'>".$_SESSION['DIV'].$_SESSION['semester']."</label></B></div>"; 
      $term=$_SESSION['semester'];
  }
  else{
  echo "<div class='lbldivc'><B>Division:<label id='lbldiv'>Select division</B></label></div>";
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
?>
 
  <?php if (isset($_SESSION['dayname'])) {
    
  ?></center>
 <div class='sample' id='sample'>

     <h3><center>Bhailalbhai and Bhikhabhai Institute of Technology</center></h3>
     <h4><center><?php echo $_SESSION['DIV'];?></center></h4><br>
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
                  if ($_SESSION['numb'][$row][$col]==1) {
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