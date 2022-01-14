<!DOCTYPE html>
<?php
include "DBconnect.php";
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>Hospital Managment</title>
    <link rel="stylesheet" href="HospitalManagmentStyle.css">
</head>
<body>
<div class=titlebar>
     <div class=dropdown>

  </div>
  <div class=navbar><b>

   </div>
<div class=tophospitals>
   <h1 style="margin-left:20px;">All Hospitals</h1>
   <?php
    $sql = "SELECT * FROM Hospitals";
    $result = $db->query($sql);

    if ($result->num_rows > 0) 
     {
      $i=0;
     while($row = $result->fetch_assoc()) 
      {
        $adminID = $row["HospitalID"];
       echo '<div class=hospital1 >';
       echo "<center><div class='hospital-text' style='margin-bottm:0px;' ><form action='".$_SERVER["PHP_SELF"]."' method='post'>
             <h1><b>".$row["Name"]."</b></h1><br>
             <input type='hidden' name='chk' value='".$row["HospitalID"]."'><button type='submit' name='dctview' class='dctrbook'>Delete</button></form>
             </div></center>";
       echo '</div>';
       /*$docID = $row["AdminID"];
    echo "<div class='hospital1'><form action='".$_SERVER["PHP_SELF"]."' method='post'>";
    echo "<h3 style='margin-left:10px;'><b>".$row["DoctorID"].".".$row["Name"]."</b>";
    echo "<input type='hidden' name='chk' value='".$row["DoctorID"]."'>";
    echo "<button type='submit' name='dctview' class='dctrbook'>Delete</button></form></div>"; */
      }
     }
else 
     {
      echo "0 results";
     }
?>
</div>
<?php
if(isset($_POST["dctview"]))
{
	$sql1="DELETE FROM Hospitals WHERE HospitalID='$adminID'";
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
<div class=footer>
<h1>********************</h1><br>
</div>
</body>
</html>