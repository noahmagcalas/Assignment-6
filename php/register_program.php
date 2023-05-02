<?php

$page_title = 'Register';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sessID = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab';
    session_id($sessID);
    session_start();

    require('connect.php');

    $errors = array();
    $user = mysqli_real_escape_string($database, trim($_POST['username']));

    $user = $_SESSION['username'];
    $query = "SELECT ID FROM Members WHERE username='$user'";
    $result = $database->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $memberID = $row["ID"];
        }
    } else {
        echo "no result";
    }

    if (empty($errors)) {
        $q = "SELECT ID FROM Enrollments WHERE Member_Id='$memberID'";
        $r = @mysqli_query($database, $q);
        if (mysqli_num_rows($r) != 0)
            $errors[] = 'ID already registered; members may only be enrolled in one program at a time.<a href="member.php">Member Info</a>';
    }

    if (empty($errors)) {

        $instructor = $_POST['instructor'];
        $program = $_POST['program'];

        $query = "SELECT ID FROM Instructors WHERE InstructorName='$instructor'";
        $result = $database->query($query);
        $row = $result->fetch_array(MYSQLI_NUM);
        $instructorID = $row[0];

        echo "member id: ".$memberID."<br>";
        echo "program: ".$program."<br>";
        echo "instructor id: ".$instructorID."<br>";

        $price = 0;
        switch ($program)
        {
            case "program1":
                $price = 70;
                break;
            case "program2":
                $price = 100;
                break;
            case "program3":
                $price = 120;
                break;
            case "program4":
                $price = 140;
        }
        $date = date("Y-m-d");

        // make a payment
        $q = "INSERT INTO Payments (Member_Id, Payment_Date, Amount) VALUES ('$memberID', '$date', '$price')";
        $r = $database -> query($q);
        if ($r) echo '<h1>Payment Success!</h1><p>You have now paid.</p>';
        
        $paymentID = $database -> insert_id;

        echo "payment id: ".$paymentID;

        // then enroll member
        $q = "INSERT INTO Enrollments (Member_Id, Payment_Id, ProgramName, Instructor_Id) VALUES ($memberID, $paymentID, '$program', $instructorID)";
        $r = $database -> query($q);
        if ($r)
            echo '<h1>Enrolled successfully!</h1><p>You are now enrolled.</p><p><a href="member.php">Member Info</a></p>';

        mysqli_close($database);

        header('Location: member.php');
        exit();
    } else {
        echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>';
        foreach ($errors as $msg)
            echo " - $msg<br>";
        mysqli_close($database);
    }
}

?>