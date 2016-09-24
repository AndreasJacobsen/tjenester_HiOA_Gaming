<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HiOA Gaming membership registration page">
    <meta name="author" content="Andreas Jacobsen and Kristian Munter Simonsen">
    <link rel="icon" href="Pic/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" href="style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <title>HiOA Gaming members </title></head>
<?php include 'functions.php' ?>

<div class="dropdown">
    <button class="dropbtn">Member database</button>
    <div class="dropdown-content">
        <a href="http://hioagaming.no/medlemmer/">Add users</a>
        <a href="http://hioagaming.no/medlemmer/print.php">Member list</a>
    </div>
</div>
<div class="table">
    <img src="Pic/logo.png" alt="Logo for HiOA Gaming" align="middle" height="200" width="400">
    <h1>Registration for membership</h1>

    <form action="" method="get">
        <div>Given name: <input type="text" pattern="[A-Za-zÆØÅæøå\`\-\. ]{0,50}"
                                oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                                name="FirstName" title="FirstName" required><br><br></div>
        Surname: <input type="text" name="LastName" pattern="[A-Za-zÆØÅæøå'\-\. ]{0,50}"
                        oninvalid="setCustomValidity('Only letters A-Z a-z . and spaces, max 50 letters.')"
                        title="LastName" required><br><br>

        E-mail:   <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$z >

        <!--  <p> SiO student? <select required name="student" title="Student">
                  <option value="1">Student</option>
                  <option value="0">Not student</option>
              </select>-->
            <br>
        <p><br>Date of birth:</br> <input type="date" id="datepicker" name="bday" pattern="[(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))
]" max="2010-12-31 min=" 1942-01-01""
            value="1993-03-03" ></p>

        <br>SiO student?<br>
        <input type="radio" name="student" value="1" title="SiO student"> SiO student<br>
        <input type="radio" name="student" value="0" title="SiO student"> Ikke SiO student<br>

        <br>Payment:<br>
        <input type="radio" name="payment" value="S" title="SemesterMember"> Semester member<br>
        <input type="radio" name="payment" value="Y" title="YearlyMember"> Yearly member<br>
        <br>Gender: <br>
        <input type="radio" name="gender" value="M" title="Man"> Man<br>
        <input type="radio" name="gender" value="F" title="Woman"> Woman<br>


        <br><input type="submit" value="Register member" id="submit" class="submit" name="submit" title="submit">
</div>
</form>


<?php


header('Content-Type: text/html; charset=utf-8');
if (isset($_GET['submit'])) {
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

    $first_name = test_input($_GET["FirstName"]);
    if ($first_name === "") {
        $x++;
        echo '<script type="text/javascript">';
        echo 'alert("Please fill in SURNAME of the member!")';
        echo '</script>';
    }
    $last_name = test_input($_GET["LastName"]);
    if ($last_name === "") {
        $x++;
        echo '<script type="text/javascript">';
        echo 'alert("Please fill in LAST NAME of the member!")';
        echo '</script>';
    };
    $gender = test_input($_GET["gender"]);
    if ($gender === "") {
        $x++;
        echo '<script type="text/javascript">';
        echo 'alert("Please select MALE or FEMALE! The HiOA Gaming database only recognize biological genders.")';
        echo '</script>';
    }

    $student = test_input($_GET["student"]);
    if ($student === "") {
        $x++;
        echo '<script type="text/javascript">';
        echo 'alert("Please select if the member is SiO STUDENT or NOT SiO STUDENT!")';
        echo '</script>';
    }
    $payment = test_input($_GET["payment"]);
    if ($payment === "") {
        $x++;
        echo '<script type="text/javascript">';
        echo 'alert("Please select SEMESTER membership or YEARLY membership!")';
        echo '</script>';
    }
    $bday = test_birth($_GET['bday']);
    if ($bday === "") {
        $x++;
        echo '<script type="text/javascript">';
        echo 'alert("Please fill in the birth date of the member!")';
        echo '</script>';
    }

    $email = $_GET['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script type="text/javascript">';
        echo 'alert("Please fill inn a valid email!")';
        echo '</script>';
        $emailErr = "Invalid email format";
        $x++;
    }

    $dateYearStart = date("Y");
    $dateFirst = $dateYearStart . "-01-01";
    $dateFirstYear = $dateYearStart . "-01-01";
    $dateSemester = strtotime('6 months', strtotime($dateFirst));
    $dateSemester = date('Y-m-d', $dateSemester);

    $dateYear = strtotime('11 months 27 days', strtotime($dateFirstYear));
    $dateYear = date('Y-m-d', $dateYear);


    $end_date;
    $date = test_date((date('Y-m-d')));


    $bday = test_date($_GET['bday']);
    if ($date > $dateSemester && $payment === "S") {
        $end_date = $dateSemester;
    } elseif ($date < $dateYear && $payment == "Y") {
        $end_date = $dateYear;
    }


    $minDate = test_date((date('1942-01-01')));
    $date = test_date((date('Y-m-d')));

    if ($bday < $date && $bday > $minDate) {
        $bday = $bday;
    } else {
        $bday = "";
        echo '<script type="text/javascript">';
        echo 'alert("I don\'t belive your date of birth.")';
        echo '</script>';
        $x++;
    }


    if ($x === 0) {
        $sql = "INSERT INTO members (first_name, last_name, birth_date, student, gender, join_date, member_type, status, end_date, bday)
        VALUES ('$first_name','$last_name','$bday','$student','$gender','$date', '$payment', 'member', '$end_date','$bday')";

        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>
           alert('Everything went well. GJ BJ WP GG!')
           </script>";
        } else {
            echo "<script type='text/javascript'>
           alert('Everything crashed. GJ BJ WP GG!')
           location.reload();
           </script>";
        }
    } else {
        echo "<script type='text/javascript'>
       alert('Please fill inn all the fields!')
       location.reload();
       </script>";
    }

}

?>


</body>
</html>
