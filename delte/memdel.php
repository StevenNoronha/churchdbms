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

    $famid = $fname = $lname = "";

    if (isset($_POST["famid"])) {
        if (empty($_POST["famid"])) {
          $chrchidErr = "Name is required";
        } else {
          $famid = test_input($_POST["famid"]);
          $flag = true;
        }
        if (empty($_POST["fname"])) {
            $chrchidErr = "Name is required";
          } else {
            $fname = test_input($_POST["fname"]);
          }
          if (empty($_POST["lname"])) {
              $chrchidErr = "Name is required";
            } else {
              $lname = test_input($_POST["lname"]);
            }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      if($flag == true) {
            $sql = "DELETE FROM `epiz_33875867_church`.`person` WHERE Family_ID = '$famid' AND First_Name = '$fname' AND Last_Name = '$lname' ";
            if($con->query($sql) == true) {
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
    <title>Delete Details</title>
</head>
<body>
<?php 
require 'nav.php'
?>
<div class="container">
<form class="container formcs" action="memdel.php" method="post">
  <h2>Enter Family ID and full name that needs to Deleted</h2>
    <input style = "margin-top:25px;" type="number" name="famid" id="famid" placeholder="Enter Family ID">
    <input style = "margin-top:5px;" type="text" name="fname" id="fname" placeholder="Enter First Name">
    <input style = "margin-top:5px;" type="text" name="lname" id="lname" placeholder="Enter Last Name">
    <button class="lbutton" type="submit" >
  <b>Submit</b></button>               
</form>

<label>
    <h3>
      <?php 
      if($insert == true)
      { echo "Succesfully Deleted the record <br>";
      }
      ?>
    </h3>
</label>
</div>
<script src="../script.js"></script>

</body>
</html>