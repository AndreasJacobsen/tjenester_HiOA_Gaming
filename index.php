<!DOCTYPE html>
<html>
<body>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HiOA Gaming membership registration page">
    <meta name="author" content="Andreas Jacobsen">


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
    <script src="birthdaypicker/bday-picker.min.js"></script>
    <title>HiOA Gaming members </title></head>


<form action="">
    First name: <input type="text" name="FirstName"><br><br>
    Last name: <input type="text" name="LastName"><br>
    <p> Stundet? <select required>
            <option value="1">Student</option>
            <option value="0">Ikke student</option>
        </select>
        <!-- Birthday picker made by abecoffman
         github repo: https://github.com/abecoffman/birthdaypicker -->
        <script type="text/javascript">
            $(document).ready(function(){
                $("#picker2").birthdaypicker({
                    maxAge: 120,
                    dateFormat: "littleEndian",
                    monthFormat: "long",
                });
            });
        </script>
    <div class="picker" id="picker2"></div>
            <br>
    Payment: <br>
    <input type="radio" name="semester" value="Semester payment"> Semester member<br>
    <input type="radio" name="semester" value="Yearly payment"> Yearly member<br>

    <input type="submit" value="Submit">

</form>


<?php
echo "<p>Hello world!</p>";
$servername = "localhost";
$username = "root"; //change user and password to a restricted user before production
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";
$sql = "SELECT member_no, birth_date, first_name FROM hioa_gaming.members;";


?>


</body>
</html>

