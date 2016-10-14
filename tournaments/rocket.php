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
<div class="table">
    <img src="Pic/logo.png" class="logo" alt="Logo for HiOA Gaming">
    <h1>Registration for: </h1>
    <img src="Pic/rocket.png" class="logo" alt="Logo for Rocket League">

<?php include_once("analyticstracking.php") ?>
    <form action="" method="POST" autocomplete="off" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the tournament rules); return false; }">
        <fieldset>
            <h2> Prized Tournament rules:</h2>
            <b> From 20:00 to approximately 22.00 Saturday</b>
            <ul>
                <li>Teams must consist of 3 players</li>
                <li> At least 2 out of 3 players on any team have to be SiO students in order to claim prizes</li>
                <li> Upon disconnection, the game will be paused.</li>
                <li> One member of each team is responsible to inform the tournament leader about the outcome of each match</li>
                <li>The tournament leader must be notified of any change in team members </li>
            </ul>

            <br><h3>Format</h3>
            <ul>
                <li>All matches will be best out of three (2/3), the finals will be best out of five (3/5)</li>
                <li>Default Arena: DFH Stadium</li>
                <li>Team size: 3v3</li>
                <li>Bot Difficulty: No Bots</li>
                <li>Mutators: None</li>
                <li>Match Time: 5 Minutes</li>
                <li>Joinable by: Name/Password</li>
                <li>No game altering thirdparty software is allowed!</li>
            </ul>

            <br>
            <b>Please comfirm that you have read the rules</b>
            <br>I confirm that I have read the rules
            <input type="checkbox" name="checkbox" value="check" id="agree" />
        </fieldset>

        <fieldset class="float-input">
            <div class="float-input">
                <h3>Player one</h3>
                Full name: <br><input type="text" pattern="[A-Za-zÆØÅæøå\`\-\. ]{0,50}"
                                       oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                       name="FullName1" title="FullName1" required><br><br>

                    E-mail:   <br><input type="email" name="email1" title="email1">

                <br>SiO student?<br>
                <input type="radio" name="student1" value="1" title="SiO student"> SiO student<br>
                <input type="radio" name="student1" value="0" title="SiO student"> Not SiO student<br>
            </div>
            <div class="float-input">
            <h3>Player two</h3>
            Full name: <br><input type="text" pattern="[A-Za-zÆØÅæøå\`\-\. ]{0,50}"
                                  oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                  name="FullName2" title="FullName2" required><br><br>

            E-mail:   <br><input type="email" name="email2" title="email2">

            <br>SiO student?<br>
            <input type="radio" name="student2" value="1" title="SiO student"> SiO student<br>
            <input type="radio" name="student2" value="0" title="SiO student"> Not SiO student<br>
            </div>
            <div class="float-input">
            <h3>Player three</h3>
            Full name: <br><input type="text" pattern="[A-Za-zÆØÅæøå\`\-\. ]{0,50}"
                                  oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                  name="FullName3" title="FullName3" required><br><br>

            E-mail:   <br><input type="email" name="email3" title="email3">

            <br>SiO student?<br>
            <input type="radio" name="student3" value="1" title="SiO student"> SiO student<br>
            <input type="radio" name="student3" value="0" title="SiO student"> Not SiO student<br>
            </div>
            <div class="float-input">
             <br> <h3>Team name:</h3> <br><input type="text" name="TeamName" pattern="[A-Za-zÆØÅæøå'\-\. ]{0,50}"
                                oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                title="TeamName" required><br><br>
            </div>
        </fieldset>

        <br><input type="submit" value="Register for tournament" id="submit" class="submit" name="submit" title="submit">
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
    $team_name = test_input($_POST["TeamName"]);
    if ($team_name === "") {
        $x++;
        echo '<script type="text/javascript">';
        echo 'alert("Please fill in a team name!")';
        echo '</script>';
    }

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

    $feilmelding="Please indicate that you have read and agree to the tournament rules";
    if (!isset($_POST['checkbox'])) {
        echo "<script type='text/javascript'>alert('$feilmelding');</script>";
        $x++;
    }
    $student1 = test_input($_POST["student1"]);
    $student2 = test_input($_POST["student2"]);
    $student3 = test_input($_POST["student3"]);

    $game = "Rocket League";
    $date = "2016-10-15";
    $sqlTest = "SELECT * FROM team WHERE team_name = '" . $team_name . "' AND game = '" . $game . "'";
     $sqlTestResult = $conn->query($sqlTest);
     if($sqlTestResult -> num_rows === 0) {
     if ($x === 0) {
         $sql = "INSERT INTO team (full_name, student, email, team_name, lan_date, game)
         VALUES ('$full_name1','$student1','$email1','$team_name','$date','$game'),('$full_name2','$student2','$email2','$team_name','$date','$game'),('$full_name3','$student3','$email3','$team_name','$date','$game')";

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
        alert('Something was not furfilled, please try again!!')
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
