<?php
include "DBconnect.php";
session_start();
$patientId=$_SESSION["ID"];
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>DOPAC</title>
    <link rel="stylesheet" href="PatientDoctorBookStyle.css">
</head>
<body>
<?php
if(isset($_POST["logout"]))
{
   session_destroy();
   echo "<script>window.open('PatientHome.php','_self')</script>";
}
?>
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
   <a href="PatientDoctorList.php">Doctors</a>
   <a href="PatientHospitalList.php">Hospitals</a>
   <a href="AboutUs.php">About us</a></b>
   <form action="" method="post">
   <input class="signupbtn" type="submit" value="Log Out" name="logout">
   </form>
 </div> 
 <h2 style="margin-bottom:0px;">Upcoming Time Schedules</h2> 
    <div style="height:500px;overflow:scroll;">
        <?php
          $sql="SELECT * FROM Doctors WHERE DoctorID='{$_SESSION['doctorDivId']}'";
          $res=$db->query($sql);
          if($res->num_rows>0)
          {
            $ro=$res->fetch_assoc();
            $doct=$ro["Name"];
            $doctorId=$ro["DoctorID"];
            $sq="SELECT * FROM TimeSchedule WHERE DoctorID='{$_SESSION['doctorDivId']}'";
            $re=$db->query($sq);
            if($re->num_rows>0)
            {
              while($rot=$re->fetch_assoc())
               {
               $st=$rot["Start_time"];
               $et=$rot["End_time"];
               $dt=$rot["Date"];
               ?>
               <div><?php
               echo '<div class=t1doc>';
               echo "<h6 style='margin-left:10px;'><b>Doctor Name:".$doct."<br>Time:".$st."to".$et.".<br>Date:".$dt."</b></h6>";
               echo "<form method='post' action=".$_SERVER["PHP_SELF"].">
               <input type='hidden' name='dctid' value=".$doctorId.">
               <input type='hidden' name='doct' value=".$doct.">
               <input type='hidden' name='st' value=".$st.">
               <input type='hidden' name='et' value=".$et.">
               <input type='hidden' name='dt' value=".$dt.">
               
               <input type='submit' class='bookapmnt' name='button1' value='Book Appointment'>
               </form></div>";?>
              </div>
              <?php
              }

            }
          }
        ?>  
         <?php
         echo $patientId;
         echo $doctorId;
         if(isset($st))
         {
          echo $st;
          } 
          else 
          {
              if(isset($et))
              {
                echo $et;
              }
              else{
                if(isset($dt)){
                  echo $dt;
                }
                else{
                  echo "NO UPCOMING TIME IS SCHEDULED FOR THIS DOCTOR ";
                }
              }
            }
         if(isset($_POST["button1"]))
         {
           $adminID= "SELECT * FROM Doctors WHERE DoctorID='$doctorId' ";
           $fetch=$db->query($adminID);
           if($fetch->num_rows>0)
           {
            while($rot1=$fetch->fetch_assoc())
            {
             $adminId=$rot1["AdminID"];
            }
           }
           $insert="INSERT INTO Appointments(PatientID, DoctorID, Start_time, End_time, Date, AdminID) VALUES ('$patientId','$doctorId','$st','$et','$dt','$adminId')";
           $update="UPDATE Doctors SET AppntmntNo = AppntmntNo + 1 WHERE DoctorID = '$doctorId' ";
           if($db->query($insert) && $db->query($update))
           {
             $_SESSION["DoctorIDrecieptPass"] = $doctorId;
             echo "Booked Your Appointment";
             echo "<script>window.open('receipt.php','_self')</script>";
           }
          }
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