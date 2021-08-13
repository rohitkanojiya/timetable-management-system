<!DOCTYPE html>
<html>
<head>
	<title>Admin Place</title>
	<link rel="stylesheet" type="text/css" href="../css/admin_css.css">
</head>
<body>
	<div>
	<center><h1>TIMETABLE MANAGEMET SYSTEM</h1></center>
</div>
<div class="container">
    <div class="topnav">
      <a href="../index.php">Home</a>
      <a href="../contactus.htmls">Contact</a>
      <a href="../about_us.html">About</a>
    </div>
  </div>
<form action="Login.php" method="POST">
	<center><h1 class="title">Administration Login</h1>

	<LABEL style="margin-left: 0px;"><b>User Name	</b></LABEL> <input type="text" name="aduname" placeholder="Enter user name" autofocus="true"></br>
	<label ><b>Password</b></label><input type="password" name="adpass" placeholder="Enter valid Password"></br>
	<input type="submit" name="submit" value="Submit">
	<input type="submit" name="cancel" value="Cancel"></center>
	<div style="text-align: center;margin-top: 10px;">
	<?php
	session_start();
	if (isset($_SESSION['wron'])) {
		echo $_SESSION['wron'];
	}
	// else {
		// echo "<br><center>Entered Username And Password Is Invalid Please Try Again !:)</center>";

	// }
	?></div>
</form>
</body>
</html>
