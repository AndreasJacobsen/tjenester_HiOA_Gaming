<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HiOA Gaming membership registration page">
    <meta name="author" content="Andreas Jacobsen">
    <meta name="author" content="Kristian Munter Simonsen">


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
    <script src="birthdaypicker/bday-picker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>HiOA Gaming members </title></head>
    <?php include 'functions.php' ?>
<body background="Pic/background.png">
<div class="dropdown">
    <button class="dropbtn">Member database</button>
    <div class="dropdown-content">
        <a href="#">Add users</a>
        <a href="#">Administrate users</a>
        <a href="#">Link 3</a>
    </div>
</div>
<div class="table">
    <img src="Pic/logo.png" alt="Logo for HiOA Gaming" align="middle" height="200" width="400">
    <h1>Registration for membership</h1>


    <form action="" method="get">
        <div>Given name: <input type="text" name="FirstName" title="FirstName" required><br><br></div>
        Surname: <input type="text" name="LastName" title="LastName" required><br>
        <p> SiO student? <select required name="student" title="Student">
                <option value="1">Student</option>
                <option value="0">Not student</option>
            </select>
        <p>Date of birth:</p>
        <!-- Birthday picker made by abecoffman
         github repo: https://github.com/abecoffman/birthdaypicker -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#picker2").birthdaypicker({
                    maxAge: 120,
                    dateFormat: "littleEndian",
                    monthFormat: "long"
                });
            });
        </script>
        <div class="picker" id="picker2"></div>
        <br>
        <br>Payment: <br>
        <input type="radio" name="payment" value="S" title="SemesterMember"> Semester member<br>
        <input type="radio" name="payment" value="Y" title="YearlyMember"> Yearly member<br>
        <br>Gender: <br>
        <input type="radio" name="gender" value="Man" title="Man"> Man<br>
        <input type="radio" name="gender" value="Woman" title="Woman"> Woman<br>


        <br><input type="submit" value="submit" id="submit" name="submit" title="submit">

    </form>


    <?php
    echo "PHP Kjører!";
    if (isset($_GET['submit'])) {
        echo "<br>lol!";


        /*TODO Alle blir satt som mann */
        /*TODO regulære utrykk både server og klientside. Serverside enkel regex laget, MÅ TESTES*/
        /*TODO alle blir satt som yearly medlem*/
        /*TODO selv om man ikke setter yearly, man/woman eller payment så vil koden kjøre og legges inn i MySQL, det skal ikke skje*/
        /*TODO kanskje sette nye registreringer som JavaScript pop-up boks istedenfor å printe direkte så navnene ikke fortsetter å stå? */
        $servername = "localhost";
        $username = "root"; //change user and password to a restricted user before production
        $password = "";
        $dbname = "hioa_gaming"; //change to production name
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "<br>Connected successfully<br>";




        $first_name = test_input($_GET["FirstName"]);
        $last_name = test_input($_GET["LastName"]);
        $gender = test_input($_GET["gender"]);
        $student = test_input($_GET["student"]);
        $gender_converter;
        $payment;
        if (empty($_POST['payment'])) {
            echo "You need to set the payment option";
        } else {
            $payment = test_input($_GET["gender"]);
        }

        if (!is_null($gender == "male")) {
            $gender_converter = test_input("M");
        } else {
            $gender_converter = test_input("F");
        }
        $date = (date('d-m-Y'));
        $dateTested =  test_date($date);

        // $date = (date('d-m-Y'));
        echo  "<p> <font color=\"red\">Datoen er:</font> <br></p>" . $dateTested;

    //skriv if-isset som sjekker om alle verdiene er satt
        $sql = "INSERT INTO members (first_name, last_name, student, gender, join_date)
        VALUES ('$first_name', '$last_name','$student', '$gender_converter','$dateTested')";

        if (mysqli_query($conn, $sql)) {
            echo "New member sucesfully added! <br> 
            Member name:" . $first_name . " " . $last_name . "<br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    ?>


</body>
</html>

