<?php
include "DBconnect.php";
session_start();
?>
<html>
  <head>
    <title>Doctors List</title>
    <link rel="Stylesheet" href="DoctorView.css">
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
            <input type="text" placeholder="Enter Doctor/Hospital name">
        <input type="submit" value="Search">
  </div>
  <div class=navbar><b>
  <a href="PatientDoctorList.php">Doctors</a>
   <a href="PatientHospitalList.php">Hospitals</a>
   <a href="about.asp">About us</a></b>
   <form action="" method="post">
   <input class="signupbtn" type="submit" value="Log Out" name="logout">
   </form>
   <?php
if(isset($_POST["logout"]))
{
   session_destroy();
   echo "<script>window.open('PatientHome.php','_self')</script>";
}
?>
 </div>
 <div style="height:500px;">
        <?php 
        $_SESSION["hospitalId"]=$_GET['id'];
        $sql="SELECT * FROM Doctors WHERE AdminID='{$_SESSION['hospitalId']}'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
              echo "<div class='t1doc'><form action='senddctrID.php' method='post'>";
       echo "<h3 style='margin-left:10px;'><b>".$row["DoctorID"].".".$row["Name"]."</b>";
       echo "<input type='hidden' name='chk' value='".$row["DoctorID"]."'>";
       echo "<button type='submit' name='dctview' class='dctrbook'>BOOK</button></form></div>";
            }
          } else {
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

