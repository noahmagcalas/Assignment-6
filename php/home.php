<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Home - Northern Kingdom Karate Academy</title>

    <link rel="stylesheet" type="text/css" href="../css/home.css">
</head>

<body>
    <?php include('../html/header.html'); ?>

    <!-- detects logged in user -->
    <p class="welcome-message">
        <?php

        $sessID = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab';
        session_id($sessID);
        session_start();

        if ($_SESSION['first']) {
            $fname = $_SESSION['first'];
            $lname = $_SESSION['last'];
            echo "Welcome, $fname $lname";
        }

        ?>
    </p>

    <div class="container text-center justify-content-center">
        <div class="row row-cols-1">

            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">The <b>Tiny Tigers</b></h5>
                        <h6 class="card-subtitle mb-2 text-muted">$70.00</h6>
                        <p class="card-text">Program focuses on exposing 2 and 3yr old's to a classroom setting and helping them to begin learning basic motor skills, listening, and focus skills.</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">The <b>Little Ninjas</b></h5>
                        <h6 class="card-subtitle mb-2 text-muted">$100.00</h6>
                        <p class="card-text">Program focuses on 4 - 10 years old. Program is improving basic motor skills, listening, and focus skills.</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row row-cols-1">

            <div class="col d-flex justify-content-center">

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">The <b>Junior</b> Program</h5>
                        <h6 class="card-subtitle mb-2 text-muted">$120.00</h6>
                        <p class="card-text">Program focuses on 11 - 16 years old. Program system is designed with the new student in mind, educating them from Beginner to Advanced Technician over the life of the training.</p>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><b>Defense and Tactical Training</b></h5>
                        <h6 class="card-subtitle mb-2 text-muted">$140.00</h6>
                        <p class="card-text">Program focused on educating individuals to effectively maintain the safety and well-being of themselves and their families in any situation that could occur.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php include('../html/footer.html'); ?>
</body>