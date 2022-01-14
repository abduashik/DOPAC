<!DOCTYPE html>
<?php
include "DBconnect.php";
session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Admin Home</title>
   <link rel="stylesheet" href="AdminHomeStyle.css">
</head>
<body>
<div class="container-fluid">
<ul>
  <center><h2 style="margin-bottom:0px;">DOPAC</h2></center><br>
  <center><h6 style="margin-top:-17px;">ADMIN</h6></center>
  <center><p style="margin-bottom:0px;">MENU</p></center>
  <hr>
  <li><center><a class="active" href="AdminHome.php">Home</a></center></li>
  <li><center><a href="AdminHomeDoctors.php">Doctors</a></center></li>
  <li><center><a href="AdminHomeAppnts.php">Appointments</a></center></li>
  <!-- <li><center><a href="AdminHomeDepts.php">Departments</a></center></li> -->
  <li><center><a href="#feedback">Pateint Feedbacks</a></center></li>
  <li><center><a href="AdminHomeProfile.php">Profile</a></center></li>
</ul>
</div>

<div style="margin-left:15%;padding:1px 16px;height:1000px;">
  <p style="font-size:40px"><b>Welcome,<?php echo $_SESSION["USERNAME"];?></b></p>
  <p><b>Your last month report</b></p>
  <div class=patientsconsulted>
  <?php
     $sql = "SELECT AdminID FROM Doctors WHERE AdminID='{$_SESSION['ID']}'";
     $result = $db->query($sql);
 
      if ($result->num_rows > 0) {
        $i=0;
       while($row = $result->fetch_assoc()) 
         {
         $i++;
         }
         }
      else 
         {
           $i=0;
         }
  ?>
  <label for="num" style="font-size:170px;color:white"><b><center><?php echo $i; ?></center></b></label>
  <label for="num" style="font-size:30px;color:white"><b><center>No. Of Doctors</center></b></label>
  </div>
  <div class=patientsconsulted1>
  <?php
     $sql = "SELECT AdminID FROM Appointments WHERE AdminID='{$_SESSION['ID']}'";
     $result = $db->query($sql);
 
      if ($result->num_rows > 0) {
        $i=0;
       while($row = $result->fetch_assoc()) 
         {
         $i++;
         }
         }
      else 
         {
           $i=0;
         }
  ?>
  <label for="num" style="font-size:170px;color:white"><b><center><?php echo $i; ?></center></b></label>
  <label for="num" style="font-size:30px;color:white"><b><center>Appointments Booked</center></b></label>
  </div>
  <div class=patientsconsulted2>
 <label for="num" style="font-size:170px;color:white"><b><center>NA</center></b></label>
  <label for="num" style="font-size:30px;color:white"><b><center>%<br>Positive Feedback</center></b></label>
  </div>
  <div class=apnmntsperdpt>
   <h1><b>Doctors with most appointments</b></h1>
   <?php
    $sql = "SELECT DoctorID,Name FROM Doctors WHERE AdminID='{$_SESSION['ID']}' ORDER BY AppntmntNo DESC";
    $result = $db->query($sql);

     if ($result->num_rows > 0) {
       $i=0;
      while($row = $result->fetch_assoc()) 
        {
        echo "<div class=doc1>";
        echo "<h3 style='margin-left:10px;'><b>".$row["DoctorID"].".".$row["Name"]."</b>";
        echo "</div>";
        $i++;
        if($i==5){
          break;
        }
        }
        } 
     else 
        {
        echo "<div class=t1doc>";
        echo "<h3 style='margin-left:10px;'><b>You haven't added any doctors yet</b>";
        echo "</div>";
        }
?>
   </div>
</div>
</div>
</body>
</html>