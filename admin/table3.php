<!DOCTYPE html>
<html>
<head><title>Create Timetable</title>
  <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
 
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" type="text/css" href="../css/creatett_css.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 <h1><center>Bhailalbhai and Bhikhabhai Institute of Technology3 </center></h1>

      <center><label><b>Select Department </b></label><select name="dept">
        <?php
           $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            $query="SELECT * FROM department";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['name'];
            echo '<option  value="' . $name . '">' . $name . '</option>';
            }
        ?></select> </center><br><center>
        <label for="salarieids"><B>Division:</B></label>
        <?php
          $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
           
          $query = "SELECT division.*, department.* FROM division, department WHERE division.dept_id= department.dept_id  ";  
          $result = mysqli_query($con,$query);
          if ($result) :
        ?>
        <select id="salarieids" name="salarieid"><option selected="">select division</option>
          <?php
           
            while ($row = mysqli_fetch_assoc($result)) 
              echo '<option value="', $row['sem'], '">',"DIV", " ",$row['sname'],":" ,$row['sem'], '</option>'; 
          ?>
        </select></center>
        <?php endif ?>
      <script>
         $(function(){
      // bind change event to select
      $('#salarieids').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url==2) { // require a URL
              window.location = "table1.php" ; // redirect
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
<table id="timetable">
  <tr>
    
     <th></th>
     <th>Monday</th>
     <th>Tuesday</th>
     <th>Wednesday</th>
     <th>Thursday</th>
     <th>Friday</th>
     <th>Saturday</th>
  </tr>
  <tr>
    <th>10:30 to 11:30</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>   
    <td></td>
    
  </tr>
  <tr>
    <th>11:30 to 12:30</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>12:30 to 1:30</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>2:00 to 3:00</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>3:00 to 4:00</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>4:00 to 5:00</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>5:00 to 6:00</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
<!--onclick="alert('You are clicking on the cell EXAMPLE')"-->
</table>  
</body>
</html>