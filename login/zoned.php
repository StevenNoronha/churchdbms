<?php
$insert1 = false;
$flag = false;
$churchid= "";
$churchiderr = "";
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

    if (isset($_POST["churchid"])) {
      if (empty($_POST["churchid"])) {
        $churchiderr = "ID is required";
      } else {
        $churchid = test_input($_POST["churchid"]);
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
    $sql1 = "SELECT * FROM `epiz_33875867_church`.`zone` WHERE Church_ID = ('$churchid')";

    // Execute the query
    if($con->query($sql1) == true){
        $result1 = $con->query($sql1);
        $insert1 = true;
    }
    else{
        echo "ERROR: $sql1 <br> $con->error";
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
    <title>View Zone Details</title>
</head>
<body>

<?php 
require 'nav.php'
?>
<!--Zonal details-->

<div class="container">
<form class="container formcs" action="zoned.php" method="post">
  <h2>Enter Church ID</h2>
    <input type="number" name="churchid" id="churchid" placeholder="Enter Church ID">
    <button class="lbutton" type="submit">
      <b>Submit</b></button>
  </form>

    <?php        
   if($insert1 == true){
    ?>
  <h2 class="formcs"><u>Zonal details</u></h2>
  <div class="tabledis">
    <table>
        <thead>
          <tr>
            <th>Zonal ID</th>
            <th>Zone name</th>
            <th>Zonal Leader</th>
            <th>Pincode</th>
          </tr>
        </thead>
        <?php
          while($rows1 = $result1 -> fetch_assoc())
          {
        ?>
        <tbody>
          <tr>            
            <td><?php echo $rows1['Zonal_ID'];?></td>
            <td><?php echo $rows1['Zone_Name'];?></td>
            <td><?php echo $rows1['Zonal_Leader'];?></td>
            <td><?php echo $rows1['Pincode'];?></td>
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