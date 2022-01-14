<!DOCTYPE html>
<?php
include "DBconnect.php";
session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>All Appointments</title>
    <link rel="stylesheet" href="AdminHomeAppntsStyle.css">
</head>
<body>
<div class=container-fluid>
<ul>
  <center><h2 style="margin-bottom:0px;">DOPAC</h2></center><br>
  <center><h6 style="margin-top:-17px;">ADMIN</h6></center>
  <center><p style="margin-bottom:0px;">MENU</p></center>
  <hr>
  <li><center><a href="AdminHome.php">Home</a></center></li>
  <li><center><a href="AdminHomeDoctors.php">Doctors</a></center></li>
  <li><center><a class="active"  href="AdminHomeAppnts.php">Appointments</a></center></li>
  <!-- <li><center><a href="AdminHomeDepts.php">Departments</a></center></li> -->
  <li><center><a href="#feedback">Pateint Feedbacks</a></center></li>
  <li><center><a href="AdminHomeProfile.php">Profile</a></center></li>
</ul>
 <div class=topdoctors>
<h1 style="margin-bottom:10px">Appointments</h1>
<?php
$sql = "SELECT * FROM Appointments WHERE AdminID='{$_SESSION['ID']}'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $sql1 = "SELECT * FROM Doctors WHERE DoctorID='{$row['DoctorID']}'";
    $result1 = $db->query($sql1);

    if ($result1->num_rows > 0) {
        while($row1 = $result1->fetch_assoc()) {
        $sql2 = "SELECT * FROM Patients WHERE PatientID='{$row['PatientID']}'";
        $result2 = $db->query($sql2);

        if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
    echo '<div class=t1doc>';
    echo "<h6 style='margin-left:10px;'><b>Patient Name:".$row2['Name']."<br>Doctor Name:".$row1['Name']."<br>Time:".$row['Start_time']."to".$row['End_time'].".<br>Date:".$row['Date']."</b></h6>";
    echo '</div>';
  }}}}}}
else {
    echo '<div class=t1doc>';
    echo "<h3 style='margin-left:10px;'><b>You have no appointments</b>";
    echo "</div>";
}
?>
</div>
</body>
</html>