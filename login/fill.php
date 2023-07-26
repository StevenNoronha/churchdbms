
<?php
$insert = false;
$flag = false;
$last_id= "";
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
    $hof = $chsup = $cmsup = $zid = $hno = "";
    $hofErr = $chsupErr = $cmsupErr = $zidErr = $hnoErr="";

    $chkarr = array(0,0,0,0,0);
    if (isset($_POST["hof"])) {
      if (empty($_POST["hof"])) {
        $hofErr = "Name is required";
      } else {
        $hof = test_input($_POST["hof"]);
        $chkarr[0]=1;
      }
      if (empty($_POST["chsup"])) {
        $chsupErr = "Amount is required";
      } else {
      $chsup = test_input($_POST["chsup"]);
      $chkarr[1]=1;
      }
      if (empty($_POST["cmsup"])) {
        $cmsupErr = "Amount is required";
      } else {
      $cmsup = test_input($_POST["cmsup"]);
      $chkarr[2]=1;
      }
      if (empty($_POST["zid"])) {
        $zidErr = "ID is required";
      } else {
      $zid = test_input($_POST["zid"]);
      $chkarr[3]=1;
     }
     if (empty($_POST["hno"])) {
      $hnoErr = "ID is required";
    } else {
    $hno = test_input($_POST["hno"]);
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
    $sql = "INSERT INTO `epiz_33875867_church`.`family` (`Head_of_family`, `Church_Support`, `Cemetry_Support`,`Zonal_ID`,`House_No`) VALUES ('$hof', '$chsup', '$cmsup', '$zid','$hno');";

    // Execute the query
    if($con->query($sql) == true){
        
      $last_id = $con->insert_id;
     // echo "New record created successfully. Last inserted ID is: " . $last_id;

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
      { echo "Succesfully inserted Family Details<br>";
        echo "Your Family ID is :". $last_id;
      }
      ?>
    </h3>
</label>

<!--Family form details-->


<form class="container formcs" action="fill.php" method="post">
  <h2 >Family Details</h2>
        <label for="hof">Head of the Family</label>
        <input type="text" name="hof" id="hof" placeholder="Enter the Name">
        <label for="chsup">Church Support</label>
        <input type="number" name="chsup" id="chsup"placeholder="Enter your Contributions">
        <label for="cmsup">Cemetry Support</label>
        <input type="number" name="cmsup" id="cmsup" placeholder="Enter your Contributions">
        <label for="zid">Zonal Code</label>
        <input type="number" name="zid" id="zid" placeholder="Enter your Zonal Code">
        <label for="hno">House Number</label>
        <input type="number" name="hno" id="hno" placeholder="Enter your House number">
    <button class="lbutton" type="submit" >
  <b >Submit</b></button>             
</form>
    
    <a href="fillm.php">
      <h3><u>
      <?php 
      if($insert == true)
      { echo "Go to next page";
      }
      ?>
      </u>
    </h3>
    </a>
  </div>
    <script src="../script.js"></script>
</body>
</html>