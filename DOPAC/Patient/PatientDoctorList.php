<!DOCTYPE html>
<?php
session_start();
include "DBconnect.php";
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>DOPAC</title>
    <link rel="stylesheet" href="PatientDoctorListStyle.css">
</head>
<body>
<div class=titlebar>
     <div class=dropdown>
       <button class=dropbtn><b>Location</b></button>
       <div class=dropdown-content>
         <a href="#">Thiruvananthapuram</a>
         <a href="#">Kollam</a>
         <a href="#">Pathanamthitta</a>
         <a href="#">Alappuzha</a>
         <a href="#">Kottayam</a>
         <a href="#">Idukki</a>
         <a href="#">Ernakulam</a>
         <a href="#">Palakkad</a>
         <a href="#">Thrissur</a>
         <a href="#">Malappuram</a>
         <a href="#">Wayanad</a>
         <a href="#">Kozhikod</a>
         <a href="#">Kannur</a>
         <a href="#">Kasaragod</a>

       </div>
</div>
       <!-- <div style="position:relative; left:500px;bottom:20px" class="general_search">
        <form method="post" action="searchresult.php"> 
        <input type="text" placeholder="Enter Doctor/Hospital name" name="searchvalue">
        <input type="submit" value="Search" name="search">
        </form> 
        </div> -->
  <div class=navbar><b>
   <a href="PatientHomeLogged.php">Home</a>
   <a href="PatientHospitalList.php">Hospitals</a>
   <a href="AboutUs.php">About us</a></b>
   </div>
<div class=topdoctors>
<h1 style="margin-bottom:10px">All Doctors</h1>
<?php
    $sql = "SELECT DoctorID,Name FROM Doctors";
    $result = $db->query($sql);

    if ($result->num_rows > 0) 
     {
     while($row = $result->fetch_assoc()) 
      {
       /*echo '<div class=t1doc>';
       echo "<h3 style='margin-left:10px;'><b>".$row["Name"]."</b>";
       echo '</div>';*/
       echo "<div class='t1doc'><form action='senddctrID.php' method='post'>";
       echo "<h3 style='margin-left:10px;'><b>".$row["DoctorID"].".".$row["Name"]."</b>";
       echo "<input type='hidden' name='chk' value='".$row["DoctorID"]."'>";
       echo "<button type='submit' name='dctview' class='dctrbook'>BOOK</button></form></div>";
      }
     }
else 
     {
      echo "0 results";
     }
?>
</div>
<div class=footer>
<h1>CONTACT US</h1><br>
<p>Call us:XXXX XXXX XX<br>E-mail us:abcd@gmail.com</p>
<p id="complaint"><a href="">Register a complaint</a></p>
<p id="adminreg"><b><a href="">Click here to register as a hospital</a></b><p>
</div>
</body>
</html>
</body>
</html>