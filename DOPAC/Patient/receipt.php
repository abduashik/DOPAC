<?php 
include "DBconnect.php";
session_start();
?>
<html>
    <head>
        <title>Receipt</title>
        <link rel="stylesheet" href="receiptStyle.css">
    </head>
    <body>
        <h1 style="margin:20px">Booked Your Appointment</h1><br>
        <div class="receipt">
        <h1>Receipt</h1><br>
        <?php $sql="SELECT * FROM Doctors WHERE DoctorID='{$_SESSION['DoctorIDrecieptPass']}'";
          $res=$db->query($sql);
          if($res->num_rows>0)
          {
            $ro=$res->fetch_assoc();
            $doct=$ro["Name"];
            $doctorId=$ro["DoctorID"];
            $sq="SELECT * FROM TimeSchedule WHERE DoctorID='{$_SESSION['DoctorIDrecieptPass']}'";
            $re=$db->query($sq);
            if($re->num_rows>0)
            {
              while($rot=$re->fetch_assoc())
               {
               $st=$rot["Start_time"];
               $et=$rot["End_time"];
               $dt=$rot["Date"];
               }
            }
        }
        ?>
        <p>Doctor Name : <?php echo $doct; ?></p>
        <p>Date : <?php echo $dt; ?></p>
        <p>Start time : <?php echo $st; ?></p>
        <p>End time : <?php echo $et; ?></p>
        <p>Paid amount : <?php echo "NA"; ?></p><br>
    </div>
        <div>
        <h2 style="color:red;">IMPORTANT : Kindly take a screenshot of this page and keep it while going hospital</h2><br>
        <p>After taking screenshot, </p><a class="atag" href="PatientDoctorBook.php">click here</a><p class="lastp"> to continue</p>
    </div>
    </body>
</html>