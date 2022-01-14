<?php
include "DBconnect.php";
session_start();
?>
<html>
    <head>
        <title>Doctor Home</title>
        <link rel="stylesheet" href="DoctorHomeStyle.css">
    </head>
    <body>
    <div class=titlebar><b>
    <a href="DoctorApmnts.php">Appointments</a>
    <a class=signinbtn href="DoctorProfile.php">Profile</a>
    </div>
    <div class="upcomingtimeschedules" >
        <div class="heading">
        <h2 style="margin-top:0px;">Hello Doctor, Your time Schedules </h2>
        </div>
        <div class="time_schedules">
        <?php
        $sql = "SELECT * FROM TimeSchedule WHERE DoctorID='{$_SESSION['ID']}'";
          $result = $db->query($sql);

          if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {
             echo '<div class=t1doc>';
             echo "<p style='margin-left:10px;'>Start time:".$row["Start_time"]."<br>End time:".$row["End_time"]."<br>Date:".$row["Date"]."</p>";
             echo '</div>';
             }
            } else {
              echo '<div class=t1doc>';
              echo "<h3 style='margin-left:10px;'><b>You haven't added any Time Schedules yet</b>";
              echo "</div>";
}
?>
        </div>
    
    </div>
    <button id="adddctrbtn" onclick="openForm()">Add Time</button>
    <div class="form-popup" id="myForm">
        <div class="inputs">
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <h3 style="margin-left:80px">Add a consulting time</h3>
            <div class="starttime_input">
            <label for="starttime">start time</label><br>
            <input type="time" name="starttime">
            </div>
            <div class="endtime_input">
            <label for="endtime">end time</label><br>
            <input type="time" name="endtime"><br>
            </div>
            <div class="enterdate_input">
            <label for="enterdate">Enter your data</label><br>
            <input type="date" name="enterdate"><br>
            </div>
            <input type="submit" value="Add" name="addtime" class="addbtn">
            <button type="button" class="btncancel" onclick="closeForm()">Close</button>
        </form>
        </div>
    </div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
        <?php
        if(isset($_POST["addtime"]))
        {
          $start_time=$_POST['starttime'];
          $end_time=$_POST['endtime'];
          $date=$_POST['enterdate'];
          $doctorId=$_SESSION["ID"];
          $sql="INSERT INTO TimeSchedule(Date, Start_time, End_time, DoctorID) VALUES ('$date','$start_time','$end_time','$doctorId')";
          if($db->query($sql))
          {
          echo "Added";
          }
        }
        ?>
        <div class=footer>
        <h1>CONTACT US</h1><br>
        <p>Call us:XXXX XXXX XX<br>E-mail us:abcd@gmail.com</p>
        <!-- <p id="complaint"><a href="">Register a complaint</a></p> -->
        <p id="adminreg"><b><a href="">Register a Complaint</a></b><p>
        </div>
        </body>
</html>
