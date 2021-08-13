<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="../css/creatett_css.css">
	<title>timetable</title>
</head>
<body>
	<form action="table5.php" method="post">

<h4>Select Day And Time Where you want to add LABORATORY Slot in table</h4></br>

     <B> <label>Select Day:</label></B><select id="day" name="day">
    <option value="0">Monday</option>
    <option value="1">Tuesday</option>
    <option value="2">Wednesday</option>
    <option value="3">Thursday</option>
    <option value="4">Friday</option>
    <option value="5">Saturday</otion>
  </select>
  <B> <label>Select Hour:</label></B><select name="time" id="hour">
    <option value="0">10:30 To 11:30</option>
    <option value="1">11:30 To 12:30</option>
    <option value="3">2:00 To 3:00</option>
    <option value="4">3:00 To 4:00</option>
    <option value="5">4:00 To 5:00</option>
    <option value="6">5:00 To 6:00</option>
  </select>

<input type="submit" name="submit" value="submit">
<input type="submit" name="reset" value="Reset">
<input type="submit" name="done" value="Done"><br>
<?php
if (isset($_POST['done'])) {
header("Location: table1.php");
}
	?>
<table border="1">
	
	<?php
	session_start();
	
	if (isset($_POST['reset'])) {
			 
		if (isset($_SESSION['numb'])) {

		$_SESSION['numb'] = array(
		 			 array('10:30 To 11:30',0,0,0,0,0,0),
		 			 array('11:30 To 12:30',0,0,0,0,0,0),
		 			 array('12:30 To 01:30',0,0,'ROCKY',0,0,0),
		 			 array('02:00 To 03:00',0,0,0,0,0,0),
		 			 array('03:00 To 04:00',0,0,0,0,0,0),
		 			 array('04:00 To 05:00',0,0,0,0,0,0),
		 			 array('05:00 To 06:00',0,0,0,0,0,0)
		  		);	}

		if (isset($_SESSION['labs'])) {
			$_SESSION['labs'] = array(0,0,0,0,0,0,0);
		}

	}
	if (!isset($_SESSION['numb'])) {
		$_SESSION['labs'] = array(0,0,0,0,0,0,0);
		$_SESSION['numb'] = array(
		 			 array('10:30 To 11:30',0,0,0,0,0,0),
		 			 array('11:30 To 12:30',0,0,0,0,0,0),
		 			 array('12:30 To 01:30',0,0,1,0,0,0),
		 			 array('02:00 To 03:00',0,0,0,0,0,0),
		 			 array('03:00 To 04:00',0,0,0,0,0,0),
		 			 array('04:00 To 05:00',0,0,0,0,0,0),
		 			 array('05:00 To 06:00',0,0,0,0,0,0)
		  		);
		}
		$_SESSION['dayname'] = array('','Monday','Tuesday','Wendesnday','Thursday','Friday','Saturday');
		if (isset($_POST['day']) && isset($_POST['time'])){
			if (isset($_POST['submit'])) {
				$day=$_POST['day'];$time=$_POST['time'];$day++;
				 $_SESSION['numb'][$time][$day]=1;
				
				for ($i=0; $i <6 ; $i++) { 
					$_SESSION['labs'][$day]=1;
				}echo "<br>";
		   		 $time++;
		  	  $_SESSION['numb'][$time][$day]=2;}
		  	  echo "<tr>";
		    for ($col = 0; $col < 7; $col++) {
		    	echo "<th colspan=".'2'.">".$_SESSION['dayname'][$col]."</th>";
		  	}
		  	echo "</tr>";
			for ($row = 0; $row < 7; $row++) {
				   echo "<tr>";
					  for ($col = 0; $col < 7; $col++) {
					  			if ($_SESSION['numb'][$row][$col]==1) {
								  echo "<td rowspan=".'2'." >"."RK".$_SESSION['numb'][$row][$col]."</td>";
						 		  echo "<td rowspan=".'2'.">"."RK".$_SESSION['numb'][$row][$col]."</td>";}
								else if($_SESSION['numb'][$row][$col]==2){
						  											
						  			if($_SESSION['numb'][$row][$col]=='2'){		
						  			}
						  		
						  			if ($_SESSION['numb'][$row][$col]=='02:00 To 03:00' && $row==3 && $col==0) {
						  				echo "<td colspan=".'2'.">".$_SESSION['numb'][$row][$col]."</td>";
						  			
						  			}
								}
						  		// else if($row==3 && $col==0){
						  		//  echo "<td>".$_SESSION['numb'][3][0]."</td>";
						  		// }
						  		else
					  			echo "<td colspan=".'2'.">".$_SESSION['numb'][$row][$col]."</td>";
								// if ($_SESSION['numb'][$row][$col]==0 && $_SESSION['numb'][$row][$col]=='10:30 To 11:30' && $_SESSION['numb'][$row][$col]=='11:30 To 12:30' && $_SESSION['numb'][$row][$col]=='12:30 To 1:30' && $_SESSION['numb'][$row][$col]=='2:00 To 3:00' && $_SESSION['numb'][$row][$col]=='3:00 To 4:00' && $_SESSION['numb'][$row][$col]=='4:00 To 5:00' &&  $_SESSION['numb'][$row][$col]=='5:00 To 6:00') {
								
						  // 		  	echo "<td colspan=".'2'.">".$_SESSION['numb'][$row][$col]."</td>";
						  // 		  }
						  		
						  		}
					  	  }
				   echo "</tr>";
				 }
			else {
				echo "Please select day and time .!!!!";
			}
	?><br>
</table>

</form>
</body>
</html><!-- 
How to change value of the array when click on submit button without clearing changes made before?
    There is a Problem When value change of array it works but When I change 
    second value changes made before gone because array redeclare on page 
    loading please give a solution when I submit array value permanently change 
    and 
    I can change much value of value. -->