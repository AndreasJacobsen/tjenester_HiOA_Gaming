<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="keywords" content="HiOA Gaming tournament registration page">
    <meta name="author" content="Andreas Jacobsen and Kristian Munter Simonsen">
    <link rel="icon" href="Pic/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" href="style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <title>HiOA Gaming Tournaments Registration </title></head>
<?php include 'functions.php' ?>
    <?php include_once("analyticstracking.php") ?>


<div class="dropdown">
    <button class="dropbtn">Games</button>
    <div class="dropdown-content">
        <a href="rocket.php">Rocket League</a>
        <a href="kart.php">Mario Kart</a>
        <a href="overwatch.php">Overwath</a>
        <a href="smash.php">Super Smash</a>
    </div>
</div>
<div class="table">
    <img src="Pic/logo.png" class="logo" alt="Logo for HiOA Gaming">
    <h1>Registration for: </h1>
    <br><h2>Prized tournaments</h2>
    </div><!-- added to close the top div-->
    <div class="float-button">
    <form method="POST" action="kart.php">
    <button type="submit" class="submit"> Mario Kart 8 </button>
  </form> </div>
  <div class="float-button">
  <form method="POST" action="rocket.php">
  <button type="submit" class="submit"> Rocket League </button>
</form></div>
<br><br><p><br><h2>Normal tournaments</h2>
<div class="float-button">
<form method="POST" action="overwatch.php">
<button type="submit" class="submit"> Overwatch </button>
</form></div>
<div class="float-button">
<form method="POST" action="smash.php">
<button type="submit" class="submit"> Super Smash Wiiu </button>
</form>
</div>
<br><br><br>
    <img src="Pic/FalloutLANPoster.jpg" class="logo" alt="Logo for Overwatch">

</body>
</html>
