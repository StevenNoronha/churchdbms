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
    $comid = $comname = $chrchid = $chairm = $nomem = $obje = "";
    $m1s=$m2s=$m3s=$m4s=$m5s=false;

    if (isset($_POST["comid"])) {
      if (empty($_POST["comid"])) {
        $comidErr = "Name is required";
      } else {
        $comid = test_input($_POST["comid"]);
        $flag = true; 
      }
      if (empty($_POST["comname"])) {
        $comnameErr = "Amount is required";
      } else {
      $comname = test_input($_POST["comname"]);
  
      }
      if (empty($_POST["chrchid"])) {
        $chrchidErr = "Amount is required";
      } else {
      $chrchid = test_input($_POST["chrchid"]);
  
      }
      if (empty($_POST["chairm"])) {
        $chairmErr = "ID is required";
      } else {
      $chairm = test_input($_POST["chairm"]);
  
     }
     if (empty($_POST["nomem"])) {
      $nomemErr = "ID is required";
    } else {
    $nomem = test_input($_POST["nomem"]);

   }
    if (empty($_POST["obje"])) {
     $objeErr = "ID is required";
    } else {
     $obje = test_input($_POST["obje"]);
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
            $sql = "UPDATE `epiz_33875867_church`.`committee` SET `Committee_Name` = '$comname' WHERE `Committee_ID` = '$comid' ";
            if($con->query($sql) == true) {
                // Flag for successful insertion
                $insert1 = true;
            }
            else{
                echo "ERROR: $sql <br> $con->error";
            }
        }
        if($m2s == true) {
          $sql = "UPDATE `epiz_33875867_church`.`committee` SET `Church_ID` = '$chrchid' WHERE `Committee_ID` = '$comid' ";
          if($con->query($sql) == true) {
              // Flag for successful insertion
              $insert1 = true;
          }
          else{
              echo "ERROR: $sql <br> $con->error";
          }
      }
      if($m3s == true) {
        $sql = "UPDATE `epiz_33875867_church`.`committee` SET `Chairman` = '$chairm' WHERE `Committee_ID` = '$comid' ";
        if($con->query($sql) == true) {
            // Flag for successful insertion
            $insert1 = true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
    }
    if($m4s == true) {
      $sql = "UPDATE `epiz_33875867_church`.`committee` SET `Number_of_members` = '$nomem' WHERE `Committee_ID` = '$comid' ";
      if($con->query($sql) == true) {
          // Flag for successful insertion
          $insert1 = true;
      }
      else{
          echo "ERROR: $sql <br> $con->error";
      }
  }
  if($m5s == true) {
    $sql = "UPDATE `epiz_33875867_church`.`committee` SET `Objective` = '$obje' WHERE `Committee_ID` = '$comid' ";
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
<form class="container formcs" action="comup.php" method="post">
  <h2>Enter Committee ID that needs to updated</h2>
    <input type="number" name="comid" id="comid" placeholder="Enter Committee ID">
          
    <h4><u>Only tick the boxes that need to updated</u></h4>
    <div class="famdiv">
    <div>
        <input class="chkbox" type="checkbox" id="m1" name="m1">
        <label for="comname">Committee Name</label>
        <input type="text" name="comname" id="comname" placeholder="Enter the committee name">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m2" name="m2">
        <label for="chrchid">Church ID</label>
        <input type="number" name="chrchid" id="chrchid" placeholder="Enter the Church ID">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m3" name="m3">
        <label for="chairm">Chairman</label>
        <input type="text" name="chairm" id="chairm" placeholder="Enter the name of chairman">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m4" name="m4">
        <label for="nomem">Number of members</label>
        <input type="number" name="nomem" id="nomem" placeholder="Enter the number of members">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m5" name="m5">
        <label for="obje">Objective</label>
        <input type="text" name="obje" id="obje" placeholder="Enter the objective of the committee">
        </div>
  </div>
    <button class="lbutton" type="submit" >
  <b >Submit</b></button>
                
    </form>
    </div>
    <script src="../script.js"></script>
</body>
</html>