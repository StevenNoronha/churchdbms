<?php
$insert1=$insert2=$insert3=$insert4=$insert5=$insert6=false;
$flag = true;
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
    $m1s=$m2s=$m3s=$m4s=$m5s=$m6s=false;
    $fname1=$fname2=$fname3=$fname4=$fname5=$fname6="";
    $lname1=$lname2=$lname3=$lname4=$lname5=$lname6="";
    $gen1=$gen2=$gen3=$gen4=$gen5=$gen6="";
    $dob1=$dob2=$dob3=$dob4=$dob5=$dob6="";
    $occu1=$occu2=$occu3=$occu4=$occu5=$occu6="";
    $role1=$role2=$role3=$role4=$role5=$role6="";
    $num1=$num2=$num3=$num4=$num5=$num6=0;
    $fam_id="";

    $chkarr = array(0,0,0,0);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $fam_id=test_input($_POST["fam_id"]);

      $fname1=test_input($_POST["fname1"]);
      $lname1=test_input($_POST["lname1"]);
      $gen1=test_input($_POST["gen1"]);
      $dob1=test_input($_POST["dob1"]);
      $occu1=test_input($_POST["occu1"]);
      $role1=test_input($_POST["role1"]);
      $num1=test_input($_POST["num1"]);
  
      $fname2=test_input($_POST["fname2"]);
      $lname2=test_input($_POST["lname2"]);
      $gen2=test_input($_POST["gen2"]);
      $dob2=test_input($_POST["dob2"]);
      $occu2=test_input($_POST["occu2"]);
      $role2=test_input($_POST["role2"]);
      $num2=test_input($_POST["num2"]);
  
      $fname3=test_input($_POST["fname3"]);
      $lname3=test_input($_POST["lname3"]);
      $gen3=test_input($_POST["gen3"]);
      $dob3=test_input($_POST["dob3"]);
      $occu3=test_input($_POST["occu3"]);
      $role3=test_input($_POST["role3"]);
      $num3=test_input($_POST["num3"]);
       
      $fname4=test_input($_POST["fname4"]);
      $lname4=test_input($_POST["lname4"]);
      $gen4=test_input($_POST["gen4"]);
      $dob4=test_input($_POST["dob4"]);
      $occu4=test_input($_POST["occu4"]);
      $role4=test_input($_POST["role4"]);
      $num4=test_input($_POST["num4"]);
  
      $fname5=test_input($_POST["fname5"]);
      $lname5=test_input($_POST["lname5"]);
      $gen5=test_input($_POST["gen5"]);
      $dob5=test_input($_POST["dob5"]);
      $occu5=test_input($_POST["occu5"]);
      $role5=test_input($_POST["role5"]);
      $num5=test_input($_POST["num5"]);
  
      $fname6=test_input($_POST["fname6"]);
      $lname6=test_input($_POST["lname6"]);
      $gen6=test_input($_POST["gen6"]);
      $dob6=test_input($_POST["dob6"]);
      $occu6=test_input($_POST["occu6"]);
      $role6=test_input($_POST["role6"]);
      $num6=test_input($_POST["num6"]);

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
  }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    if($flag == true) {
    if($m1s == true) {
        $sql = "INSERT INTO `epiz_33875867_church`.`person` (`Family_ID`,`First_Name`, `Last_Name`, `Date_of_Birth`, `Gender`, `Contact_Number`, `Occupation`, `Role`) VALUES ('$fam_id','$fname1', '$lname1', '$dob1', '$gen1','$num1','$occu1','$role1');";
        // Execute the query
        if($con->query($sql) == true) {
            // Flag for successful insertion
            $insert1 = true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
    }/* TO CHANGE INSERT STATEMENT SYNTAX*/
    if($m2s == true) {
      $sql = "INSERT INTO `epiz_33875867_church`.`person` (`Family_ID`,`First_Name`, `Last_Name`, `Date_of_Birth`, `Gender`, `Contact_Number`, `Occupation`, `Role`) VALUES ('$fam_id','$fname2', '$lname2', '$dob2', '$gen2','$num2','$occu2','$role2');";
    
      // Execute the query
      if($con->query($sql) == true){
  
          // Flag for successful insertion
          $insert2 = true;
      }
      else{
          echo "ERROR: $sql <br> $con->error";
      }
  }
  
  if($m3s == true) {
    $sql = "INSERT INTO `epiz_33875867_church`.`person` (`Family_ID`,`First_Name`, `Last_Name`, `Date_of_Birth`, `Gender`, `Contact_Number`, `Occupation`, `Role`) VALUES ('$fam_id','$fname3', '$lname3', '$dob3', '$gen3','$num3','$occu3','$role3');";
    
    // Execute the query
    if($con->query($sql) == true){

        // Flag for successful insertion
        $insert3 = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
  }   
    if($m4s == true) {
      $sql = "INSERT INTO `epiz_33875867_church`.`person` (`Family_ID`,`First_Name`, `Last_Name`, `Date_of_Birth`, `Gender`, `Contact_Number`, `Occupation`, `Role`) VALUES ('$fam_id','$fname4', '$lname4', '$dob4', '$gen4','$num4','$occu4','$role4');";
    
      // Execute the query
      if($con->query($sql) == true){
          
  
          // Flag for successful insertion
          $insert4 = true;
      }
      else{
          echo "ERROR: $sql <br> $con->error";
      }
  }
  
  if($m5s == true) {
    $sql = "INSERT INTO `epiz_33875867_church`.`person` (`Family_ID`,`First_Name`, `Last_Name`, `Date_of_Birth`, `Gender`, `Contact_Number`, `Occupation`, `Role`) VALUES ('$fam_id','$fname5', '$lname5', '$dob5', '$gen5','$num5','$occu5','$role5');";
    
    // Execute the query
    if($con->query($sql) == true){
    

        // Flag for successful insertion
        $insert5 = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
}

  if($m6s == true) {
    $sql = "INSERT INTO `epiz_33875867_church`.`person` (`Family_ID`,`First_Name`, `Last_Name`, `Date_of_Birth`, `Gender`, `Contact_Number`, `Occupation`, `Role`) VALUES ('$fam_id','$fname6', '$lname6', '$dob6', '$gen6','$num6','$occu6','$role6');";
    
  // Execute the query
  if($con->query($sql) == true){


      // Flag for successful insertion
      $insert6 = true;
  }
  else{
      echo "ERROR: $sql <br> $con->error";
  }
}
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
<label >
    <h3>
      <?php 
      if($insert1 == true)
      { echo "Succesfully inserted member 1 <br>";
      }
      if($insert2 == true)
      { echo "Succesfully inserted member 2 <br>";
      }
      if($insert3 == true)
      { echo "Succesfully inserted member 3 <br>";
      }
      if($insert4 == true)
      { echo "Succesfully inserted member 4 <br>";
      }
      if($insert5 == true)
      { echo "Succesfully inserted member 5 <br>";
      }
      if($insert6 == true)
      { echo "Succesfully inserted member 6 <br>";
      }
      ?>
    </h3>
</label>


<form class="container formcs" action="fillm.php" method="post">
   <h2 >Enter your Family ID</h2>
    <input type="number" class="form-control" name="fam_id" id="fam_id" placeholder="Enter your Family ID">

<!--MEMBER 1-->
    <div>
    <label class="lbl" for="m1">Member 1</label>
   <input class="chkbox" type="checkbox" id="m1" name="m1">
   </div>
   <div class="famdiv">
    <div><label for="num1">Contact Number</label>
      <input type="number" class="form-control" name="num1" id="num1" placeholder="Enter your Contact Number"></div>
    <div><label for="fname1">First Name</label>
      <input type="text" class="form-control" name="fname1" id="fname1" placeholder="Enter your First Name"></div>
    <div><label for="lname1">Last Name</label>
      <input type="text" class="form-control" name="lname1" id="lname1" placeholder="Enter your Last Name"></div>
    <div><label for="gen1">Gender</label>
      <input type="text" class="form-control" name="gen1" id="gen1" placeholder="Enter your Gender"></div>
    <div><label for="dob1">Date of Birth</label>
      <input type="text" class="form-control" name="dob1" id="dob1" placeholder="Enter your Date of Birth"></div>
    <div><label for="occu1">Occupation</label>
      <input type="text" class="form-control" name="occu1" id="occu1" placeholder="Enter your Occupation"></div>
    <div><label for="role1">Role</label>
      <input type="text" class="form-control" name="role1" id="role1" placeholder="Enter your Role in the family"></div>
    </div>
<!--MEMBER 2-->

    <div>
    <label class="lbl" for="m2">Member 2</label>
    <input class="chkbox" type="checkbox" id="m2" name="m2">
    </div>
    <div class="famdiv">
      <div><label for="num2">Contact Number</label>
          <input type="number" class="form-control" name="num2" id="num2" placeholder="Enter your Contact Number"></div>
      <div><label for="fname2">First Name</label>
          <input type="text" class="form-control" name="fname2" id="fname2" placeholder="Enter your First Name"></div>
      <div><label for="lname2">Last Name</label>
          <input type="text" class="form-control" name="lname2" id="lname2" placeholder="Enter your Last Name"></div>
      <div><label for="gen2">Gender</label>
          <input type="text" class="form-control" name="gen2" id="gen2" placeholder="Enter your Gender"></div>
      <div><label for="dob2">Date of Birth</label>
          <input type="text" class="form-control" name="dob2" id="dob2" placeholder="Enter your Date of Birth"></div>
      <div><label for="occu2">Occupation</label>
          <input type="text" class="form-control" name="occu2" id="occu2" placeholder="Enter your Occupation"></div>
      <div><label for="role2">Role</label>
          <input type="text" class="form-control" name="role2" id="role2" placeholder="Enter your Role in the family"></div>
          </div>
<!--MEMBER 3-->
    
   <div>
    <label class="lbl" for="m3">Member 3</label>
   <input class="chkbox" type="checkbox" id="m3" name="m3">
   </div>
    <div class="famdiv">
      <div><label for="num3">Contact Number</label>
        <input type="number" class="form-control" name="num3" id="num3" placeholder="Enter your Contact Number"></div>
      <div><label for="fname3">First Name</label>
        <input type="text" class="form-control" name="fname3" id="fname3" placeholder="Enter your First Name"></div>
      <div><label for="lname3">Last Name</label>
        <input type="text" class="form-control" name="lname3" id="lname3" placeholder="Enter your Last Name"></div>
      <div><label for="gen3">Gender</label>
        <input type="text" class="form-control" name="gen3" id="gen3" placeholder="Enter your Gender"></div>
      <div><label for="dob3">Date of Birth</label>
        <input type="text" class="form-control" name="dob3" id="dob3" placeholder="Enter your Date of Birth"></div>
      <div><label for="occu3">Occupation</label>
        <input type="text" class="form-control" name="occu3" id="occu3" placeholder="Enter your Occupation"></div>
      <div><label for="role3">Role</label>
        <input type="text" class="form-control" name="role3" id="role3" placeholder="Enter your Role in the family"></div>
        </div>
<!--MEMBER 4-->

  <div>  
   <label class="lbl" for="m4">Member 4</label>
    <input class="chkbox" type="checkbox" id="m4" name="m4">
  </div>
  <div class="famdiv">
    <div><label for="num4">Contact Number</label>
      <input type="number" class="form-control" name="num4" id="num4" placeholder="Enter your Contact Number"></div>
    <div><label for="fname4">First Name</label>
      <input type="text" class="form-control" name="fname4" id="fname4" placeholder="Enter your First Name"></div>
    <div><label for="lname4">Last Name</label>
      <input type="text" class="form-control" name="lname4" id="lname4" placeholder="Enter your Last Name"></div>
    <div><label for="gen4">Gender</label>
      <input type="text" class="form-control" name="gen4" id="gen4" placeholder="Enter your Gender"></div>
    <div><label for="dob4">Date of Birth</label>
      <input type="text" class="form-control" name="dob4" id="dob4" placeholder="Enter your Date of Birth"></div>
    <div><label for="occu4">Occupation</label>
      <input type="text" class="form-control" name="occu4" id="occu4" placeholder="Enter your Occupation"></div>
    <div><label for="role4">Role</label>
      <input type="text" class="form-control" name="role4" id="role4" placeholder="Enter your Role in the family"></div>
      </div>
<!--MEMBER 5-->

<div>  
   <label class="lbl" for="m5">Member 5</label>
    <input class="chkbox" type="checkbox" id="m5" name="m5">
    </div>
  <div class="famdiv">
    <div><label for="num5">Contact Number</label>
    <input type="number" class="form-control" name="num5" id="num5" placeholder="Enter your Contact Number"></div>
    <div><label for="fname5">First Name</label>
    <input type="text" class="form-control" name="fname5" id="fname5" placeholder="Enter your First Name"></div>
    <div><label for="lname5">Last Name</label>
    <input type="text" class="form-control" name="lname5" id="lname5" placeholder="Enter your Last Name"></div>
    <div><label for="gen5">Gender</label>
    <input type="text" class="form-control" name="gen5" id="gen5" placeholder="Enter your Gender"></div>
    <div><label for="dob5">Date of Birth</label>
    <input type="text" class="form-control" name="dob5" id="dob5" placeholder="Enter your Date of Birth"></div>
    <div><label for="occu5">Occupation</label>
    <input type="text" class="form-control" name="occu5" id="occu5" placeholder="Enter your Occupation"></div>
    <div><label for="role5">Role</label>
    <input type="text" class="form-control" name="role5" id="role5" placeholder="Enter your Role in the family"></div>
    </div>
<!--MEMBER 6-->

<div>  
   <label class="lbl" for="m6">Member 6</label>
    <input  class="chkbox" type="checkbox" id="m6" name="m6">
    </div>
  <div class="famdiv">
    <div><label for="num6">Contact Number</label>
    <input type="number" class="form-control" name="num6" id="num6" placeholder="Enter your Contact Number"></div>
    <div><label for="fname6">First Name</label>
    <input type="text" class="form-control" name="fname6" id="fname6" placeholder="Enter your First Name"></div>
    <div><label for="lname6">Last Name</label>
    <input type="text" class="form-control" name="lname6" id="lname6" placeholder="Enter your Last Name"></div>
    <div><label for="gen6">Gender</label>
    <input type="text" class="form-control" name="gen6" id="gen6" placeholder="Enter your Gender"></div>
    <div><label for="dob6">Date of Birth</label>
    <input type="text" class="form-control" name="dob6" id="dob6" placeholder="Enter your Date of Birth"></div>
    <div><label for="occu6">Occupation</label>
    <input type="text" class="form-control" name="occu6" id="occu6" placeholder="Enter your Occupation"></div>
    <div><label for="role6">Role</label>
    <input type="text" class="form-control" name="role6" id="role6" placeholder="Enter your Role in the family"></div>
      </div>

  <button class="lbutton" type="submit" >
  <b >Submit</b></button>
                      
</form>
</div>
    <script src="../script.js"></script>
</body>
</html> 