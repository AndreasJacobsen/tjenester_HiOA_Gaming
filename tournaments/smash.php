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

<div class="dropdown">
    <button class="dropbtn">Games</button>
    <div class="dropdown-content">
        <a href="rocket.php">Rocket League</a>
        <a href="kart.php">Mario Kart</a>
        <a href="overwatch.php">Overwatch</a>
        <a href="smash.php">Super Smash</a>
    </div>
</div>
<?php include_once("analyticstracking.php") ?>
<div class="table">
    <img src="Pic/logo.png" class="logo" alt="Logo for HiOA Gaming">
    <h1>Registration for: </h1>
    <img src="Pic/smash.png" class="logo" alt="Logo for Super Smash">


    <form action="" method="POST" autocomplete="off" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the tournament rules); return false; }">
        <fieldset>
            <h2> Tournament rules:</h2>
            <b> From 08:00 to approximately 11.00 Sunday</b>
            <br>
            <ul>
                <li>We only have a limited amount of controllers. We would appreciate and recommend players to bring their own. We do have GameCube adaptersrs</li>
                <li>Pauses are not allowed when you are scheduled to play a match. If you dont show up or leave for whatever reason, you loose a life or get a loss</li>
                <li>Everyone is welcome to participate but only SiO students can claim prices</li>
                <li>If you are more than 10 minutes late for a match you automatically get a loss. Look at the bracket that will be shown on the projectors to see when you are scheduled to play or ask our game master</li>
            </ul>

            <br><h3>Format</h3>
            <ul>
                <li>Double elimination format</li>
                <li>Matches are with 2 stocks and 6 minutes time limit</li>
                <li>Rock paper scissors to decide who picks character first. The one who dont choose character chooses stage out of the list of allowed ones. Round two its opposite.</li>
                <li>All matches uintil the semi-finals are <b>Best of 3</b>, semifinals are <b>Best of 5</b></li>
                <li>No items are allowed</li>
                <li>Only the following stages are allowed (unless both players agree to a stage):</li>
                o Battlefield<br>
                o Final Destination<br>
                o Halberd<br>
                o Smashville<br>
                o Town & City<br>
                o Duck Hunt<br>
                o Dream Land (64)<br>
                o All Omega stages<br>
                o Lylat Cruise<br>
                o Umbra Clock Tower<br>
                o Delfino Plaza<br>
            </ul>

            <br>
            <b>Please comfirm that you have read the rules</b>
            <br>I confirm that I have read the rules
            <input type="checkbox" name="checkbox" value="check" id="agree" />
        </fieldset>

        <fieldset class="float">
            <div class="float-input">
                Full name: <br><input type="text" pattern="[A-Za-zÆØÅæøå\`\-\. ]{0,50}"
                                      oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                      name="FullName" title="FullName" required><br><br>
                Player name: <br><input type="text" name="PlayerName" pattern="[A-Za-zÆØÅæøå'\-\. ]{0,50}"
                                        oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                        title="LastName" required><br><br>
            </div>
            <div class="float">
                E-mail:   <br><input type="email" name="email">
            </div>


            <div class="float">
                <br>SiO student?<br>
                <input type="radio" name="student" value="1" title="SiO student"> SiO student<br>
                <input type="radio" name="student" value="0" title="SiO student"> Not SiO student<br>
            </div>
        </fieldset>
        <br><input type="submit" value="Register for tournament" id="submit" class="submit" name="submit" title="submit">
</div>
</form>

<?php
if (isset($_POST['submit'])) {
    /*TODO kanskje sette nye registreringer som JavaScript pop-up boks istedenfor � printe direkte s� navnene ikke fortsetter � st�? */
    $servername = "localhost";
    $username = "root"; //change user and password to a restricted user before production
    $password = "";
    $dbname = "hioa_gaming"; //change to production name
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "<br>Connected successfully<br>";
    mysqli_set_charset($conn, "utf8");


    $x = 0;

    $full_name = test_input($_POST["FullName"]);
    if ($full_name === "") {
        $x++;
        echo '<script type="text/javascript">';
        echo 'alert("Please fill in SURNAME of the member!")';
        echo '</script>';
    }
    $player_name = test_input($_POST["PlayerName"]);
    if ($player_name === "") {
        $x++;
        echo '<script type="text/javascript">';
        echo 'alert("Please fill in LAST NAME of the member!")';
        echo '</script>';
    };

    $student = test_input($_POST["student"]);
    if ($student === "") {
        $x++;
        echo '<script type="text/javascript">';
        echo 'alert("Please select if the member is SiO STUDENT or NOT SiO STUDENT!")';
        echo '</script>';
    }

    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script type="text/javascript">';
        echo 'alert("Please fill inn a valid email!")';
        echo '</script>';
        $emailErr = "Invalid email format";
        $x++;
    }
    $feilmelding="Please indicate that you have read and agree to the tournament rules";
    if (!isset($_POST['checkbox'])) {
        echo "<script type='text/javascript'>alert('$feilmelding');</script>";
        $x++;
    }

    $student = test_input($_POST["student"]);
    $lan_date = "2016-10-15";
    $game = "Super Smash";

    if ($x === 0) {
        $sql = "INSERT INTO single (full_name, player_name, student, email, lan_date, game)
        VALUES ('$full_name','$player_name','$student','$email','$lan_date','$game')";

        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>
           alert('Everything went well, you are registered!')
           </script>";
        } else {
            echo "<script type='text/javascript'>
           alert('Everything crashed. Please try again!')
           </script>";
        }
    } else {
        echo "<script type='text/javascript'>
       alert('Something was not furfilled, please try again!')
       </script>";
    }

}

?>


</body>
</html>
