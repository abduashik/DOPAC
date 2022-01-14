<!DOCTYPE html>

<?php
include "DBconnect.php";
session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>All Doctors</title>
    <link rel="stylesheet" href="AdminHomeDoctorsStyle.css">
</head>
<body>
<?php
if(isset($_POST["addbtn"]))    
 {  
   $name=$_POST['name']; 
   $email=$_POST['email'];
   $password=$_POST['psw'];
   $adminid=$_SESSION['ID'];
   $cnum="Not entered";
   $quali="Not entered";
   $spec="Not entered";
   $dept="Not entered";
   $sql="INSERT INTO Doctors(Name,ContactNum,Email,Qualification,Specialization,Experience,Password,AdminID) VALUES('$name','$cnum','$email','$quali','$spec','$dept','$password','$adminid')";
   if($db->query($sql))
     {
      echo "done";
     }
     else
     {
      echo "failed";
     }
  }
?>
<div class=container-fluid>
<ul>
  <center><h2 style="margin-bottom:0px;">DOPAC</h2></center><br>
  <center><h6 style="margin-top:-17px;">ADMIN</h6></center>
  <center><p style="margin-bottom:0px;">MENU</p></center>
  <hr>
  <li><center><a href="AdminHome.php">Home</a></center></li>
  <li><center><a class="active" href="AdminHomeDoctors.php">Doctors</a></center></li>
  <li><center><a href="AdminHomeAppnts.php">Appointments</a></center></li>
  <!-- <li><center><a href="AdminHomeDepts.php">Departments</a></center></li> -->
  <li><center><a href="#feedback">Pateint Feedbacks</a></center></li>
  <li><center><a href="AdminHomeProfile.php">Profile</a></center></li>
</ul>
</div>
 <div class=topdoctors>
<button id="adddctrbtn" onclick="openForm()">Add Doctors</button>
<h1 style="margin-bottom:10px;margin-left:20px;">All Doctors</h1>
<?php
$sql = "SELECT DoctorID,Name FROM Doctors WHERE AdminID='{$_SESSION['ID']}'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $docID = $row["DoctorID"];
    echo "<div class='t1doc'><form action='".$_SERVER["PHP_SELF"]."' method='post'>";
    echo "<h3 style='margin-left:10px;'><b>".$row["DoctorID"].".".$row["Name"]."</b>";
    echo "<input type='hidden' name='chk' value='".$row["DoctorID"]."'>";
    echo "<button type='submit' name='dctview' class='dctrbook'>Delete</button></form></div>";
  }
} else {
    echo '<div class=t1doc>';
    echo "<h3 style='margin-left:10px;'><b>You haven't added any doctors yet</b>";
    echo "</div>";
}
?>
</div>
</div>
<div class="form-popup" id="myForm">
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-container">
    <h2>Enter Doctor Details</h2>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <input type="submit" class="btn" value="ADD" name="addbtn">
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<?php
if(isset($_POST["dctview"]))
{
	$sql1="DELETE FROM Doctors WHERE DoctorID='$docID'";
	$res1=$db->query($sql1);
	if($res1)
	{
		echo "success";
	}
	else
	{
		echo "INVALID USERNAME or PASSWORD";
	}
}
?>

</body>
</html>