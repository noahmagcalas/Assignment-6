<?php

$sessID = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab';
session_id($sessID);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = $_POST['username'];
    $pass = $_POST['password1'];

    $user = trim($user);
    $pass = trim($pass);

    if ($user == 'admin' && $pass == 'password')
    {
        $_SESSION['admin'] = true;

        header("Location: admin.php");
        exit();
    }

    include('connect.php');

    $q = "SELECT * FROM Members WHERE Username='$user' AND Passwordd='$pass'";
    $r = $database->query($q);

    if ($r->num_rows > 0) {

        $_SESSION['username'] = $user;

        $query = "SELECT ID, First_Name, Last_Name, Date_Joined, Phone FROM Members WHERE Username='$user'";
        $result = $database -> query($query);
        $row = $result -> fetch_array(MYSQLI_NUM);

        $_SESSION['first'] = $row[1];
        $_SESSION['last'] = $row[2];
        $_SESSION['date'] = $row[3];
        $_SESSION['pnum'] = $row[4];
        $_SESSION['id'] = $row[0];

        echo "session values:<br>";
        echo $_SESSION['username']." ";
        echo $_SESSION['first']." ";
        echo $_SESSION['last']." ";
        echo $_SESSION['date']." ";
        echo $_SESSION['pnum']." ";

        header("Location: member.php");
        exit();
    } else {
        header("Location: login.php");
        exit();
    }

}

mysqli_close($database);

?>