<?php
session_start();
          include "connect.php";

          if (isset($_POST['dept']) && isset($_POST['term'])) {
            $dept=$_POST['dept'];
            $_SESSION['dept']=$dept;
            $query="select *from department where name='$dept'";
            $cmd=mysqli_query($con,$query);
            $sdept=mysqli_fetch_assoc($cmd);
            $_SESSION['sdept']=$sdept['sname'];
            $_SESSION['term']=$_POST['term'];
            $_SESSION['tm']=$_SESSION['term'];
    $_SESSION['dayname'] = array('','Monday','Tuesday','Wendesnday','Thursday','Friday','Saturday');

          }
          if (isset($_SESSION['sdept'])) {

            header("location:complete.php");
          }
