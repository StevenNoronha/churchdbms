<?php 
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
  header("location: loginnew.php");
  exit;
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
<nav class="navbar">
    <div class="navbar">
      <a class="#" href="../index.html">
        <img src="../photos/logo.png" width="80" height="60"></a>
      <div class="nav1">
        <ul class="nav-toggle" id="togglen">
          <li><a class="#" href="../index.html" style="font-weight: 500;font-size: x-large;">Diocese of Belgaum</a></li>
          <li><a class="#" href="./fill.php">Fill Family Details </a></li>
          <li><a class="#" href="./view.php">View Family Details</a></li>
          <li>
            <div class="dropdown">
              <p class="dropbtn">More</p>
              <div class="dropdown-content">
                <a href="./churchd.php">Church's</a>
                <a href="./commitd.php">Commitee's</a>
                <a href="./zoned.php">Zones</a>
                <hr>
                <a href="./about.html">About Us</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="nav-toggle1" id="togglenew"><button class="lbutton" onclick="location.href='./logout.php'"
        type="button">
        <b>Logout</b></button></div>
    <a href="#" id="toggle">
      <i class="fa-solid fa-bars fa-2xl" id="ham" style="height: 20px;"></i>
    </a>
  </nav>

<div class="container">
    
  <img src="../photos/nlogo.png" width="350vw">

<div class="ncontainer">
  <div class="dropdown">
    <button class="lbutton dropbtn">Fill Details</button>
    <div class="dropdown-content">
      <a href="./chrchfil.php">Fill Church Details</a>
      <a href="./comfil.php">Fill committee Details</a>
      <a href="./zonefil.php">Fill zone Details</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="lbutton dropbtn">Update Details</button>
    <div class="dropdown-content">
      <a href="../update/chrchup.php">Update Church Details</a>
      <a href="../update/comup.php">Update Committee Details</a>
      <a href="../update/famup.php">Update Family Details</a>
      <a href="../update/zonup.php">Update Zone Details</a>
      <a href="../update/memup.php">Update Member Details</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="lbutton dropbtn">Delete Details</button>
    <div class="dropdown-content">
      <a href="../delte/chrchdel.php">Delete Church Details</a>
      <a href="../delte/comdel.php">Delete Committe Details</a>
      <a href="../delte/famdel.php">Delete Family Details</a>
      <a href="../delte/zondel.php">Delete Zone Details</a>
      <a href="../delte/memdel.php">Delete Member Details</a>
    </div>
  </div>
</div>
</div>


  <script src="../script.js"></script>
</body>

</html>