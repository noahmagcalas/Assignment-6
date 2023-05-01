<?php

$sessID = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab';
session_id($sessID);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = $_POST['username'];
    $pass = $_POST['password1'];

    $user = trim($user);
    $pass = trim($pass);

    include('connect.php');

    $q = "SELECT * FROM Members WHERE Username='$user' AND Passwordd='$pass'";
    $r = $database->query($q);

    if ($r->num_rows > 0) {

        $_SESSION['username'] = $user;

        include('connect.php');

        $query = "SELECT First_Name, Last_Name, Date_Joined, Phone FROM Members WHERE Username='$user'";
        $result = $database->query($query);
        $row = $result->fetch_array(MYSQLI_NUM);

        $_SESSION['first'] = $row[0];
        $_SESSION['last'] = $row[1];
        $_SESSION['date'] = $row[2];
        $_SESSION['pnum'] = $row[3];

        header("Location: member.php");
        exit();
    } else {
        header("Location: login.php");
        exit();
    }

}

mysqli_close($database);

?>