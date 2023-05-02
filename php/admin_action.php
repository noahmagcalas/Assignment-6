<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sessID = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab';
    session_id($sessID);
    session_start();

    // boot users that arent admins
    if (!$_SESSION['admin']) {
        header("Location: logout.php");
        exit();
    }

    include('connect.php');

    $instructorName = $_POST['instructorName'];
    $query = "INSERT INTO Instructors (InstructorName) VALUES ('$instructorName')";
    $result = $database->query($query);

    if ($result) {
        header('Location: admin.php');
        exit();
    } else {
        echo "epic fail";
    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sessID = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab';
    session_id($sessID);
    session_start();

    // boot users that arent admins
    if (!$_SESSION['admin']) {
        header("Location: logout.php");
        exit();
    }

    include('connect.php');
    
    $query = "";
    if ($_GET['instructorID']) {
        $instructorID = $_GET['instructorID'];
        $query = "DELETE FROM Enrollments WHERE (Instructor_Id = $instructorID);
                DELETE FROM Instructors WHERE (ID = $instructorID)";
    }
    elseif ($_GET['memberID'])
    {
        $memberID = $_GET['memberID'];
        $query = "DELETE FROM Members WHERE (ID = $memberID)";
    }

    $result = $database->multi_query($query);

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