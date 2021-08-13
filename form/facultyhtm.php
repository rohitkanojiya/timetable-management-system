<html>
<head>
<title>
Faculty
</title><link rel="stylesheet" type="text/css" href="table.css">

</head>
<body><center><?php
  include'menu.php';
  ?>
<center>
<h1>Enter Faculty Details</h1>
<form method="post" action="facultyphp.php">

<input type="text" name="fid" placeholder="Faculty ID" required/>
<br><br>
<input type="text" name="sname" placeholder="Short Name">
<br><br>
<input type="text" name="fullname" placeholder="Full Name" required/>
<br><br>
<input type="number" name="contcat_no" placeholder="Contact No">
<br><br>
<input type="email" name="email_id" placeholder="email id">
<br><br>
<label>Joining date</label>
<input type="date" name="joining_date">
<br><br>
<input type="text" name="designation" placeholder="Designation" required/>
<br><br>
<input type="number" name="avail_load" placeholder="Avail load">
<br><br>
<input type="submit" name="submit" value="submit">
</form></center>
</body>
</html>