
     <B> <label>Select Day:</label></B><select name="day">
    <option>Monday</option>
    <option>Tuesday</option>
    <option>Wednesday</option>
    <option>Thursday</option>
    <option>Friday</option>
    <option>Saturday</otion>
  </select>
  <br><br>
  <B> <label>Select Type:</label></B><select name="type" id="type" ><option>Lecture</option>
    <option>Laboratory</option></select><br><br>
  <B> <label>Select Hour:</label></B><select name="hour" id="hour">
    <option>10:30 To 11:30</option>0
    <option>11:30 To 12:30</option>1
    <option>12:30 To 1:30</option>2
    <option>2:00 To 3:00</option>3
   <option>3:00 To 4:00</option>4
    <option>4:00 To 5:00</option>5
    <option>5:00 To 6:00</option>6

  </select> 
  <input type="number" id="test1" name="hr" min="1" max="2" value="1" />
  <br><br>
  <label for="email"><b>Select Subject  </b></label><select name="subject">Your Subject
        <?php
           $con= mysqli_connect("localhost", "root", "") or die(mysqli_error()); 
           $db= mysqli_select_db($con,"timetable") or die(mysqli_error()); 
            $query="SELECT * FROM Subject where sem=2";
            $result = mysqli_query($con,$query);
            while($nt=mysqli_fetch_array($result)){
            $name = $nt['sname'];
            echo '<option value="' . $name . '">' . $name . '</option>';
            }
            ?>
            </select> <br>  <br>
            <b>Select Faculty</b></label>
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
            </select> <br> <br>
              <label for="psw-repeat"><b>Select Room</b></label>   <select name="room">
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
            </select><br><br>
  
  <button type="submit" value="Submit">Submit</button></center><br><br>
  </div>
      <table id="timetable">
  <tr>
     <th></th>
     <th >Monday</th>
     <th>Tuesday</th>
     <th>Wednesday</th>
     <th>Thursday</th>
     <th>Friday</th>
     <th>Saturday</th>
  </tr>
  <tr>
    <th>10:30 to 11:30</th>
    <td id="i01">
<?php  
              
                if (isset($_POST['subject'])) {
                    $subject=$_POST['subject']; echo $subject."<br>";}
                if (isset($_POST['faculty'])) {
                    $faculty=$_POST['faculty']; echo $faculty."<br>";}
                  if (isset($_POST['room'])) {
                      $room=$_POST['room']; echo $room."<br>"; 
                      }
      ?>
      </td>
    <td id="i02"></td>
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
    <th>1:30 to 2:00</th>
    
    <td colspan="6"> <center>Reccess</center></td>
  
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
<!--   --></body>
</html>
