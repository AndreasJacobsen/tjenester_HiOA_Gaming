<!DOCTYPE HTML>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8">
<head>
<link rel="icon" href="Pic/favicon.ico" type="image/x-icon"/>
<title>Print members</title>
</head>
<div class="dropdown">
    <button class="dropbtn">Member database</button>
    <div class="dropdown-content">
        <a href="http://hioagaming.no/medlemmer/">Add users</a>
        <a href="http://hioagaming.no/medlemmer/print.php">Member list</a>
    </div>
</div>
<?php
header('Content-Type: text/html; charset=utf-8');
$sql = "SELECT * FROM hioa_gaming.members WHERE end_date > YEAR(CURDATE()); ";
$servername = "localhost";
$username = "root"; //change user and password to a restricted user before production
$password = "";
$dbname = "hioa_gaming"; //change to production name
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");

$sql = "SELECT * FROM hioa_gaming.members WHERE end_date > YEAR(CURDATE()); ";
$result = $conn->query($sql);

if($result -> num_rows > 0) {
    echo '<table cellpadding="0" cellspacing="0" class="db-table">';
    echo '<tr><th>Member number</th><th>Given name</th><th>Surname</th><th>SiO Student</th><th>Gender<th>Join Date</th><th>Member Type</th><th>Status</th><th>Membership End Date</th><th>Date of birth</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row["member_no"] . '</td><td>' . $row["first_name"] . '</td><td>'. $row["last_name"] . '</td><td>'. $row["student"] . '</td><td>' . $row["gender"]
            . '</td><td>' . $row["join_date"] . '</td><td>' . $row["member_type"] . '</td><td>' . $row["status"] . '</td><td>' . $row["end_date"] . '</td><td>' . $row["bday"] . '</td></tr>';
    }
    echo '</table>';
}
?>
