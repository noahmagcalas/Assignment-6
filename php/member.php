<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Member Info - Northern Kingdom Karate Academy</title>
</head>

<body>
    <?php

    include('../html/header_alt.html');
    include('../html/footer.html');

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
        echo "Today's Date: ".$date."<br>";
        echo "Phone #: ".$phone."<br>";
    }
    else
    {
        header("Location: login.php");

        unset($_SESSION['username']);
        session_destroy();

        header("Location: login.php");
        exit();
    }

    ?>

    <a href="signup_program.php">Enroll in a program</a>

    <!-- access php vars anywhere as long as you use these tags <?php ?> -->
    <?php $fname; ?>
</body>