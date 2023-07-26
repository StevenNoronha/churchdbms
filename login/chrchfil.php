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
    $chrchid = $chrchname = $conno = $pname = $area = $city = "";
    $chrchidErr = $chrchnameErr = $connoErr = $pnameErr = $areaErr= $cityErr = "";

    $chkarr = array(0,0,0,0,0,0);
    if (isset($_POST["chrchid"])) {
      if (empty($_POST["chrchid"])) {
        $chrchidErr = "Name is required";
      } else {
        $chrchid = test_input($_POST["chrchid"]);
        $chkarr[0]=1;
      }
      if (empty($_POST["chrchname"])) {
        $chrchnameErr = "Amount is required";
      } else {
      $chrchname = test_input($_POST["chrchname"]);
      $chkarr[1]=1;
      }
      if (empty($_POST["conno"])) {
        $connoErr = "Amount is required";
      } else {
      $conno = test_input($_POST["conno"]);
      $chkarr[2]=1;
      }
      if (empty($_POST["pname"])) {
        $pnameErr = "ID is required";
      } else {
      $pname = test_input($_POST["pname"]);
      $chkarr[3]=1;
     }
     if (empty($_POST["area"])) {
      $areaErr = "ID is required";
    } else {
    $area = test_input($_POST["area"]);
    $chkarr[4]=1;
   }
    if (empty($_POST["city"])) {
     $cityErr = "ID is required";
    } else {
     $city = test_input($_POST["city"]);
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
    $sql = "INSERT INTO `epiz_33875867_church`.`church` (`Church_ID`, `Church_Name`, `Contact_number`,`Priest_Name`,`Area`,`City`) VALUES ('$chrchid', '$chrchname', '$conno', '$pname','$area','$city');";

    // Execute the query
    if($con->query($sql) == true){
        
      $last_id = $chrchid;
     
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
      { echo "Succesfully inserted Church Details<br>";
        echo "The Church ID is :". $last_id;
      }
      ?>
    </h3>
</label>


<!--Family form details-->


<form class="container formcs" action="chrchfil.php" method="post">
  <h2>Church Details</h2>
        <label for="chrchid">Church ID</label>
        <input type="number" name="chrchid" id="chrchid" placeholder="Enter the Church id">
        <label for="chrchname">Church Name</label>
        <input type="text" name="chrchname" id="chrchname"placeholder="Enter the Church name">
        <label for="conno">Contact Number</label>
        <input type="number" name="conno" id="conno" placeholder="Enter the Contact Number">
        <label for="pname">Priest name</label>
        <input type="text" name="pname" id="pname" placeholder="Enter the name of the Priest">
        <label for="area">Area</label>
        <input type="text" name="area" id="area" placeholder="Enter the area name">
        <label for="city">City</label>
        <input type="text" name="city" id="city" placeholder="Enter the city">
    <button class="lbutton" type="submit">
  <b >Submit</b></button>             
</form>
</div>
<script src="../script.js"></script>
</body>
</html> 