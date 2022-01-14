<!DOCTYPE html>
<?php
include "DBconnect.php";
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>DOPAC</title>
    <link rel="stylesheet" href="PatientHospitalListStyle.css">
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
            <!-- <input type="text" placeholder="Enter Doctor/Hospital name">
        <input type="submit" value="Search"> -->
  </div>
  <div class=navbar><b>
   <a href="PatientHomeLogged.php">Home</a>
   <a href="PatientDoctorList.php">Doctors</a>
   <a href="AboutUs.php">About us</a></b>
   </div>
<div class=tophospitals>
   <h1 style="margin-left:20px;">All Hospitals</h1>
   <?php
    $sql = "SELECT * FROM Hospitals";
    $result = $db->query($sql);

    if ($result->num_rows > 0) 
     {
      $i=0;
     while($row = $result->fetch_assoc()) 
      {
       echo '<div class=hospital1 >';
       echo "<center><div class='hospital-text' style='margin-bottm:0px;' >
             <h1><b>".$row["Name"]."</b></h1><br>
             <a href='PatientDoctorView.php?id=".$row["HospitalID"]."'><button style='margin-bottom:10px;cursor:pointer;'>VIEW</button></a>
             </div></center>";
       echo '</div>';
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
<p id="adminreg"><b><a href="">Click here to register as a hospital</a></b></p>
</div>
</body>
</html>