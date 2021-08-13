<!DOCTYPE html>
<html>
<head><title>Create Timetable</title>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/creatett_css.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 <!--<FilesMatch "^.*?api.*?$">
SetHandler php5-script
</FilesMatch>-->

<script type="text/javascript">
  var searchedLoginClaims = sessionStorage.getItem("termsel");
  if(searchedLoginClaims != undefined || searchedLoginClaims != null){
  $(".termsel select").first().find(":selected").removeAttr("selected");
  $(".termsel select").find("option").each(function () {
            if ($(this).val() == searchedLoginClaims) {
                $(this).attr("selected", true);
            }
        });
}

$('.termsel select').change(function () {
  sessionStorage.setItem("termsel", $(".termsel select").first().val());
  
  location.reload();
});
</script>
<h1><center>Bhailalbhai and Bhikhabhai Institute of Technology</center> </h1>
<h2><?php if (isset($_POST['dept'])) { 
      $department=$_POST["dept"];  echo $department."  ";}
      if (isset($_POST['term']))  {
      $term=$_POST["term"];  }
      ?>
 </h2><center>
  <select autofocus="true" name="termsel" onchange="window.location=this.value">
<?php if (isset($_POST['term'])){
      $term=$_POST["term"];  
      if($term=="ODD")
      {echo '<option name="odd" value="creatett.php">'."DIV : CE-1".'</option>';
      echo '<option name="odd" value="table2.php">'."DIV : CE-3".'</option>';
      echo '<option name= "odd" value="table3.php">'."DIV : CE-5".'</option>';}
      else
      {echo '<option name= "even" value="creatett.php">'."DIV : CE-2".'</option>';
      echo '<option name= "even" value="table2.php">'."DIV : CE-4".'</option>';
      echo '<option name= "even" value="table3.php">'."DIV : CE-6".'</option>';}
       }
    ?>
        
      </select></center> 
<table id="timetable">
  <tr>
    
     <th></th>
     <th>Monday</th>
     <th>Tuesday</th>
     <th>Wednesday</th>
     <th>Thursday</th>
     <th>Friday</th>
     <th>Saturday</th>
  </tr>
  <tr>
    <th>10:30 to 11:30</th>
    <td id="i01">
<?php  if(isset($_POST['subject'])){
             $subject=$_POST["subject"]; 
           $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            $query="SELECT * FROM subject ";
            $result = mysqli_query($con,$query);
            $nt=mysqli_fetch_array($result);
            } 

                if (isset($_POST['subject'])) {
                    $subject=$_POST['subject']; echo $subject."<br>";}
                if (isset($_POST['faculty'])) {
                    $faculty=$_POST['faculty']; echo $faculty."<br>";}
                    if (isset($_POST['batch'])) {
                      $batch=$_POST['batch']; echo $batch."<br>"; 
                    }
                  if (isset($_POST['room'])) {
                      $room=$_POST['room']; echo $room."<br>"; 
                      }
      ?>
      </td>
    <td id="i02" rowspan="2">wsa</td>
    <td id="i03"></td>
    <td id="i04"></td>
    <td id="i05"></td>   
    <td id="i06"></td>
    
  </tr>
  <tr>
    <th>11:30 to 12:30</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>12:30 to 1:30</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>2:00 to 3:00</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>3:00 to 4:00</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>4:00 to 5:00</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>5:00 to 6:00</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
<!--onclick="alert('You are clicking on the cell EXAMPLE')"-->
</table>  

 <span document.getElementById('id01')onclick="document.getElementById('id01').style.display='none'" ></span>
<div id="id01" class="modal">
  
  <form class="modal-content" method="post" action="creatett.php">
    <div class="container">
      <h1>Insert Data For Slot</h1>
      <hr>
        <label>Select Type</label>
         <input type="radio" name="type" value="Lecture"  > Lecture
         <input type="radio" name="type" value="Laboratry" id="r01"> Laboratry<br>

         <script type="text/javascript">

        (function (){
                var radios = document.getElementsByName('type');
                 console.log(radios);
                 for(var i = 0; i < radios.length; i++){
                  radios[i].onclick = function(){
                      function createSelect() {
                          var myDiv = document.getElementById("myDiv");
                              var array = ["Volvo", "Saab", "Mercades", "Audi"];

                              var selectList = document.createElement("select");
                              selectList.setAttribute("id", "mySelect");
                               myDiv.appendChild(selectList);

                               for (var i = 0; i < array.length; i++) {
                                 var option = document.createElement("option");
                                  option.setAttribute("value", array[i]);
                                  option.text = array[i];
                                  selectList.appendChild(option);
                                        }
                                      }
                          document.getElementById("r01").addEventListener("click", function(){
                              createSelect();
                          });
                  /*<?php
                   // header("Content-type: application/javascript");
                  ?>*/
              }
          }
        })();

       
        </script>
      <label for="email"><b>Select Subject  </b></label><select name="subject">Your Subject
        <?php
           $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            $query="SELECT * FROM Subject";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select> 
        <div id="myDiv"></div>

        
      <label for="psw-repeat"><b>Select Faculty</b></label>
     <select name="faculty">
        <?php
           $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            $query="SELECT * FROM Faculty";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['fullname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select> <br>
     <label for="psw-repeat"><b>Select Batch</b></label>
     <input type="radio" name="batch" value="AB">AB
     <input type="radio" name="batch" value="CD">CD
     <input type="radio" name="batch" value="ABCD">ABCD<br>
     <label for="psw-repeat"><b>Select Room</b></label>
     <select name="room">
        <?php
           $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            $query="SELECT * FROM Room";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['rno'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select>
     
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="confirmbtn">Confirm</button>
      </div>
    </div>
  </form>
</div>

<script>
 
// Get the modal
var modal= document.getElementById('id01');
var slot01 = document.getElementById('i01');
var slot02 = document.getElementById('i02'); 
var slot03 = document.getElementById('i03'); 
var slot04 = document.getElementById('i04'); 
var slot05 = document.getElementById('i05'); 
var slot06 = document.getElementById('i06'); 

i01.onclick= function(event)
{
  if (event.target == slot01,modal) {
    modal.style.display='block'
    slot01.style.background='red'
    modal.style.width='auto'
  }
}
i02.onclick= function(event)
{
  if (event.target == slot02,modal) {
    modal.style.display='block'
    slot02.style.background='blue'
    modal.style.width='auto'
  }
}
i03.onclick= function(event)
{
  if (event.target == slot03) {
    //slot1.style.display='block'
    slot03.style.background='green'
    //slot1.style.width='auto'
  }
}
i04.onclick= function(event)
{
  if (event.target == slot04) {
    //slot1.style.display='block'
    slot04.style.background='yellow'
    //slot1.style.width='auto'
  }
}
i05.onclick= function(event)
{
  if (event.target == slot05) {
    //slot1.style.display='block'
    slot05.style.background='pink'
    //slot1.style.width='auto'
  }
}
i06.onclick= function(event)
{
  if (event.target == slot06) {
    //slot1.style.display='block'
    slot06.style.background='red'
    //slot1.style.width='auto'
  }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script>
  $("#first-choice").change(function() {
  $("#second-choice").load("getter.php?choice=" + $("#first-choice").val());
});
</script>
</body>
</html>
