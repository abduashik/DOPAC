<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Admin Regitser</title>
    <link rel="stylesheet" href="AdminRegistrationStyle.css">
</head>
<body>
<?php
include "DBconnect.php";
session_start();
if(isset($_POST["register"]))
{
	    $name = $_POST['Name'];
        $contactnum = $_POST['cnum'];
        $location = $_POST['dname'];
        $email = $_POST['email'];
        $licensenum = $_POST['lnum'];
        $adminname = $_POST['adminname'];
        $adminemail = $_POST['adminemail'];
	    $password = $_POST['pass2'];
		$_SESSION["USERNAME"]=$_POST['Name'];
        $sql = "INSERT INTO Hospitals(Name, ContactNum, DistrictName, Email, LicenseNumber, adminname, adminemail, password) VALUES('$name','$contactnum','$location','$email','$licensenum','$adminname', '$adminemail', '$password')"; 
  
		if($db->query($sql))
	    {
		echo "<script>window.open('DopacLogin.php','_self')</script>";
	    }
} 
?>
<div class="registrationbox">
<h1><b>Hospital Registration</b></h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<div class="Name">
<label for="Name">Enter Name</label>
<input type="text" name="Name" required><br>
</div>
<div class="Cnum">
<label for="cnum">Enter Contact Number</label>
<input type="number" name="cnum" required><br>
</div>
<div class="dname">
<label for="dname">Enter District Name</label>
<input type="text" name="dname" required><br>
</div>
<div class="email">
<label for="email">Enter Email</label>
<input type="email" name="email" required><br>
</div>
<div class="Lnum">
<label for="lnum">Enter License Number</label>
<input type="text" name="lnum" required><br>
</div>
</div>
<div class="admin_reg_box">
<h1><b>Enter Admin Details</b></h1>
<div class="adminname">
<label for="adminname">Enter Name</label>
<input type="text" name="adminname" required><br>
</div>
<div class="adminemail">
<label for="adminemail">Enter email</label>
<input type="email" name="adminemail" required><br>
</div>
<div class="password1">
<label for="pass1">Enter password</label>
<input type="password" name="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
</div>
<div class="password2">
<label for="pass2">Enter password</label>
<input type="password" name="pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
</div>
<input type="submit" name="register" id="reg_btn" value="Register">
</div>
</form>
</body>
</html>