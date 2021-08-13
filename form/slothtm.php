<html>
<head>
<title>
Slot
</title>
<link rel="stylesheet" type="text/css" href="table.css">

</head>
<body><center><?php
  include'menu.php';
  ?><center>
<h1>Enter Slot  Details</h1>
<form method="post" action="slotphp.php">
<input type="text" name="sid" placeholder="Slot ID" required/>
<br><br>
<input type="text" name="time" placeholder="Time" required/>
<br><br>
<label>Select Day</label>
<select name="day" required>
    <option value="monday">Monday</option>
    <option value="tuesday">Tuesday</option>
    <option value="wednesday">Wednesday</option>
    <option value="thursday">Thursday</option>
    <option value="friday">Friday</option>
    <option value="saturday">Saturday</option>
</select>
<br><br>
<input type="text" name="batch" placeholder="batch">
<br><br>
<input type="submit" name="submit" value="submit">
</form></center>
</body>
</html>