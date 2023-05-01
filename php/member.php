<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Member Info - Northern Kingdom Karate Academy</title>
</head>

<body>
    <?php

    include('../html/header_alt.html');

    $sessID = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab';
    session_id($sessID);
    session_start();

    if ($_SESSION['username'])
    {
        $fname = $_SESSION['first'];
        $lname = $_SESSION['last'];
        $date = $_SESSION['date'];
        $phone = $_SESSION['pnum'];

        echo "Welcome, " . $fname . " " . $lname."<br>";
        echo "Date Joined: ".$date."<br>";
        echo "Phone #: ".$phone."<br>";
    }
    else
    {
        header("Location: login.php");

        session_destroy();

        header("Location: login.php");
        exit();
    }

    ?>

    <a href="signup_program.php">Enroll in a program</a>

    <?php include('../html/footer.html'); ?>

</body>