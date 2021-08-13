<html>
<head>
<title>
Room
</title><link rel="stylesheet" type="text/css" href="table.css">

</head>
<body><center><?php
  include'menu.php';
  ?>
<center>
<h1>Enter Room  Details</h1>
<form method="post" action="roomphp.php">
<input type="text" name="rno" placeholder="Room No" required/>
<br><br>
<input type="text" name="type" placeholder="Type" required/>
<br><br>
<input type="text" name="floor" placeholder="Floor">
<br><br>
<input type="text" name="block" placeholder="block">
<br><br>
<input type="submit" name="submit" value="submit">
</form></center>
</body>
</html>