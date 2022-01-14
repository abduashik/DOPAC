<!DOCTYPE html>
<?php
include "DBconnect.php";
session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>DOPAC</title>
    <link rel="stylesheet" href="PatientHomeLoggedStyle.css">
</head>
<body>
<?php
if(isset($_POST["logout"]))
{
   session_destroy();
   echo "<script>window.open('PatientHome.php','_self')</script>";
}
?>
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
</div>
<div style="position:relative; left:500px;bottom:20px" class="general_search">
          <form method="post" action="searchresult.php"> 
        <input type="text" placeholder="Enter Doctor/Hospital name" name="searchvalue">
        <input type="submit" value="Search" name="search">
        </form>
</div>
        
       
        
  
  <div class=navbar><b>
   <a href="PatientDoctorList.php">Doctors</a>
   <a href="PatientHospitalList.php">Hospitals</a>
   <a href="AboutUs.php">About us</a></b>
   <a class=signinbtn href="PatientProfile.php"><?php echo $_SESSION["USERNAME"]; ?></a>
   <form action="" method="post">
   <input class="signupbtn" type="submit" value="Log Out" name="logout">
   </form>
 </div>
<div class=doctoravailibiltysearch>
     <img src="Searchavailablebg.jpg" alt = "BG" ></img>
     <div class=doctoravailibiltysearchbox>
     <form action="">
     <div class=head>
    <center><h1 style="margin-left:10px;margin-bottom:2px;">Welcome</h1><br></center>
    <h2 style="margin-left:25px;margin-top:-10px;margin-bottom:0px;">Find your favourite doctor</h2>
    </div>
    <div class=form1>
    <label for="hospitals" style="margin-left:20px;font-size:18px;"><b>Select hospitals:</b></label>
    <select form="mainsearch" name="Hospital" style="margin-left:15px;margin-top:-15px;margin-bottom:2px;">
    <?php
    $sql1 = "SELECT * FROM Hospitals";
    $result1 = $db->query($sql1);

    if ($result1->num_rows > 0) 
     {
     while($row1 = $result1->fetch_assoc()) 
      {
       ?>
       <option><?php echo $row1["Name"]; ?></option>
       <?php
      }
     }
else 
     {
      ?>
       <option><?php echo "No Hospitals"; ?></option>
       <?php
     }

?>
</select>
    <form method="post" action="searchresult.php" id="mainsearch">
    <label for="Date" class=datelabel style="margin-left:10px;margin-bottom:10px"><b>Select Date: </b></label>
    <input type="Date" placeholder="calender" name="date1" id="date1" style="margin-top:0px;margin-left:0px;height:38px;border: 2px;" required><br>
    <input type="submit" value="Search" name="homesearch" class="registerbtn">
</form></div> 
</div>
 </div>
<div class=topdoctors>
<h1 style="margin-bottom:10px">Top Doctors</h1>
<?php
    $sql = "SELECT DoctorID,Name FROM Doctors";
    $result = $db->query($sql);

    if ($result->num_rows > 0) 
     {
       $i=0;
     while($row = $result->fetch_assoc()) 
      {
       echo "<div class='t1doc'><form action='senddctrID.php' method='post'>";
       echo "<h3 style='margin-left:10px;'><b>".$row["DoctorID"].".".$row["Name"]."</b>";
       echo "<input type='hidden' name='chk' value='".$row["DoctorID"]."'>";
       echo "<button type='submit' name='dctview' class='dctrbook'>BOOK</button></form></div>";
       $i++;
       if($i==5)
       {
         break;
       }
      }
     }
else 
     {
      echo "0 results";
     }
?>
</div>
<hr>
<div class=tophospitals>
   <div class=tophospitals>
   <h1 style="margin-left:20px;margin-bottom:50px;">Top Hospitals</h1>
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
       $i++;
       if($i==5)
       {
         break;
       }
      }
     }
else 
     {
      echo "0 results";
     }
?>
</div>
</div>
<div class=footer>
<h1>CONTACT US</h1><br>
<p>Call us:XXXX XXXX XX<br>E-mail us:abcd@gmail.com</p>
<p id="complaint"><a href="">Register a complaint</a></p>
<p id="adminreg"><b><a href="">Click here to register as a hospital</a></b><p>
</div>
</body>
</html>