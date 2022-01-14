<!DOCTYPE html>

<?php
include "DBconnect.php";
session_start();
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="DoctorLoginStyle.css">
    <title>Sign In to DOPAC</title>
</head>
<body>
<?php
if(isset($_POST["login"]))
{
	$sql="select * from Doctors where Email='{$_POST["email"]}' and Password='{$_POST["Pass"]}'";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{
		$ro=$res->fetch_assoc();
		$_SESSION["ID"]=$ro["DoctorID"];
		$_SESSION["USERNAME"]=$ro["Name"];
		$_SESSION["EMAIL"]=$ro["Email"];
		$_SESSION["CNUM"]=$ro["ContactNum"];
		$_SESSION["QUALI"]=$ro["Qualification"];
		$_SESSION["SPECIALY"]=$ro["Specialization"];
		$_SESSION["DEPT"]=$ro["Experience"];
		$_SESSION["ADMINID"]=$ro["AdminID"];
		echo "<script>window.open('DoctorHome.php','_self')</script>";
	}
	else
	{
		echo "INVALID USERNAME or PASSWORD";
	}
}
?>
<div class=signinbox>
<h1><b>Sign In(Doctor)<b></h1><hr>
<form name="signinform" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<p style="font-size:30px;margin:10px 20px 0px">Enter your E-mail</p><br>
<input type="email" name="email" placeholder="Enter your E-mail here"  required class="input1"><br>
<p style="font-size:30px;margin:10px 20px 0px">Enter your password</p><br>
<input type="password" name="Pass" placeholder="Enter password" required class="input2"><br>
<input type="submit" name="login" value="Sign in" class="signin_btn">
</form>
<p style="margin-left:10px;"><a href="" style="color:blue;text-decoration:none">Forgot password? </a><p>
<!-- <p id="registernow" style="margin-left:10px;font-size:20px">Not yet registered? <a href="AdminRegistration.php" style="color:blue;text-decoration:none;">Register Now!</a><p> -->
</div>
</body>
</html>