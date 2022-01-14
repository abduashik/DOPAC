<!DOCTYPE html>
<?php
include "DBconnect.php";
session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <link rel="stylesheet" href="DoctorProfileStyle.css">
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
				$img_upload_path = 'doctor_uploads/'.$new_img_name;
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
   echo "<script>window.open('DoctorLogin.php','_self')</script>";
}
/* if(isset($_POST["addbtn1"]))
{
   session_destroy();
   echo "<script>window.open('DopacLogin.php','_self')</script>";
}*/
?>
<div class=titlebar><b>
    <a href="DoctorApmnts.php">Appointments</a>
    <a class=signinbtn href="DoctorHome.php">Home</a>
    </div>
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
      <img src="doctor_uploads/<?=$roi['ProPic']?>" height="200px" width="200px">
  <?php
  }

  ?>
<form name="imageupload" action="" method="post" enctype="multipart/form-data">
<input type="file" name="imgupload" class="img_uploads">
<input type="submit" name="imgsubmit" value="Upload" class="img_upld_btn">
</form>
</div>
<div class=details>
<h1><center><b>Hospital Details</center></b></h1>
<?php 
$sql="SELECT * FROM Hospitals WHERE HospitalID= '{$_SESSION["ADMINID"]}'";
$res=$db->query($sql);
	if($res->num_rows>0)
	{
		$ro=$res->fetch_assoc();
    $_SESSION["HOSPITALNAME"]=$ro["Name"];
    $_SESSION["LOCATION"]=$ro["DistrictName"]; 
  }
?>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Name:<br><?php echo $_SESSION["HOSPITALNAME"]; ?><b></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Location:<br><?php echo $_SESSION["LOCATION"]; ?><b></b></p>
</div>
<div class=admininfo>
<h1><center>Personal info</center></h1>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Name<br><?php echo $_SESSION["USERNAME"]; ?><b></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">E-mail<br><?php echo $_SESSION["EMAIL"]; ?><b></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Contact No<br><?php echo $_SESSION["CNUM"]; ?><b></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Qualification<br><?php echo $_SESSION["QUALI"]; ?><b></b></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Specialization<br><?php echo $_SESSION["SPECIALY"]; ?><b></b></p>
<p style="margin-left:20px;margin-top:10px;font-size:20px">Experience<br><?php echo $_SESSION["DEPT"]; ?><b></b></p>
<button class=editdetails onclick="openForm1()">Edit Details</button>
<form name="logoutform" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>"> 
<input type="submit" value="logout" name="logout" class="logout">
</form>
</div>
<!-- Pop up for change details -->
<?php
if(isset($_POST["addbtn1"]))    
 {  
  $sql1="SELECT * FROM Doctors WHERE DoctorID= '{$_SESSION["ID"]}'";
  $res1=$db->query($sql1);
    if($res1->num_rows>0)
    {
   $cnum=$_POST['cnum']; 
   $quali=$_POST['quali'];
   $spec=$_POST['spec'];
   $dept=$_POST['dept'];
   $update="UPDATE Doctors SET ContactNum = '$cnum', Qualification = '$quali', Specialization = '$spec', Experience = '$dept' WHERE DoctorID = '{$_SESSION["ID"]}' ";
   if($db->query($update))
     {
      echo "done";
     }
     else
     {
      echo "failed";
     }
  }}
?>
<div class="form-popup1" id="myForm1">
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-container1">
    <h2>Edit Details</h2>
    <label for="cnum"><b>Contact No</b></label>
    <input type="text" placeholder="Enter Contact No" name="cnum" required>

    <label for="quali"><b>Qualification</b></label>
    <input type="text" placeholder="Enter Qualification" name="quali" required>

    <label for="spec"><b>Specialization</b></label>
    <input type="text" placeholder="Enter Specialization" name="spec" required>

    <label for="dept"><b>Experience</b></label> 
    <input type="text" placeholder="Enter Experrience" name="dept" required>

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
<div class=footer>
        <h1>CONTACT US</h1><br>
        <p>Call us:XXXX XXXX XX<br>E-mail us:abcd@gmail.com</p>
        <p id="complaint"><a href="">Register a complaint</a></p>
        <p id="adminreg"><b><a href="">Click here to register as a hospital</a></b><p>
</div>
</body>
</html>