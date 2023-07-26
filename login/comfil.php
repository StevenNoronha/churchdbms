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

    // echo "Success connecting to the db";

    // Collect post variables
    $comid = $comname = $chrchid = $chairm = $nomem = $obje = "";
    $comidErr = $comnameErr = $chrchidErr = $chairmErr = $nomemErr= $objeErr = "";

    $chkarr = array(0,0,0,0,0,0);
    if (isset($_POST["comid"])) {
      if (empty($_POST["comid"])) {
        $comidErr = "Name is required";
      } else {
        $comid = test_input($_POST["comid"]);
        $chkarr[0]=1;
      }
      if (empty($_POST["comname"])) {
        $comnameErr = "Amount is required";
      } else {
      $comname = test_input($_POST["comname"]);
      $chkarr[1]=1;
      }
      if (empty($_POST["chrchid"])) {
        $chrchidErr = "Amount is required";
      } else {
      $chrchid = test_input($_POST["chrchid"]);
      $chkarr[2]=1;
      }
      if (empty($_POST["chairm"])) {
        $chairmErr = "ID is required";
      } else {
      $chairm = test_input($_POST["chairm"]);
      $chkarr[3]=1;
     }
     if (empty($_POST["nomem"])) {
      $nomemErr = "ID is required";
    } else {
    $nomem = test_input($_POST["nomem"]);
    $chkarr[4]=1;
   }
    if (empty($_POST["obje"])) {
     $objeErr = "ID is required";
    } else {
     $obje = test_input($_POST["obje"]);
     $chkarr[5]=1;
   }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    for ($i=0; $i < 6; $i++) { 
      if($chkarr[$i]==0) {
        $flag = false;
      }
      else {
        $flag=true;
      }
    }

    if($flag == true) {
    $sql = "INSERT INTO `epiz_33875867_church`.`committee` (`Committee_ID`, `Committee_Name`, `Church_ID`,`Chairman`,`Number_of_members`,`Objective`) VALUES ('$comid', '$comname', '$chrchid', '$chairm','$nomem','$obje');";

    // Execute the query
    if($con->query($sql) == true){
        
      $last_id = $comid;
     
        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
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
  <title>Fill Details</title>
</head>
<body>
<?php 
require 'nav.php'
?>
<!-- Respose for succesful insertion -->
<div class="container">
<label>
    <h3>
      <?php 
      if($insert == true)
      { echo "Succesfully inserted Committee Details<br>";
        echo "The committee ID is :". $last_id;
      }
      ?>
    </h3>
</label>

<!--Family form details-->


<form class="container formcs" action="comfil.php" method="post">
  <h2>Committee Details</h2>
        <label for="comid">Committee ID</label>
        <input type="number"name="comid" id="comid" placeholder="Enter the committee id">
        <label for="comname">Committee Name</label>
        <input type="text" name="comname" id="comname"placeholder="Enter the committee name">
        <label for="chrchid">Church ID</label>
        <input type="number" name="chrchid" id="chrchid" placeholder="Enter the Church ID">
        <label for="chairm">Chairman</label>
        <input type="text" name="chairm" id="chairm" placeholder="Enter the name of chairman">
        <label for="nomem">Number of members</label>
        <input type="number" name="nomem" id="nomem" placeholder="Enter the number of members">
        <label for="obje">Objective</label>
        <input type="text" name="obje" id="obje" placeholder="Enter the objective of the committee">
    <button class="lbutton" type="submit" >
  <b >Submit</b></button>
                
    </form>
  </div>
<script src="../script.js"></script>
    
</body>
</html> 