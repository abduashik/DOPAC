<?php
 session_start();
 $_SESSION["doctorDivId"]=$_POST['chk'];
  echo  "<script>window.open('PatientDoctorBook.php','_self')</script>";
  ?>