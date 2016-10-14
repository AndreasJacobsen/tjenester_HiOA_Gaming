<!DOCTYPE HTML>
<link rel="stylesheet" type="text/css" href="styleprint.css">
<meta charset="UTF-8">
<head>
<link rel="icon" href="Pic/favicon.ico" type="image/x-icon"/>
<title>Print members</title>
</head>
<div class="dropdown">
    <button class="dropbtn">Menu</button>
    <div class="dropdown-content">
        <a href="../medlemmer/index.php">Add users</a>
        <a href="../medlemmer/print.php">Member list</a>
        <a href="../tournaments/admin.php">Registered players</a>
        <a href="../medlemmer/search.php">Search for players</a>

    </div>
</div>
<?php
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root"; //change user and password to a restricted user before production
$password = "";
$dbname = "hioa_gaming"; //change to production name
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
?>
<form  action="" method="post">
<div class="float">
<p><input type="submit" name="teams" value="Teams" class="submit" /></p></div>
<div class="float">
<p><input type="submit" name="singles" value="Players" class="submit"/>
</div><br><br><br><br>
</p>
</div>
    </form>
<?php
if (isset($_POST['teams'])) {
    $sql = "SELECT * FROM hioa_gaming.team;";
    $result = $conn->query($sql);

    echo '<div class="tablecenter"><table cellpadding="0" cellspacing="0" class="db-table">';
    echo '<tr><th>Player number</th><th>Full name</th><th>Team name</th><th>E-mail</th><th>LAN Date</th><th>Game</th><th>Student status</th></tr>';

    if($result -> num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row["player_no"] . '</td><td>' . $row["full_name"]. '</td><td>'  . $row["team_name"]. '</td><td>'  . $row["email"] . '</td><td>' . $row["lan_date"] . '</td><td>' . $row["game"] . '</td><td>' . $row["student"] . '</td></tr>';
    }
    echo '</table></div>';
    }
    

}
if (isset($_POST['singles'])) {
    $sql = "SELECT * FROM hioa_gaming.single;";
    $result = $conn->query($sql);


    echo '<div class="tablecenter"><table cellpadding="0" cellspacing="0" class="db-table">';
    echo '<tr><th>Player number</th><th>Full name</th><th>Player name</th><th>E-mail</th><th>LAN Date</th><th>Game</th><th>Student status</th></tr>';

    if($result -> num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row["player_no"] . '</td><td>' . $row["full_name"].  '</td><td>' . $row["player_name"].  '</td><td>' . $row["email"] . '</td><td>' . $row["lan_date"] . '</td><td>' . $row["game"] . '</td><td>' . $row["student"] . '</td></tr>';
    }
    echo '</table></div>';
    }
    
}



?>

<!--
$sql = "SELECT  * FROM hioa_gaming.members  WHERE end_date > YEAR(CURDATE()) ; ";
$result = $conn->query($sql);


    echo '<div class="tablecenter"><table cellpadding="0" cellspacing="0" class="db-table">';
    echo '<tr><th>Member number</th><th>Given name</th><th>Surname</th><th>SiO Student</th><th>Gender</th><th>Email</th><th>Membership</th><th>Payment</th><th>Status</th><th>Join Date</th><th>Membership End Date</th><th>Date of birth</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row["member_no"] . '</td><td>' . $row["first_name"] . '</td><td>'. $row["last_name"] . '</td><td>'. $row["student"] . '</td><td>' . $row["gender"]
            . '</td><td>' . $row["email"]. '</td><td>' . $row["member_type"] . '</td><td>' . $row["payment"] . '</td><td>' . $row["status"] . '</td><td>' . $row["join_date"] . '</td><td>'  . $row["end_date"] . '</td><td>' . $row["birth_date"] . '</td></tr>';
    }
    echo '</table></div>';
}
-->

