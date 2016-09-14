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


<form action="" method="get">
    First name: <input type="text" name="FirstName"><br><br>
    Last name: <input type="text" name="LastName"><br>
    <p> Stundet? <select required name="student">
            <option value="1">Student</option>
            <option value="0">Ikke student</option>
        </select>
        <!-- Birthday picker made by abecoffman
         github repo: https://github.com/abecoffman/birthdaypicker -->
        <script type="text/javascript">
            $(document).ready(function () {
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
    Gender: <br>
    <input type="radio" name="gender" value="Man"> Man<br>
    <input type="radio" name="gender" value="Woman"> Woman<br>


    <input type="submit" value="submit" id="submit" name="submit">

</form>


<?php
if (isset($_GET['submit'])) {
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
    $first_name = $_GET["FirstName"];
    $last_name = $_GET["LastName"];
    $gender = $_GET["gender"];
    $student = $_GET["student"];
    $gender_converter;
    if(!is_null($gender == "male")) {
        $gender_converter = "M";
    }
    else{
        $gender_converter = "F";
    }
    $date = date('m/d/Y');

    $sql = "INSERT INTO members (first_name, last_name, student, gender, join_date)
        VALUES ('$first_name', '$last_name','$student', '$gender_converter','$date')";

    if (mysqli_query($conn, $sql)) {
        echo "Membership data succesfully added!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    $test;

}
?>


</body>
</html>

