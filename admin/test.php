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
    if (isset($_POST['dept'])) {
      $_SESSION['dept']= $_POST['dept'];
    }
    if (isset($_POST['term'])) {
    $_SESSION['term'] = $_POST['term'];
      }
?>
 <form method="post" action="table1.php">
  <center>
        <label for="salarieids"><B>Division:</B></label>
        <?php
      $tm=$_SESSION['term'];

          $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
           
          $query = "SELECT * FROM division Where term='$tm'";  
          $result = mysqli_query($con,$query);
          if ($result) :
        ?>

        <select id="salarieids" name="salarieid" ><option >select division</option>
           <?php
            while ($row = mysqli_fetch_array($result)) 
              echo '<option value="'.$row['sem'].'">'."DIV :".$row['sem'].'</option>'; 
          ?>
        </select><br><br>
        <?php endif ?>
      <script>
         $(function(){
      // bind change event to select
      $('#salarieids').on('change', function () {
          var url = $(this).val(); // get selected valu
           $("#test1").val(url);
          if (url==2) { // require a URL
              window.location = "table1.php" ;
               // redirect
          }
          if (url==4) { // require a URL
              window.location = "table2.php" ; // redirect
          }
          if (url==6) { // require a URL
              window.location = "table3.php" ; // redirect
          }
          return false;
      });
    });
      
</script>

     <B> <label>Select Day:</label></B><select name="day">
    <option>Monday</option>
    <option>Tuesday</option>
    <option>Wednesday</option>
    <option>Thursday</option>
    <option>Friday</option>
    <option>Saturday</otion>
  </select>
  <B> <label>Select Hour:</label></B><select name="hour" id="hour">
    <option>10:30 To 11:30</option>0
    <option>11:30 To 12:30</option>1
    <option>12:30 To 1:30</option>2
    <option>2:00 To 3:00</option>3
   <option>3:00 To 4:00</option>4
    <option>4:00 To 5:00</option>5
    <option>5:00 To 6:00</option>6

  </select> 
  <br><br>
  <label for="email"><b>Select Subject  </b></label><select name="subject">Your Subject
        <?php
           $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            $query="SELECT * FROM Subject where sem=2";
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
           $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            $query="SELECT * FROM Faculty";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['fullname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select>
              <label for="psw-repeat"><b>Select Room</b></label>   <select name="room">
        <?php
           $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            $query="SELECT * FROM Room";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['rno'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select><br><br>
  
  <button type="submit" value="Submit">Submit</button></center><br><br>
  </div>
  <table id="timetable">
  <?php    echo "<tr>";
        for ($col = 0; $col < 7; $col++) {
          echo "<th colspan=".'2'.">".$_SESSION['dayname'][$col]."</th>";
        }
        echo "</tr>";
      for ($row = 0; $row < 7; $row++) {
           echo "<tr>";
            for ($col = 0; $col < 7; $col++) {
                  if ($_SESSION['numb'][$row][$col]==1) {
                  echo "<td rowspan=".'2'."  >"."RK".$_SESSION['numb'][$row][$col]."</td>";
                  echo "<td rowspan=".'2'.">"."RK".$_SESSION['numb'][$row][$col]."</td>";}
                else if($_SESSION['numb'][$row][$col]==2){
                                    
                    if($_SESSION['numb'][$row][$col]=='2'){   
                    }
                  
                    if ($_SESSION['numb'][$row][$col]=='02:00 To 03:00' && $row==3 && $col==0) {
                      echo "<td colspan=".'2'.">".$_SESSION['numb'][$row][$col]."</td>";
                    
                    }
                }
                  else{
                  echo "<td colspan=".'2'.">".$_SESSION['numb'][$row][$col]."</td>";  }
                }
           echo "</tr>";
         }
  ?>
</table>
</body>
</html>


       