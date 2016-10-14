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
    <img src="Pic/ow.png" class="logo" alt="Logo for Overwatch">


    <form action="" method="POST" autocomplete="off">
        <fieldset>
            <h2> Tournament rules:</h2>
            <b>From 00:00 to approximately 04.00 Sunday</b>
            <ul>
                <li>All players must bring their own computer with Overwatch owned, installed, and updated</li>
                <li>In order to claim prized, five of out six (5/6) players on the team must be SiO students.</li>
                <li>Every team member must be present at the LAN, and cannot participate from home</li>
                <li>Teamspeak, Discord and other VoIP are allowed, but there shall only be communication with team members.</li>
                <li>No third party software that alter the game, or how the game is meant to be played in any way are allowed!</li>
                <li>All teams must register before the tournament</li>
                <li>Only one player on a team can be replaced during the tournament. Players that already are registered
                    on another team are not allowed to join another team
                </li>
            </ul>

            <br>
            <h3>Format</h3>
            <ul>
                <li>All maps are allowed and all matches are <b>best of 1 in Round Robin</b> and <b>best of 3</b>.
                    Finales are <b>Bo5</b></li>
                <li>Escort and Hybrid maps will be decided on how far one team gets the payload or how fast a team gets
                    to the checkpoint.</li>
                <li>The tournament is round robin, followed by single elimination. First all teams play eachother, then
                    teams are sorted based on results. In brackets each team will get eliminated on loss.
                </li>
                <li>It is not allowed to have two or more players playing the same character.</li>
                <li>The following settings will be used:</li>
                o Rule set: Quick Play<br>
                o Map Rotation: After a Mirror Match<br>
                o Map order: Random<br>
                o All maps: On<br>
                o Hero Selection Limit: 1 per team<br>
                o Role Selection Limit: None<br>
                o Gameplay Options: Default<br>
            </ul>

            <br>
            <b>Please comfirm that you have read the rules</b>
            <br>I confirm that I have read the rules
            <input type="radio" required/>
        </fieldset>

        <fieldset class="float-input">
            <div class="float-input">
                <h3>Player one</h3>
                Full name: <br><input type="text" pattern="[A-Za-zÆØÅæøå\`\-\. ]{0,50}"
                                      oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                      name="FullName1" title="FullName1" required><br><br>

                E-mail: <br><input type="email" name="email1" title="email1">

                <br>SiO student?<br>
                <input type="radio" name="student1" value="1" title="SiO student"> SiO student<br>
                <input type="radio" name="student1" value="0" title="SiO student"> Not SiO student<br>
            </div>
            <div class="float-input">
                <h3>Player two</h3>
                Full name: <br><input type="text" pattern="[A-Za-zÆØÅæøå\`\-\. ]{0,50}"
                                      oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                      name="FullName2" title="FullName2" required><br><br>

                E-mail: <br><input type="email" name="email2" title="email2">

                <br>SiO student?<br>
                <input type="radio" name="student2" value="1" title="SiO student"> SiO student<br>
                <input type="radio" name="student2" value="0" title="SiO student"> Not SiO student<br>
            </div>
            <div class="float-input">
                <h3>Player three</h3>
                Full name: <br><input type="text" pattern="[A-Za-zÆØÅæøå\`\-\. ]{0,50}"
                                      oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                      name="FullName3" title="FullName3" required><br><br>

                E-mail: <br><input type="email" name="email3" title="email3">

                <br>SiO student?<br>
                <input type="radio" name="student3" value="1" title="SiO student"> SiO student<br>
                <input type="radio" name="student3" value="0" title="SiO student"> Not SiO student<br>
            </div>
            <div class="float-input">
                <h3>Player four</h3>
                Full name: <br><input type="text" pattern="[A-Za-zÆØÅæøå\`\-\. ]{0,50}"
                                      oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                      name="FullName4" title="FullName4" required><br><br>

                E-mail: <br><input type="email" name="email4" title="email4">

                <br>SiO student?<br>
                <input type="radio" name="student4" value="1" title="SiO student"> SiO student<br>
                <input type="radio" name="student4" value="0" title="SiO student"> Not SiO student<br>
            </div>
            <div class="float-input">
                <h3>Player five</h3>
                Full name: <br><input type="text" pattern="[A-Za-zÆØÅæøå\`\-\. ]{0,50}"
                                      oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                      name="FullName5" title="FullName5" required><br><br>

                E-mail: <br><input type="email" name="email5" title="email5">

                <br>SiO student?<br>
                <input type="radio" name="student5" value="1" title="SiO student"> SiO student<br>
                <input type="radio" name="student5" value="0" title="SiO student"> Not SiO student<br>
            </div>
            <div class="float-input">
                <h3>Player six</h3>
                Full name: <br><input type="text" pattern="[A-Za-zÆØÅæøå\`\-\. ]{0,50}"
                                      oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                      name="FullName6" title="FullName6" required><br><br>

                E-mail: <br><input type="email" name="email6" title="email6">

                <br>SiO student?<br>
                <input type="radio" name="student6" value="1" title="SiO student"> SiO student<br>
                <input type="radio" name="student6" value="0" title="SiO student"> Not SiO student<br>
            </div>
            <div class="float-input">
                <br>
                <h3>Team name:</h3> <br><input type="text" name="TeamName" pattern="[A-Za-zÆØÅæøå'\-\. ]{0,50}"
                                               oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                               title="TeamName" required><br><br>
            </div>
        </fieldset>

        <br><input type="submit" value="Register for tournament" id="submit" class="submit" name="submit"
                   title="submit">
</div>
</form>

<?php

if (isset($_POST['submit'])) {
/*TODO kanskje sette nye registreringer som JavaScript pop-up boks istedenfor � printe direkte s� navnene Not fortsetter � st�? */
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

$full_name1 = test_input($_POST["FullName1"]);
if ($full_name1 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please fill in the full name of the participant number one!")';
    echo '</script>';
}
$student1 = test_input($_POST["student1"]);
if ($student1 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please select if the participant one is SiO STUDENT or NOT SiO STUDENT!")';
    echo '</script>';
}

$email1 = $_POST['email1'];
if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
    echo '<script type="text/javascript">';
    echo 'alert("Please fill inn a valid email for participant number one!")';
    echo '</script>';
    $emailErr = "Invalid email format at participant number one";
    $x++;
}
$full_name2 = test_input($_POST["FullName2"]);
if ($full_name2 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please fill in the full name of the participant number two!")';
    echo '</script>';
}
$student2 = test_input($_POST["student2"]);
if ($student2 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please select if the participant two is SiO STUDENT or NOT SiO STUDENT!")';
    echo '</script>';
}

$email2 = $_POST['email2'];
if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
    echo '<script type="text/javascript">';
    echo 'alert("Please fill inn a valid email for participant number two!")';
    echo '</script>';
    $emailErr = "Invalid email format at participant number two";
    $x++;
}
$full_name3 = test_input($_POST["FullName3"]);
if ($full_name3 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please fill in the full name of the participant number three!")';
    echo '</script>';
}
$student3 = test_input($_POST["student3"]);
if ($student3 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please select if the participant three is SiO STUDENT or NOT SiO STUDENT!")';
    echo '</script>';
}

$email3 = $_POST['email3'];
if (!filter_var($email3, FILTER_VALIDATE_EMAIL)) {
    echo '<script type="text/javascript">';
    echo 'alert("Please fill inn a valid email for participant number three!")';
    echo '</script>';
    $emailErr = "Invalid email format at participant number three";
    $x++;
}
$full_name4 = test_input($_POST["FullName4"]);
if ($full_name4 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please fill in the full name of the participant number four!")';
    echo '</script>';
}
$student4 = test_input($_POST["student4"]);
if ($student4 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please select if the participant four is SiO STUDENT or NOT SiO STUDENT!")';
    echo '</script>';
}

$email4 = $_POST['email4'];
if (!filter_var($email4, FILTER_VALIDATE_EMAIL)) {
    echo '<script type="text/javascript">';
    echo 'alert("Please fill inn a valid email for participant number four!")';
    echo '</script>';
    $emailErr = "Invalid email format at participant number four";
    $x++;
}
$full_name5 = test_input($_POST["FullName5"]);
if ($full_name5 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please fill in the full name of the participant number five!")';
    echo '</script>';
}
$student5 = test_input($_POST["student5"]);
if ($student5 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please select if the participant five is SiO STUDENT or NOT SiO STUDENT!")';
    echo '</script>';
}

$email5 = $_POST['email5'];
if (!filter_var($email5, FILTER_VALIDATE_EMAIL)) {
    echo '<script type="text/javascript">';
    echo 'alert("Please fill inn a valid email for participant number five!")';
    echo '</script>';
    $emailErr = "Invalid email format at participant number five";
    $x++;
}
$full_name6 = test_input($_POST["FullName6"]);
if ($full_name6 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please fill in the full name of the participant number six!")';
    echo '</script>';
}
$student6 = test_input($_POST["student6"]);
if ($student6 === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please select if the participant six is SiO STUDENT or NOT SiO STUDENT!")';
    echo '</script>';
}

$email6 = $_POST['email6'];
if (!filter_var($email6, FILTER_VALIDATE_EMAIL)) {
    echo '<script type="text/javascript">';
    echo 'alert("Please fill inn a valid email for participant number six!")';
    echo '</script>';
    $emailErr = "Invalid email format at participant number six";
    $x++;
}
$team_name = test_input($_POST["TeamName"]);
if ($team_name === "") {
    $x++;
    echo '<script type="text/javascript">';
    echo 'alert("Please select fill in a teamname!")';
    echo '</script>';
}
$feilmelding="Please indicate that you have read and agree to the tournament rules";
if (!isset($_POST['checkbox'])) {
    echo "<script type='text/javascript'>alert('$feilmelding');</script>";
    $x++;
}
$student1 = test_input($_POST["student1"]);
$student2 = test_input($_POST["student2"]);
$student3 = test_input($_POST["student3"]);
$student4 = test_input($_POST["student4"]);
$student5 = test_input($_POST["student5"]);
$student6 = test_input($_POST["student6"]);

$date = "2016-10-15";
$game = "Overwatch";
$sqlTest = "SELECT * FROM team WHERE team_name = '" . $team_name . "' AND game = '" . $game . "'";
$sqlTestResult = $conn->query($sqlTest);
if($sqlTestResult -> num_rows === 0) {
    if ($x === 0) {
        $sql = "INSERT INTO team (full_name, student, email, team_name, lan_date, game)
        VALUES ('$full_name1','$student1','$email1','$team_name','$date','$game'),('$full_name2','$student2','$email2','$team_name','$date','$game'),('$full_name3','$student3','$email3','$team_name','$date','$game'),('$full_name4','$student4','$email4','$team_name','$date','$game'),('$full_name5','$student5','$email5','$team_name','$date','$game'),('$full_name6','$student6','$email6','$team_name','$date','$game')";

        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>
           alert('Everything went well, youre team is registered!')
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
else{
     echo "<script type='text/javascript'>
       alert('The team name is already taken!')
       </script>";
    }
}

?>


</body>
</html>
