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
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">The <b>Little Ninjas</b></h5>
                        <h6 class="card-subtitle mb-2 text-muted">$100.00</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
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
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><b>Defense and Tactical Training</b></h5>
                        <h6 class="card-subtitle mb-2 text-muted">$140.00</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php include('../html/footer.html'); ?>
</body>