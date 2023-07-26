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
    $chrchid = $chrchname = $conno = $pname = $area = $city = "";
    $m1s=$m2s=$m3s=$m4s=$m5s=false;

    if (isset($_POST["chrchid"])) {
      if (empty($_POST["chrchid"])) {
        $chrchidErr = "Name is required";
      } else {
        $chrchid = test_input($_POST["chrchid"]);
        $flag = true;
      }
      if (empty($_POST["chrchname"])) {
        $chrchnameErr = "Amount is required";
      } else {
      $chrchname = test_input($_POST["chrchname"]);
      }
      if (empty($_POST["conno"])) {
        $connoErr = "Amount is required";
      } else {
      $conno = test_input($_POST["conno"]);
      }
      if (empty($_POST["pname"])) {
        $pnameErr = "ID is required";
      } else {
      $pname = test_input($_POST["pname"]);
     }
     if (empty($_POST["area"])) {
      $areaErr = "ID is required";
    } else {
    $area = test_input($_POST["area"]);
   }
    if (empty($_POST["city"])) {
     $cityErr = "ID is required";
    } else {
     $city = test_input($_POST["city"]);
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
            $sql = "UPDATE `epiz_33875867_church`.`church` SET `Church_Name` = '$chrchname' WHERE `Church_ID` = '$chrchid' ";
            if($con->query($sql) == true) {
                // Flag for successful insertion
                $insert1 = true;
            }
            else{
                echo "ERROR: $sql <br> $con->error";
            }
        }
        if($m2s == true) {
          $sql = "UPDATE `epiz_33875867_church`.`church` SET `Contact_number` = '$conno' WHERE `Church_ID` = '$chrchid' ";
          if($con->query($sql) == true) {
              // Flag for successful insertion
              $insert1 = true;
          }
          else{
              echo "ERROR: $sql <br> $con->error";
          }
      }
      if($m3s == true) {
        $sql = "UPDATE `epiz_33875867_church`.`church` SET `Priest_Name` = '$pname' WHERE `Church_ID` = '$chrchid' ";
        if($con->query($sql) == true) {
            // Flag for successful insertion
            $insert1 = true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
    }
    if($m4s == true) {
      $sql = "UPDATE `epiz_33875867_church`.`church` SET `Area` = '$area' WHERE `Church_ID` = '$chrchid' ";
      if($con->query($sql) == true) {
          // Flag for successful insertion
          $insert1 = true;
      }
      else{
          echo "ERROR: $sql <br> $con->error";
      }
  }
  if($m5s == true) {
    $sql = "UPDATE `epiz_33875867_church`.`church` SET `City` = '$city' WHERE `Church_ID` = '$chrchid' ";
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
<form class="container formcs" action="chrchup.php" method="post">
   <h2>Enter Church ID that needs to updated</h2>
      <input type="number" name="chrchid" id="chrchid" placeholder="Enter Church ID">

    <h4><u>Only tick the boxes that need to updated</u></h4> 
    <div class="famdiv">
    <div>
        <input class="chkbox" type="checkbox" id="m1" name="m1">
        <label for="chrchname">Church Name</label>
        <input type="text" name="chrchname" id="chrchname" placeholder="Enter the Church name">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m2" name="m2"><label for="form2"></label>
        <label for="conno">Contact Number</label>
        <input type="number" class="form-control" name="conno" id="conno" placeholder="Enter the Contact Number">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m3" name="m3"><label for="form2"></label>
        <label for="pname">Priest name</label>
        <input type="text" class="form-control" name="pname" id="pname" placeholder="Enter the name of the Priest">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m4" name="m4"><label for="form2"></label>
        <label for="area">Area</label>
        <input type="text" class="form-control" name="area" id="area" placeholder="Enter the area name">
        </div>
        <div>
        <input class="chkbox" type="checkbox" id="m5" name="m5"><label for="form2"></label>
        <label for="city">City</label>
        <input type="text" class="form-control" name="city" id="city" placeholder="Enter the city">
        </div>
     </div>
    <button class="lbutton" type="submit" >
  <b>Submit</b></button>              
</form>
  </div>
<script src="../script.js"></script>
</body>
</html>