<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Membership Sign Up - Northern Kingdom Karate Academy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

    <?php include ('../html/header_alt.html') ?>

    <div class="registration-form">
        <form action="../php/register_member.php" method="post">

            <div class="form-group">
                <h2>Register</h2>
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="username" placeholder="User name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="firstname" placeholder="First name" required>
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="lastname" placeholder="Last name" required>
            </div>
            <div class="form-group">
                <input type="tel" class="form-control item" name="phone" placeholder="(000) 000-0000" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password1" placeholder="Password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block create-account">Sign Up</button>
            </div>

            <div class="container text-center justify-content-center">
                <div class="row row-cols-1">

                    <div class="col">
                        <span class="navbar-text">
                            Sign in with social media:
                        </span>
                    </div>

                </div>

                <div class="row row-cols-1">

                    <div class="col">
                        <div class="container-fluid">

                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-google"></i></a>
                            <a href="#"><i class="bi bi-youtube"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-snapchat"></i></a>

                        </div>
                    </div>

                </div>
            </div>

        </form>

    </div>

</body>

</html>