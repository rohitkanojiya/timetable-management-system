
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
</ul><?php session_start(); ?>

<?php if (isset($_SESSION['admin'])) {
  echo "<h2><B><center>Welcome Admin</center></B></h2>";
  }
  else{
    header("Location: admin.php");
  } ?>
</body>
</html>
