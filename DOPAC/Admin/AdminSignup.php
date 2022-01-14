<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="AdminSignupStyle.css">
    <title>Admin Register</title>
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
        $sql = "INSERT INTO Hospitals(Name, ContactNum, DistrictName, Email, LicenseNumber, adminname, adminemail, password) VALUES('$name','$contactnum','$location','$email','$licensenum','$adminname', '$adminemail', '$password')"; 
        $table="select * from Hospitals";
        $res=$db->query($table);
	    if($res->num_rows>0)
	    {
		$ro=$res->fetch_assoc();
		$_SESSION["ID"]=$ro["HospitalID"];
		$_SESSION["USERNAME"]=$ro["Name"];
		$_SESSION["HOSPITALCNUM"]=$ro["ContactNum"];
		$_SESSION["LOCATION"]=$ro["DistrictName"];
		$_SESSION["HOSPITALEMAIL"]=$ro["Email"];
		$_SESSION["LICENSENUM"]=$ro["LicenseNumber"];
		$_SESSION["ADMINNAME"]=$ro["adminname"];
		$_SESSION["ADMINEMAIL"]=$ro["adminemail"];
	    }
		if($db->query($sql))
	    {
		echo "<script>window.open('AdminHome.php','_self')</script>";
	    }
} 
?>
<div class=signupbox>
<h1><b>Sign Up<b></h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
<h3 style="margin-left:10px;"><b>Enter Hospital Details</b></h3>
<div class=name>
<label for="Name" style="margin-left: 10px;">Enter Name</label><br>
<input type="text" name="Name" ><br>
</div>
<div class=cnum>
<label for="cnum" style="margin-left:10px;">Enter Contact Number</label><br>
<input type="number" name="cnum" ><br>
</div>
<div class=district>
<label for="dname" style="margin-left:410px;margin-bottom: 5px;">Enter District Name</label><br>
<input type="text" name="dname" ><br>
</div>
<div class=lnum>
<label for="lnum" style="margin-left:410px;margin-bottom: 5px;">Enter License Number</label><br>
<input type="text" name="lnum" ><br>
</div>
<h3><b>Enter Admin Details</b></h3>
<div class=adminname>
<label for="adminname">Enter Name</label><br>
<input type="text" name="adminname" ><br>
</div>
<div class=adminemail>
 <label for="adminemail">Enter email</label><br>
<input type="email" name="adminemail" ><br>
</div>
<div class=pswrd>
<p style="width:300px;font-size:20px;margin:30px 410px 4px">Enter your Password </p><br>
<input type="password" name="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required /><br>
</div>
<div class=repswrd>
<p style="width:300px;font-size:20px;margin:20px 410px 5px">Re-enter your Password</p><br>
<input type="password" name="pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"  required><br>
</div>
<input type="submit" value="Sign Up" name="register">
</form>
<p id="Login" style="width:350px;margin:-800px 450px 5px;font-size:20px">Already Registered? <a href="DopacLogin.php" style="color:blue;text-decoration:none;">Sign In Now!</a><p>
</div>
</body>
</html>