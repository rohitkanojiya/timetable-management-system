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
  <li><a href="../admin/adminhome.php">Home</a></li>

  <li><a href="#">Manage</a>
    <ul>

    <li><a href="../form/deptview.php">Department</a>
    </li>
    <li><a href="../form/divisionview.php">Division</a>
    </li>
    <li><a href="../form/roomview.php">Room</a>
    </li>
    <li><a href="../form/facultyview.php">Faculty</a>
    </li>
    <li><a href="../form/subjectview.php">Subject</a>
    </li>
  </ul>

    <li><a href="slot_view.php"> Manage  Timetable</a>
    </li>
  <li><a href="slot_selection.php">Create Timetable</a></li>
  <li><a href="guide.php">How it works</a></li>
  <li><a href="logout.php">Log Out</a>
</ul>
<form method="post" action="Data_view.php"><br><br>
<center>
      <label><b>Select Department </b></label><select name="dept">
        <?php
          include "connect.php";

            $query="SELECT * FROM department";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['name'];
            echo '<option  value="' . $name .'">' . $name . '</option>';
            }
        ?></select> <br>
        <div name="term">
     <label for="psw-repeat" style="margin-top: 10px; padding: 5px;"><b>Term</b></label><select name="term" style="margin-top: 10px">
      <option value="odd">Odd</option>
      <option value="even">Even</option></select></div> </br>
      <button class="but">Submit</button>
    </center>
</form>
</body>
</html>
