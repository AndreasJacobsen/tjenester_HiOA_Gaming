<!DOCTYPE html>
<html>
<body>
<head>
    <meta charset="UTF-8">
    <title>HiOA Gaming members </title></head>
    <meta name="keywords" content="HiOA Gaming membership registration page">
    <meta name="author" content="Andreas Jacobsen">


<form action="">
    First name: <input type="text" name="FirstName"><br>
    Last name: <input type="text" name="LastName"><br>
    <input type="submit" value="Submit">
</form>




<?php
echo "<p>Hello world!</p>";
$servername = "localhost";
$username = "root";
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

