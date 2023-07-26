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
    $zoneid = $zonename = $zlead = $pcode = $chrchid = "";
    $zoneidErr = $zonenameErr = $zleadErr = $pcodeErr = $chrchidErr =  "";

    $chkarr = array(0,0,0,0,0);
    if (isset($_POST["zoneid"])) {
      if (empty($_POST["zoneid"])) {
        $zoneidErr = "Name is required";
      } else {
        $zoneid = test_input($_POST["zoneid"]);
        $chkarr[0]=1;
      }
      if (empty($_POST["zonename"])) {
        $zonenameErr = "Amount is required";
      } else {
      $zonename = test_input($_POST["zonename"]);
      $chkarr[1]=1;
      }
      if (empty($_POST["zlead"])) {
        $zleadErr = "Amount is required";
      } else {
      $zlead = test_input($_POST["zlead"]);
      $chkarr[2]=1;
      }
      if (empty($_POST["pcode"])) {
        $pcodeErr = "ID is required";
      } else {
      $pcode = test_input($_POST["pcode"]);
      $chkarr[3]=1;
     }
     if (empty($_POST["chrchid"])) {
      $chrchidErr = "ID is required";
    } else {
    $chrchid = test_input($_POST["chrchid"]);
    $chkarr[4]=1;
   }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    for ($i=0; $i < 5; $i++) { 
      if($chkarr[$i]==0) {
        $flag = false;
      }
      else {
        $flag=true;
      }
    }

    if($flag == true) {
    $sql = "INSERT INTO `epiz_33875867_church`.`zone` (`Zonal_ID`, `Zone_Name`, `Zonal_Leader`,`Pincode`,`Church_ID`) VALUES ('$zoneid', '$zonename', '$zlead', '$pcode','$chrchid');";

    // Execute the query
    if($con->query($sql) == true){
        
      $last_id = $zoneid;
     
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
      { echo "Succesfully inserted Zone Details<br>";
        echo "The Zone ID is :". $last_id;
      }
      ?>
    </h3>
</label>

<!--Family form details-->


<form class="container formcs" action="zonefil.php" method="post">
  <h2 >Zone Details</h2>
        <label for="zoneid">Zone ID</label>
        <input type="number" name="zoneid" id="zoneid" placeholder="Enter the Zone id">
        <label for="zonename">Zone Name</label>
        <input type="text" name="zonename" id="zonename"placeholder="Enter the Zone name">
        <label for="zlead">Zonal Leader</label>
        <input type="text" name="zlead" id="zlead" placeholder="Enter the name of zone leader">
        <label for="pcode">Pincode</label>
        <input type="number" name="pcode" id="pcode" placeholder="Enter the Pincode">
        <label for="chrchid">Church ID</label>
        <input type="number" name="chrchid" id="chrchid" placeholder="Enter the church id">
        <button class="lbutton" type="submit" >
  <b >Submit</b></button>
                
    </form>
  </div>
<script src="../script.js"></script>   
</body>
</html> 