<?php
$insert1 = false;
$flag = false;
$fam_id= "";
$famiderr = "";
$result = "";
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

    if (isset($_POST["famid"])) {
      if (empty($_POST["famid"])) {
        $famiderr = "Name is required";
      } else {
        $fam_id = test_input($_POST["famid"]);
        $flag = true;
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if($flag == true) {
    $sql1 = "SELECT * FROM `epiz_33875867_church`.`family` WHERE Family_ID = ('$fam_id')";
    $sql2 = "SELECT * FROM `epiz_33875867_church`.`person` WHERE Family_ID = ('$fam_id') ";

    // Execute the query
    if($con->query($sql1) == true){
        $result1 = $con->query($sql1);
        $insert1 = true;
    }
    else{
        echo "ERROR: $sql1 <br> $con->error";
    }

    if($con->query($sql2) == true){
      $result2 = $con->query($sql2);
      $insert2 = true;
   }
  else{
      echo "ERROR: $sql2 <br> $con->error";
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
    <title>View family details</title>
</head>
<body>
<?php 
require 'nav.php'
?>
<!--Family details-->
<div class="container">
  <form class="container formcs" action="view.php" method="post">
    <h2>Enter Family ID</h2>
      <input type="number" name="famid" id="famid" placeholder="Enter Family ID">
      <button class="lbutton" type="submit">
        <b>Submit</b></button>
    </form>

  <?php 
    if($insert1 == true){
  ?>
      <h2 class="formcs"><u>Family details</u></h2>
      <div class="tabledis">
        <table>
            <thead>
              <tr>
                <th>Family ID</th>
                <th>Head of the Family</th>
                <th>Church Support</th>
                <th>Cemetry Support</th>
                <th>House Number</th>
                <th>Zonal ID</th>
              </tr>
            </thead>
            <?php
              while($rows1 = $result1 -> fetch_assoc())
              {
            ?>
            <tbody>
              <tr>
                <td><?php echo $rows1['Family_ID'];?></td>
                <td><?php echo $rows1['Head_of_family'];?></td>
                <td><?php echo $rows1['Church_support'];?></td>
                <td><?php echo $rows1['Cemetry_support'];?></td>
                <td><?php echo $rows1['House_No'];?></td>
                <td><?php echo $rows1['Zonal_ID'];?></td>
              </tr>
              <?php
              }
              ?>
            </tbody>
        </table>
        </div>
    
<!--Family member details-->
      <h2 class="formcs"><u>Family member details</u></h2>
      <div class="tabledis"> 
        <table>
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of birth</th>
                <th>Gender</th>
                <th>Contact Number</th>
                <th>Occupation</th>
                <th>Role</th>
              </tr>
            </thead>
            <?php
             while($rows2 = $result2 -> fetch_assoc())
             {
              ?>
            <tbody>
              <tr>
            <td><?php echo $rows2['First_Name'];?></td>
            <td><?php echo $rows2['Last_Name'];?></td>
            <td><?php echo $rows2['Date_of_Birth'];?></td>
            <td><?php echo $rows2['Gender'];?></td>
            <td><?php echo $rows2['Contact_Number'];?></td>
            <td><?php echo $rows2['Occupation'];?></td>
            <td><?php echo $rows2['Role'];?></td>
            </tr>
              <?php
          }
        
          ?>
            </tbody>
          </table>
          </div>
      <?php }
      ?>

</div>

<script src="../script.js"></script>
</body>
</html>