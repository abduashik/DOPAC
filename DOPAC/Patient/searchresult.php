
<!DOCTYPE html>
<?php
include "DBconnect.php";
session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>DOPAC</title>
    <link rel="stylesheet" href="searchresultStyle.css">
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
  </div>
  <div class=navbar><b>
   <a href="PatientHomeLogged.php">Home</a>
   <a href="PatientDoctorList.php">Doctors</a>
   <a href="AboutUs.php">About us</a></b>
   </div>

<?php
if(isset($_POST["search"]))
            {
              $searchvalue=$_POST["searchvalue"];
              $sq="SELECT * FROM Doctors WHERE Name like '$searchvalue'";
              $re=$db->query($sq);
              if($re->num_rows>0)
              {
                 ?>
                   <div class=topdoctors>
                  <h1>Found doctor(s)</h1>
                    <?php 

                  while($ro=$re->fetch_assoc())
                  {
                     
                    echo '<div class=t1doc>';
                    echo "<h3 style='margin-left:10px;'><b>".$ro["Name"]."</b>";
                    echo '</div>';?>
                      
                      
                 <?php
                  }
                  ?>

                </div>
                <?php 
                }
                else{
                  $sq2="select * FROM Hospitals WHERE Name like '$searchvalue'";
                  $re2=$db->query($sq2);
                  if($re2->num_rows>0)
                  {
                    ?>
                    <div class=tophospitals>
                    <h1 style="margin-left:20px;">Found hospital(s)</h1><?php
                  while($ro2=$re2->fetch_assoc())
                  {
                    ?>
                      <?php 
                      echo '<div class=hospital1 >';
                      echo "<center><div class='hospital-text' style='margin-bottm:0px;' >
                            <h1><b>".$ro2["Name"]."</b></h1><br>
                            <a href='PatientDoctorView.php?id=".$ro2["HospitalID"]."'><button style='margin-bottom:10px;cursor:pointer;'>VIEW</button></a>
                            </div></center>";
                      echo '</div>';
       ?>         </div>
                 <?php     
                  }

                  }
                  else{?>
                    <div class=topdoctors>
                  <?php
                    echo '<div class=t1doc>';
                    echo "<h3 style='margin-left:10px;'><b>No results found</b>";
                    echo '</div>';
                  }
                }
              }           
?>
</div>
</div>
<!-- Main search -->
<?php
if(isset($_POST["homesearch"]))
            {
              $hospitalname =$_POST["Hospital"];
              $date = $_POST["date1"];
              $sqmain="SELECT * FROM Hospitals WHERE Name ='$hospitalname'";
              $remain=$db->query($sqmain);
              if($remain->num_rows>0)
              {
                 while($romain=$remain->fetch_assoc())          
                  {
                    $HospID= $romain["AdminID"];
                  }
                  $sqmain2="select * FROM Appointments WHERE AdminID like '$HospID' AND Date like '$date'";
                  $remain2=$db->query($sqmain2);
                  if($remain2->num_rows>0)
                  {
                  while($romain2=$remain2->fetch_assoc())
                  {
                    echo '<div class=t1doc>';
                    echo "<h6 style='margin-left:10px;'><b>Patient Name:".$romain2['DoctorID']."<br>Doctor Name:".$romain2['DoctorID']."<br>Time:".$romain2['Start_time']."to".$romain2['End_time'].".<br>Date:".$romian2['Date']."</b></h6>";
                    echo '</div>';
       ?>         </div>
                 <?php     
                  }

                  }
                }
              }           
?>





<div class=footer>
<h1>CONTACT US</h1><br>
<p>Call us:XXXX XXXX XX<br>E-mail us:abcd@gmail.com</p>
<p id="complaint"><a href="">Register a complaint</a></p>
<p id="adminreg"><b><a href="">Click here to register as a hospital</a></b></p>
</div>
</body>
</html>