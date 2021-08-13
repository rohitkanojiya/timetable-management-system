<?php
session_start();
 		include 'connect.php';
            $query="SELECT * from user";
            $result = mysqli_query($con,$query);

while ($row = mysqli_fetch_array($result))
     {
	if (strcmp($_POST['aduname'],$row['username'])==0 && strcmp($_POST['adpass'],$row['userpass'])==0){
		$_SESSION['admin']="Welcome admin";

			header("Location: adminhome.php");}
	else
	{
		$_SESSION['wron']="Entered Username And Password Is Invalid Please Try Again !:)";

		header("Location: admin.php");
	}
}
?>
