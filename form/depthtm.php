<html>
<head>
<title>
Enter Department Details
</title>
<link rel="stylesheet" type="text/css" href="table.css">

</head>
<body><center><?php
  include'menu.php';
  ?>
<h1>Enter Department Details</h1>
<form method="post" action="deptphp.php">
<input type="text" name="dept_id" placeholder="Deparment ID" required/><br><br>
<input type="text" name="name" placeholder="Name" required/><br><br>
<input type="text" name="sname" placeholder="Enter Short name" required/><br><br>
<input type="submit" name="submit" value="submit">
</form></center>
</body>
</html>