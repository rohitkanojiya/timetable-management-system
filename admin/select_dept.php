<!DOCTYPE html>
<html>
<head><title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
  <div>
  <center><h1>TIMETABLE MANAGEMET SYSTEM</h1></center>        
</div>
<ul class="main-navigation">
  <li><a href="../index.php">Home</a></li>
  <li><a href="#">Search</a>
    <ul>
      <li><a href="#">Schedual</a></li>
      <li><a href="#">Teacher schedual</a>
      <li><a href="#">Room schedual</a></li>
     </ul>
  </li>
  <li><a href="#">Add Entry</a>
    <ul>
      <li><a href="user.php">User</a>
        <ul>
          <li><a href="../form/userhtm.php">Add</a></li>
          <li><a href="">View</a></li>
        </ul>
    </li>
    <li><a href="#">Department</a>
        <ul>
          <li><a href="../form/depthtm.php">Add</a></li>
          <li><a href="../form/deptview.php">View</a></li>
        </ul>
    </li>
    <li><a href="#">Division</a>
        <ul>
          <li><a href="../form/divisionhtm.php">Add</a></li>
          <li><a href="../form/divisionview.php">View</a></li>
        </ul>
    </li>
    <li><a href="#">Room</a>
        <ul>
          <li><a href="../form/roomhtm.php">Add</a></li>
          <li><a href="../form/roomview.php">View</a></li>
        </ul>
    </li>
    <li><a href="#">Faculty</a>
        <ul>
          <li><a href="../form/facultyhtm.php">Add</a></li>
          <li><a href="../form/facultyview.php">View</a></li>
        </ul>
    </li>
    <li><a href="#">Subject</a>
        <ul>
          <li><a href="../form/subjecthtm.php">Add</a></li>
          <li><a href="../form/subject.php">View</a></li>
        </ul>
    </li>
  </ul>
  <li><a href="select_dept.php">Create Timetable</a>
  <li><a href="#">About Us</a></li>
  <li><a href="#">Contact Us</a></li>
</ul>
<form method="post" action="creatett.php">
  <h1><center>Bhailalbhai and Bhikhabhai Institute of Technology</center> </h1>

      <label><b>Select Department </b></label><select name="dept">
        <?php
           $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            $query="SELECT * FROM department";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['name'];
            echo '<option  value="' . $name . '">' . $name . '</option>';
            }
        ?></select> <br>
        <div name="term">
     <label for="psw-repeat"><b>Term</b></label><select name="term" onChange="changecat(this.value);" >
      <option name="Term"value="Odd">Odd</option>
      <option name="Term"value="Even">Even</option></select></div> </br>
      <button class="button">Submit</button>
</form>
</body>
</html>