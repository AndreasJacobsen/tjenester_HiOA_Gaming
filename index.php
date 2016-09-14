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
<img src="Pic/logo.png" alt="Logo for HiOA Gaming" align="middle" height="200" width="400" >
<h1>Registration for membership</h1>

<div class="table">
<form action="" method="post">


            <div>First name: <div><input type="text" name="FirstName"></div></div>
            <div>Last name: <div><input type="text" name="LastName"></div></div> <br>
            <div>Stundet? <div><select required>
                <option value="1">Student</option>
                <option value="0">Ikke student</option>
            </select></div></div><br>

        <!-- Birthday picker made by abecoffman
         github repo: https://github.com/abecoffman/birthdaypicker -->
        <div><script type="text/javascript">
            $(document).ready(function(){
                $("#picker2").birthdaypicker({
                    maxAge: 120,
                    dateFormat: "littleEndian",
                    monthFormat: "long",
                });
            });
        </script></div><br>
    <div class="picker" id="picker2"></div>
            <br>
    <div>Payment:
    <div><input type="radio" name="semester" value="Semester payment"> Semester member</div>
    <div><input type="radio" name="semester" value="Yearly payment"> Yearly member</div></div><br>
    <div>Gender:
    <div><input type="radio" name="gender" value="Man"> Man</div>
    <div><input type="radio" name="gender" value="Woman"> Woman</div></div><br>


    <div><input type="submit" value="submit" id="submit" name="submit"></div>

</form>
</div>

<?php
if(isset($_POST['submit'])) {
    echo "<br>lol!";



$servername = "localhost";
$username = "root"; //change user and password to a restricted user before production
$password = "";
$dbname = "hioa_gaming"; //change to production name
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<br>Connected successfully<br>";

$sql = "INSERT INTO members (first_name, last_name, )";

}
?>


</body>
</html>

