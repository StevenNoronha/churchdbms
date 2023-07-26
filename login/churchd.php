<?php
$insert1 = false;
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

    if($flag == true) {
    $sql1 = "SELECT * FROM `epiz_33875867_church`.`church` ";

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
    <title>View Details</title>
</head>
<body>
<?php 
require 'nav.php'
?>
<!--Church details-->

<div class="container">
  <h2 class="formcs" >CHURCHES OF DIOCESE OF BELGAUM</h2>
  <div class="tabledis">
    <table>
        <thead>
          <tr>
            <th>Church ID</th>
            <th>Church name</th>
            <th>Parish Priest name</th>
            <th>Contact Number</th>
            <th>Area</th>
            <th>City</th>
          </tr>
        </thead>
        <?php
          while($rows1 = $result1 -> fetch_assoc())
          {
        ?>
        <tbody>
          <tr>
            <td><?php echo $rows1['Church_ID'];?></td>
            <td><?php echo $rows1['Church_Name'];?></td>
            <td><?php echo $rows1['Priest_Name'];?></td>
            <td><?php echo $rows1['Contact_number'];?></td>
            <td><?php echo $rows1['Area'];?></td>
            <td><?php echo $rows1['City'];?></td>
          </tr>
          <?php
          }
        
          ?>
        </tbody>
      </table>
    </div>
</div>
<script src="../script.js"></script>
</body>
</html>