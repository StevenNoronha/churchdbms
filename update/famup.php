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
    $hof = $chsup = $cmsup = $zid = $hno = $famid = "";
    $m1s=$m2s=$m3s=$m4s=$m5s=false;

    if (isset($_POST["famid"])) {
      if (empty($_POST["famid"])) {
        $famidErr = "Name is required";
      } else {
        $famid = test_input($_POST["famid"]);
        $flag = true;
      }
      if (empty($_POST["hof"])) {
        $hofErr = "Name is required";
      } else {
        $hof = test_input($_POST["hof"]);
      }
      if (empty($_POST["chsup"])) {
        $chsupErr = "Amount is required";
      } else {
      $chsup = test_input($_POST["chsup"]);
      }
      if (empty($_POST["cmsup"])) {
        $cmsupErr = "Amount is required";
      } else {
      $cmsup = test_input($_POST["cmsup"]);
      }
      if (empty($_POST["zid"])) {
        $zidErr = "ID is required";
      } else {
      $zid = test_input($_POST["zid"]);
     }
     if (empty($_POST["hno"])) {
      $hnoErr = "ID is required";
    } else {
    $hno = test_input($_POST["hno"]);
   }
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

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    if($flag == true) {
        if($m1s == true) {
            $sql = "UPDATE `epiz_33875867_church`.`family` SET `Head_of_family` = '$hof' WHERE `Family_ID` = '$famid' ";
            if($con->query($sql) == true) {
                // Flag for successful insertion
                $insert1 = true;
            }
            else{
                echo "ERROR: $sql <br> $con->error";
            }
        }
        if($m2s == true) {
          $sql = "UPDATE `epiz_33875867_church`.`family` SET `Church_support` = '$chsup' WHERE `Family_ID` = '$famid' ";
          if($con->query($sql) == true) {
              // Flag for successful insertion
              $insert1 = true;
          }
          else{
              echo "ERROR: $sql <br> $con->error";
      }
    }
      if($m3s == true) {
        $sql = "UPDATE `epiz_33875867_church`.`family` SET `Cemetry_support` = '$cmsup' WHERE `Family_ID` = '$famid' ";
        if($con->query($sql) == true) {
            // Flag for successful insertion
            $insert1 = true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
    }
    if($m4s == true) {
      $sql = "UPDATE `epiz_33875867_church`.`family` SET `Zonal_ID` = '$zid' WHERE `Family_ID` = '$famid' ";
      if($con->query($sql) == true) {
          // Flag for successful insertion
          $insert1 = true;
      }
      else{
          echo "ERROR: $sql <br> $con->error";
      }
  }
  if($m5s == true) {
    $sql = "UPDATE `epiz_33875867_church`.`family` SET `House_No` = '$hno' WHERE `Family_ID` = '$famid' ";
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
<form class="container formcs" action="famup.php" method="post">
  <h2>Enter Family ID that needs to updated</h2>
    <input type="number"  name="famid" id="famid" placeholder="Enter Family ID">

    <h4><u>Only tick the boxes that need to updated</u></h4>
    <div class="famdiv">
    <div>
        <input class="chkbox" type="checkbox" id="m1" name="m1">
        <label for="hof">Head of the Family</label>
        <input type="text" name="hof" id="hof" placeholder="Enter the Name">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m2" name="m2">
        <label for="chsup">Church Support</label>
        <input type="number" name="chsup" id="chsup"placeholder="Enter your Contributions">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m3" name="m3">
        <label for="cmsup">Cemetry Support</label>
        <input type="number" name="cmsup" id="cmsup" placeholder="Enter your Contributions">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m4" name="m4">
        <label for="zid">Zonal Code</label>
        <input type="number" name="zid" id="zid" placeholder="Enter your Zonal Code">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m5" name="m5">
        <label for="hno">House Number</label>
        <input type="number" name="hno" id="hno" placeholder="Enter your House number">
        </div>
  </div>
    <button class="lbutton" type="submit">
  <b >Submit</b></button>             
    </form>
    </div>
<script src="../script.js"></script>
</body>
</html>