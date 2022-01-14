<?php
include "DBconnect.php";
session_start();
?>
<html>
    <head>
        <title>Doctor Home</title>
        <link rel="stylesheet" href="DoctorApmntsStyle.css">
    </head>
<body>
<div class=titlebar><b>
    <a href="DoctorHome.php">Home</a>
    <a class=signinbtn href="DoctorProfile.php">Profile</a>
    </div>
<h1 style="margin-bottom:0px;margin-left:10px;">Appointments</h1>
<?php
$sql = "SELECT * FROM Appointments WHERE DoctorID='{$_SESSION['ID']}'";
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
</body>
</html>