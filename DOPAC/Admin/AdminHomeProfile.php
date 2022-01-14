<!DOCTYPE html>
<?php
include "DBconnect.php";
session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <link rel="stylesheet" href="AdminHomeProfileStyle.css">
</head>
<body>
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
				$img_upload_path = 'admin_uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
        $sqlimage="insert into images(HospitalsID,ProPic) values('{$_SESSION['ID']}','$new_img_name')";
        if($sqlimage=$db->query($sqlimage))
        {
        }   
        else{
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
<div class=container-fluid>
<ul>
  <center><h2 style="margin-bottom:0px;">DOPAC</h2></center><br>
  <center><h6 style="margin-top:-17px;">ADMIN</h6></center>
  <center><p style="margin-bottom:0px;">MENU</p></center>
  <hr>
  <li><center><a href="AdminHome.php">Home</a></center></li>
  <li><center><a href="AdminHomeDoctors.php">Doctors</a></center></li>
  <li><center><a href="AdminHomeAppnts.php">Appointments</a></center></li>
  <!-- <li><center><a href="AdminHomeDepts.php">Departments</a></center></li> -->
  <li><center><a href="#feedback">Pateint Feedbacks</a></center></li>
  <li><center><a class="active" href="AdminHomeProfile.php">Profile</a></center></li>
</ul>
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
      <img src="admin_uploads/<?=$roi['ProPic']?>" height="200px" width="200px">
  <?php
  }

  ?>
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
<form name="imageupload" action="" method="post" enctype="multipart/form-data">
<input type="file" name="imgupload" class="img_uploads">
<input type="submit" name="imgsubmit" value="Upload" class="img_upld_btn">
</form>
</div>
<div class=details>
<h1><center><b>Admin</center></b></h1>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Name<br><b><?php echo $_SESSION["ADMINNAME"];?></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Email<br><b><?php echo $_SESSION["ADMINEMAIL"];?></b></p>
</div>
<div class=admininfo>
<h1><center>Details</center></h1>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Name<br><b><?php echo $_SESSION["USERNAME"];?></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Location<br><b><?php echo $_SESSION["LOCATION"];?></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">E-mail<br><b><?php echo $_SESSION["HOSPITALEMAIL"];?></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Conatct no<br><b><?php echo $_SESSION["HOSPITALCNUM"];?></b></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Number of doctors<br><b><?php echo $i; ?></b></p>
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

    <label for="psw"><b>Location</b></label>
    <input type="text" placeholder="Enter Location" name="psw" required>

    <label for="psw"><b>Contact No</b></label>
    <input type="number" placeholder="Enter Number" name="psw" required>

    <input type="submit" class="btn" value="Change" name="addbtn1">
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
</body>
</html>