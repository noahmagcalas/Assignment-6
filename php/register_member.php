<?php

$page_title = 'Register';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
    require ('connect.php');

    $errors = array();

    $user = mysqli_real_escape_string( $database, trim($_POST['username']));
    $pass = mysqli_real_escape_string( $database, trim($_POST['password1']));

    $fname = mysqli_real_escape_string( $database, trim($_POST['firstname']));
    $lname = mysqli_real_escape_string( $database, trim($_POST['lastname']));
    $phone = mysqli_real_escape_string( $database, trim($_POST['phone']));

    if (empty($errors)) {
        $q = "SELECT ID FROM Members WHERE phone='$phone'";
        $r = @mysqli_query($database, $q);
        if (mysqli_num_rows($r) != 0) $errors[] = 'Phone number already registered. <a href="member.php">Member Info</a>';
    }
    
    if (empty($errors)) {
        $date = date("Y-m-d");
        $q = "INSERT INTO Members (Username, Last_Name, First_Name, Phone, Date_Joined, Passwordd) VALUES ('$user', '$lname', '$fname', '$phone', '$date', '$pass')";
        $r = @mysqli_query($database, $q);
        if ($r) echo '<h1>Registered!</h1><p>You are now registered.</p><p><a href="member.php">Member Info</a></p>';
        else echo ($database -> error);

        mysqli_close($database);

        exit();
    }
    else
    {
        echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>';
        foreach ($errors as $msg) echo " - $msg<br>";
        echo "Please try again.</p>";
        mysqli_close($database);
    }
}

?>