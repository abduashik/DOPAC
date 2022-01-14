<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="PatientSignupStyle.css">
    <title>Sign Up to DOPAC</title>
</head>
<body>
<?php
include "DBconnect.php";
if(isset($_POST["register"]))
{
	$name = $_POST['Name'];
        $contactnum = $_POST['Contactnum'];
        $address = $_POST['address'];
        $email = $_POST['patientemail'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $password = $_POST['pass'];
        $sql = "INSERT INTO patients(Name, ContactNumber, Address, Email, Age, Gender, Password) VALUES('$name','$contactnum','$address','$email','$age','$gender','$password')";

	if($db->query($sql))
	{
		echo "<script>window.open('DopacLogin.php','_self')</script>";
	}
	else{
		echo "fail";
	}
}
?>
<div class=signupbox>
<h1><b>Sign Up<b></h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
<div class=name>
<p style="font-size:20px;margin:0px 40px 5px">Enter your Name</p><br>
<input type="text" name="Name" placeholder="Name"  required style="z-index:1000"><br>
</div>
<div class=cnum>
<p style="font-size:20px;margin:10px 40px 0px">Enter contact Number</p><br>
<input type="number" name="Contactnum" placeholder="Number" required><br>
</div>
<div class=address>
<p style="font-size:20px;margin:10px 40px 5px">Enter your Address</p><br>
<textarea name="address" rows="4" cols="50"></textarea>
</div>
<div class=email>
<p style="width:300px;margin:-408px 410px 22px;font-size:20px;" ><b>Enter your E-mail</b></p>
<input type="email" name="patientemail" value="Enter@gmail.com"  required><br>
</div>
<div class=age>
<p style="width:300px;font-size:20px;margin:30px 410px 0px">Enter your Age</p><br>
<input type="number" name="age" value="0"  required><br>
</div>
<div class=gender>
 <p style="font-size:20px;width:300px;margin:-73px 10px 5px">Select your gender</p>
  <input type="radio" id="Male" name="gender" value="male">
  <label for="male">Male</label><br>
  <input type="radio" id="Female" name="gender" value="female">
  <label for="female">Female</label><br>
  <input type="radio" id="Others" name="gender" value="Others">
  <label for="Others">Others</label>
</div>
<div class=pswrd>
<p style="width:300px;font-size:20px;margin:30px 410px 4px">Enter your Password </p><br>
<input type="password" name="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required /><br>
</div>
<div class=repswrd>
<p style="width:300px;font-size:20px;margin:20px 410px 5px">Re-enter your Password</p><br>
<input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"  required><br>
</div>
<input type="submit" value="Sign Up" name="register">
</form>
<p id="Login" style="width:350px;margin:-560px 450px 5px;font-size:20px">Already Registered? <a href="DopacLogin.php" style="color:blue;text-decoration:none;">Sign In Now!</a><p>
</div>
</body>
</html>