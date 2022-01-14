<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>DOPAC</title>
    <link rel="stylesheet" href="PatientHomeStyle.css">
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
   <a href="default.asp">Doctors</a>
   <a href="news.asp">Hospitals</a>
   <a href="about.asp">About us</a></b>
   <a class=signinbtn href="DopacLogin.php">Sign In</a>
   <a class=signupbtn href="PatientSignUp.php">Sign Up</a>
 </div>
<div class=doctoravailibiltysearch>
     <img src="Searchavailablebg.jpg" alt = "BG" ></img>
     <div class=doctoravailibiltysearchbox>
     <form action="">
     <div class=head>
    <h1 style="margin-left:10px">Search Doctor</h1>
    </div>
    <div class=form1>
    <label for="department" style="margin-left:10px"><b>Select department</b></label><br>
    <select name:"Department" style="margin-left:15px;margin-top:5px;margin-bottom:5px">
     <option value="1">Orthology</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
    </select><br>
    <label for="hospitals" style="margin-left:10px"><b>Select hospitals</b></label><br>
     <select name:"Hospital" style="margin-left:15px;margin-top:5px;margin-bottom:2px;">
      <option value="1">Bharath Hospital,Kottayam</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select><br><br>
    <label for="Date" class=datelabel style="margin-left:10px;margin-bottom:20px"><b>Select Date</b></label>
    <input type="Date" placeholder="calender" name="date1" id="date1" style="margin-top:0px;margin-left:0px" required><br>
    <button type="submit" class="registerbtn">Search</button>
</form></div> 
</div>
 </div>
<div class=topdoctors>
<h1 style="margin-bottom:10px">Top Doctors</h1>
<div class=t1doc><h1 style="margin-left:10px;"<b>1</b></h1></div>
<div class=t2doc><h1 style="margin-left:10px;"<b>2</b></h1></div>
<div class=t3doc><h1 style="margin-left:10px;"<b>3</b></h1></div>
<div class=t4doc><h1 style="margin-left:10px;"<b>4</b></h1></div>
<div class=t5doc><h1 style="margin-left:10px;"<b>5</b></h1></div>
</div>
<hr>
<div class=tophospitals>
   <h1 style="margin-left:20px;">Top Hospitals</h1>
   <div class=hospital1><b>1</b></div>
   <div class=hospital2><b>2</b></div>
   <div class=hospital3><b>3</b></div>
   <div class=hospital4><b>4</b></div>
   <div class=hospital5><b>5</b></div>
</div>
<div class=footer>
<h1>CONTACT US</h1><br>
<p>Call us:XXXX XXXX XX<br>E-mail us:abcd@gmail.com</p>
<p id="complaint"><a href="">Register a complaint</a></p>
<p id="adminreg"><b><a href="">Click here to register as a hospital</a></b><p>
</div>
</body>
</html>