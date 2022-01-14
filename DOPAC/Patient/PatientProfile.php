<!DOCTYPE html>
<?php
include "DBconnect.php";
session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <link rel="stylesheet" href="PatientProfileStyle.css">
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
         <!-- <form method="post" action="">
        <input type="text" placeholder="Enter Doctor/Hospital name" name="searchvalue">
        <input type="submit" value="Search" name="search">
         </form> -->
       
  </div>
  <div class=navbar><b>
   <a href="PatientDoctorList.php">Doctors</a>
   <a href="PatientHospitalList.php">Hospitals</a>
   <a href="AboutUs.php">About us</a></b>
   <form action="" method="post">
   <input class="signupbtn" type="submit" value="Log Out" name="logout">
   </form>
 </div>
<?php

if(isset($_POST['imgsubmit']))
{
  
	$file=$_FILES['imgupload'];
	$img_name=$_FILES['imgupload']['name'];
	$tmp_name=$_FILES['imgupload']['tmp_name'];
	$filerror=$_FILES['imgupload']['error'];
	$filetype=$_FILES['imgupload']['type'];
	
	$file_ext=explode('.',$img_name);
	$fileac=strtolower(end($file_ext));
	$allowed=array('jpg','jpeg', 'png','jfif');
		if(in_array($fileac,$allowed))
		{
			if($filerror==0)
			{
				$new_img_name = uniqid('', true). '.'.$fileac;
				$img_upload_path = 'patient_uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
        $sqlimage="insert into images(HospitalsID,ProPic) values('{$_SESSION['ID']}','$new_img_name')";
        if($sqlimage=$db->query($sqlimage))
        {
          echo "success";
        }   
        else{
          echo "failed";
        }
      }
        else{
          echo "error";

        }
      }
        else{
          echo "allowed error";
        }

    
  }
        
        ?>
<?php
if(isset($_POST["logout"]))
{
   session_destroy();
   echo "<script>window.open('DopacLogin.php','_self')</script>";
}
if(isset($_POST["addbtn"]))
{
$sql = "SELECT * FROM Hospitals WHERE HospitalID='{$_SESSION['ID']}'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $row["adminname"] = $_POST["name"];
      $row["adminemail"] = $_POST["email"];
  }
}
}
if(isset($_POST["addbtn1"]))
{
   session_destroy();
   echo "<script>window.open('DopacLogin.php','_self')</script>";
}
?>
 <div class=profile>
<h1 style="margin-bottom:10px;margin-top:10px;">Profile</h1>
<div class=displaypicture>
  <?php
  $sqlim="select * from images where HospitalsID='{$_SESSION['ID']}' order by SI DESC";
  $res=$db->query($sqlim);
  if($res->num_rows>0)
  {
      $roi=$res->fetch_assoc();
      ?>
      <img src="patient_uploads/<?=$roi['ProPic']?>" height="200px" width="200px">
  <?php
  }

  ?>
<form name="imageupload" action="" method="post" enctype="multipart/form-data">
<input type="file" name="imgupload" class="img_uploads">
<input type="submit" name="imgsubmit" value="Upload" class="img_upld_btn">
</form>
</div>
<div class=admininfo>
<h1><center>Details</center></h1>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Name<br><?php echo $_SESSION["USERNAME"]; ?><b></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Email<br><b><?php echo $_SESSION["EMAIL"]; ?></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Contact Number<br><b><?php echo $_SESSION["CNUM"]; ?></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Address<br><b><?php echo $_SESSION["ADDRESS"]; ?></b></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Age<br><b><?php echo $_SESSION["AGE"]; ?></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Gender<br><b><?php echo $_SESSION["GENDER"]; ?></b></p>
<button class=editdetails onclick="openForm1()">Edit Details</button>
<form name="logoutform" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>"> 
<input type="submit" value="logout" name="logout" class="logout">
</form>
</div>
<!-- Pop up for change details -->
<div class="form-popup1" id="myForm1">
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-container1">
    <h2>Edit Details</h2>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Address</b></label>
    <input type="text" placeholder="Enter Location" name="psw" required>

    <label for="psw"><b>Contact No</b></label>
    <input type="number" placeholder="Enter Number" name="psw" required>

    <input type="submit" class="btn" value="ADD" name="addbtn1">
    <button type="button" class="btn cancel" onclick="closeForm1()">Close</button>
  </form>
</div>
<script>
function openForm1() {
  document.getElementById("myForm1").style.display = "block";
}

function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}
</script>
<!-- Pop up for change details end -->
<div class="appointments">
  <h2 style="margin:20px;"> Booked Appointments</h2>
<?php 
$sql = "SELECT * FROM Appointments WHERE PatientID='{$_SESSION['ID']}'";
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