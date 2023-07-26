<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
  header("location: loginnew.php");
  exit;
}
$insert = false;
$flag = false;
    // Set connection variables
    $server = "sql110.epizy.com";
    $username = "epiz_33875867";
    $password = "GWVAAMpaez5jgL";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
        
    }

    // Collect post variables
    $fname1=$lname1=$fname=$lname=$gen1=$dob1=$occu1=$role1=$num1="";
    $m1s=$m2s=$m3s=$m4s=$m5s=$m6s=$m7s=false;

    if (isset($_POST["famid"])) {
      if (empty($_POST["famid"])) {
        $famidErr = "Name is required";
      } else {
        $famid = test_input($_POST["famid"]);
        $flag = true;
      }
      $fname=test_input($_POST["fname"]);
      $lname=test_input($_POST["lname"]);
      $fname1=test_input($_POST["fname1"]);
      $lname1=test_input($_POST["lname1"]);
      $gen1=test_input($_POST["gen1"]);
      $dob1=test_input($_POST["dob1"]);
      $occu1=test_input($_POST["occu1"]);
      $role1=test_input($_POST["role1"]);
      $num1=test_input($_POST["num1"]);
    }

    if(isset($_POST['m1'])) {
        $m1s=true;
      }
      if(isset($_POST['m2'])) {
        $m2s=true;
      }
      if(isset($_POST['m3'])) {
        $m3s=true;
      }
      if(isset($_POST['m4'])) {
        $m4s=true;
      }
      if(isset($_POST['m5'])) {
        $m5s=true;
      }
      if(isset($_POST['m6'])) {
        $m6s=true;
      }
      if(isset($_POST['m7'])) {
        $m7s=true;
      }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    if($flag == true) {
        if($m1s == true) {
            $sql = "UPDATE `epiz_33875867_church`.`person` SET `First_Name` = '$fname1' WHERE `Family_ID` = '$famid' AND First_Name = '$fname' AND Last_Name = '$lname' ";
            if($con->query($sql) == true) {
                // Flag for successful insertion
                $insert1 = true;
            }
            else{
                echo "ERROR: $sql <br> $con->error";
            }
        }
        if($m2s == true) {
          $sql = "UPDATE `epiz_33875867_church`.`person` SET `Last_Name` = '$lname1' WHERE `Family_ID` = '$famid'  AND First_Name = '$fname' AND Last_Name = '$lname' ";
          if($con->query($sql) == true) {
              // Flag for successful insertion
              $insert1 = true;
          }
          else{
              echo "ERROR: $sql <br> $con->error";
      }
    }
      if($m3s == true) {
        $sql = "UPDATE `epiz_33875867_church`.`person` SET `Gender` = '$gen1' WHERE `Family_ID` = '$famid'  AND First_Name = '$fname' AND Last_Name = '$lname'";
        if($con->query($sql) == true) {
            // Flag for successful insertion
            $insert1 = true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
    }
    if($m4s == true) {
      $sql = "UPDATE `epiz_33875867_church`.`person` SET `Date_of_Birth` = '$dob1' WHERE `Family_ID` = '$famid'  AND First_Name = '$fname' AND Last_Name = '$lname' ";
      if($con->query($sql) == true) {
          // Flag for successful insertion
          $insert1 = true;
      }
      else{
          echo "ERROR: $sql <br> $con->error";
      }
  }
  if($m5s == true) {
    $sql = "UPDATE `epiz_33875867_church`.`person` SET `Occupation` = '$occu1' WHERE `Family_ID` = '$famid'  AND First_Name = '$fname' AND Last_Name = '$lname' ";
    if($con->query($sql) == true) {
        // Flag for successful insertion
        $insert1 = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
  }
    
  if($m6s == true) {
    $sql = "UPDATE `epiz_33875867_church`.`person` SET `Role` = '$role1' WHERE `Family_ID` = '$famid'  AND First_Name = '$fname' AND Last_Name = '$lname' ";
    if($con->query($sql) == true) {
        // Flag for successful insertion
        $insert1 = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
}

if($m7s == true) {
    $sql = "UPDATE `epiz_33875867_church`.`person` SET `Contact_Number` = '$num1' WHERE `Family_ID` = '$famid'  AND First_Name = '$fname' AND Last_Name = '$lname' ";
    if($con->query($sql) == true) {
        // Flag for successful insertion
        $insert1 = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
}
    
    $flag=false;
    }  
  
  
    // Close the database connection
    $con->close(); 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../media.css">
    <script src="https://kit.fontawesome.com/f7fe4b7c39.js" crossorigin="anonymous"></script>
    <title>Update Details</title>
</head>
<body>

<?php 
require 'nav.php'
?>
<div class="container">
<form class="container formcs" class="container formcs" action="memup.php" method="post">
  <h2>Enter Family ID and Full Name of the person who details are to be updated</h2>
    <input type="number" name="famid" id="famid" placeholder="Enter Family ID">
    <input type="text" name="fname" id="fname" placeholder="Enter First Name">
    <input type="text" name="lname" id="lname" placeholder="Enter Last Name">
          
    <h4><u>Only tick the boxes that need to updated</u></h4> 
    <div class="famdiv">
    <div>   
      <input class="chkbox" type="checkbox" id="m7" name="m7">
      <label for="num1">Contact Number</label>
      <input type="number" name="num1" id="num1" placeholder="Enter your Contact Number">
      </div>
      <div>
      <input class="chkbox" type="checkbox" id="m1" name="m1">
      <label for="fname1">First Name</label>
      <input type="text" name="fname1" id="fname1" placeholder="Enter your First Name">
      </div>
      <div>
      <input class="chkbox" type="checkbox" id="m2" name="m2">
      <label for="lname1">Last Name</label>
      <input type="text" name="lname1" id="lname1" placeholder="Enter your Last Name">
      </div>
      <div>
      <input class="chkbox" type="checkbox" id="m3" name="m3">
      <label for="gen1">Gender</label>
      <input type="text" name="gen1" id="gen1" placeholder="Enter your Gender">
      </div>
      <div>
      <input class="chkbox" type="checkbox" id="m4" name="m4">
      <label for="dob1">Date of Birth</label>
      <input type="text" name="dob1" id="dob1" placeholder="Enter your Date of Birth">
      </div>
      <div>
      <input class="chkbox" type="checkbox" id="m5" name="m5">
      <label for="occu1">Occupation</label>
      <input type="text" name="occu1" id="occu1" placeholder="Enter your Occupation">
      </div>
      <div>
      <input class="chkbox" type="checkbox" id="m6" name="m6">
      <label for="role1">Role</label>
      <input type="text" name="role1" id="role1" placeholder="Enter your Role in the family">
      </div>
  </div>
    <button class="lbutton" type="submit" >
  <b >Submit</b></button>
                
    </form>
    </div>
<script src="../script.js"></script>
</body>
</html>