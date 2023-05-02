<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_POST['memberID']))
    {
        header('Location: admin.php');
        exit();
    }

    $sessID = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab';
    session_id($sessID);
    session_start();

    // boot users that arent admins
    if (!$_SESSION['admin']) {
        header("Location: logout.php");
        exit();
    }

    include('connect.php');

    $memberID = $_POST['memberID'];
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $phone = $_POST['phone'];
    $joindate = $_POST['joindate'];
    $password = $_POST['password1'];

    // ID, Username, Last_Name, First_Name, Phone, Date_Joined, Passwordd

    $queries = array();
    if ($username) array_push($queries, "Username = COALESCE('$username', Username)");
    if ($lastname) array_push($queries, "Last_Name = COALESCE('$lastname', Last_Name)");
    if ($firstname) array_push($queries, "First_Name = COALESCE('$firstname', First_Name)");
    if ($phone > 0) array_push($queries, "Phone = IFNULL($phone, Phone)");
    if ($joindate) array_push($queries, "Date_Joined = COALESCE('$joindate', Date_Joined)");
    if ($password) array_push($queries, "Passwordd = COALESCE('$password', Passwordd)");

    if (count($queries) < 1)
    {
        header("Location: admin.php");
        exit();
    }

    // UPDATE Members SET Phone = IFNULL(1111111111, Phone) WHERE (ID = 11)


    $query .= "UPDATE Members SET ";
    for ($i = 0; $i < count($queries); $i++)
    {
        if ($i != 0) $query .= ", ";
        $query .= $queries[$i];
    }
    $query .= " WHERE (ID = $memberID)";
    $result = $database -> query($query);

    echo $query;
    if ($result) {
        header('Location: admin.php');
        exit();
    } else {
        echo "epic fail<br>";
        echo $database->error;
    }

}

mysqli_close($database);

?>