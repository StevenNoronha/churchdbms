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
    $zoneid = $zonename = $zlead = $pcode = $chrchid = "";
    $m1s=$m2s=$m3s=$m4s=$m5s=false;


    if (isset($_POST["zoneid"])) {
      if (empty($_POST["zoneid"])) {
        $zoneidErr = "Name is required";
      } else {
        $zoneid = test_input($_POST["zoneid"]);
        $flag = true;
      }
      if (empty($_POST["zonename"])) {
        $zonenameErr = "Amount is required";
      } else {
      $zonename = test_input($_POST["zonename"]);
      }
      if (empty($_POST["zlead"])) {
        $zleadErr = "Amount is required";
      } else {
      $zlead = test_input($_POST["zlead"]);
      }
      if (empty($_POST["pcode"])) {
        $pcodeErr = "ID is required";
      } else {
      $pcode = test_input($_POST["pcode"]);
     }
     if (empty($_POST["chrchid"])) {
      $chrchidErr = "ID is required";
    } else {
    $chrchid = test_input($_POST["chrchid"]);
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

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    if($flag == true) {
        if($m1s == true) {
            $sql = "UPDATE `epiz_33875867_church`.`zone` SET `Zone_Name` = '$zonename' WHERE `Zonal_ID` = '$zoneid' ";
            if($con->query($sql) == true) {
                // Flag for successful insertion
                $insert1 = true;
            }
            else{
                echo "ERROR: $sql <br> $con->error";
            }
        }
        if($m2s == true) {
          $sql = "UPDATE `epiz_33875867_church`.`zone` SET `Zonal_Leader` = '$zlead' WHERE `Zonal_ID` = '$zoneid' ";
          if($con->query($sql) == true) {
              // Flag for successful insertion
              $insert1 = true;
          }
          else{
              echo "ERROR: $sql <br> $con->error";
          }
      }
      if($m3s == true) {
        $sql = "UPDATE `epiz_33875867_church`.`zone` SET `Pincode` = '$pcode' WHERE `Zonal_ID` = '$zoneid' ";
        if($con->query($sql) == true) {
            // Flag for successful insertion
            $insert1 = true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
    }
    if($m4s == true) {
      $sql = "UPDATE `epiz_33875867_church`.`zone` SET `Church_ID` = '$chrchid' WHERE `Zonal_ID` = '$zoneid' ";
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
<form class="container formcs" action="zonup.php" method="post">
  <h2>Enter Zonal ID that needs to updated</h2>
    <input type="number" name="zoneid" id="zoneid" placeholder="Enter Zone ID">

  <h4><u>Only tick the boxes that need to updated</u></h4>
  <div class="famdiv">
  <div>
        <input class="chkbox" type="checkbox" id="m1" name="m1">
        <label for="zonename">Zone Name</label>
        <input type="text" name="zonename" id="zonename"placeholder="Enter the Zone name">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m2" name="m2">
        <label for="zlead">Zonal Leader</label>
        <input type="text" name="zlead" id="zlead" placeholder="Enter the name of zone leader">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m3" name="m3">
        <label for="pcode">Pincode</label>
        <input type="number" name="pcode" id="pcode" placeholder="Enter the Pincode">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m4" name="m4">
        <label for="chrchid">Church ID</label>
        <input type="number" name="chrchid" id="chrchid" placeholder="Enter the church id">
        </div>
  </div>
    <button class="lbutton" type="submit" >
  <b >Submit</b></button>            
    </form>
  </div>
<script src="../script.js"></script>
</body>
</html>