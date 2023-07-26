<?php 
    $server = "sql110.epizy.com";
    $username = "epiz_33875867";
    $password = "GWVAAMpaez5jgL";
    $error = false;

    $con = mysqli_connect($server, $username, $password);
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname=test_input($_POST["uname"]);
        $passwd=test_input($_POST["passwd"]);

    $sql = "SELECT * FROM `epiz_33875867_church`.`users` WHERE `username` = ('$uname') AND `password` = ('$passwd')";
    $result = $con->query($sql);
    $num = mysqli_num_rows($result);
    if($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: login.php");
        echo "success";
    }
    else {
        $error = true;
    }
    }
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
    <title>Login</title>
</head>
<body>
<?php 
require 'nav.php'
?>
<div class="container">
<label>
    <h3>
      <?php 
      if($error == true)
      { echo "You havent signed up, please sign up to continue";
      }
      ?>
    </h3>
</label>

<form class="container formcs" action="loginnew.php" method="post">
    <h2>Login</h2>
    <label for="uname">Username</label>
    <input type="text" name="uname" id="uname" placeholder="Enter your Username">
    <label for="passwd">Password</label>
    <input type="password" name="passwd" id="passwd" placeholder="Enter your Password">
    <div>
    <button class="lbutton" type="submit" >
    <b >Submit</b></button>
    <button class="lbutton" style="background-color: purple" type="button" onclick="location.href = './signup.php';">
    <b >Sign-Up</b></button>
    </div>       
</form>
</div>
<script src="../script.js"></script>
</body>
</html>