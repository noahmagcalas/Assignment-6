<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Enrollment - Northern Kingdom Karate Academy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>

<body>

    <?php include('../html/header_alt.html') ?>

    <form action="register_program.php" method="post">
        <div class="card">

            <div class="card-body px-5 py-5">

                <h3 class="text-center">PLEASE REGISTER ME FOR:</h3>

                <br>

                <div class="form-check">
                    <input class="form-check-input" name="program" type="radio" value="program1" id="new">
                    <label class="form-check-label" for="program1">
                        The <b>Tiny Tigers</b>
                    </label>
                    Program focuses on exposing 2 and 3yr old's to a classroom setting and helping them to begin
                    learning basic motor skills, listening, and focus skills.
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="program" type="radio" value="program2" id="old">
                    <label class="form-check-label" for="program2">
                        The <b>Little Ninjas</b>
                    </label>
                    Program focuses on 4 - 10 years old. Program is improving basic motor skills, listening, and focus
                    skills.
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="program" type="radio" value="program3" id="new">
                    <label class="form-check-label" for="program3">
                        The <b>Junior</b>
                    </label>
                    Program focuses on 11 - 16 years old. Program system is designed with the new student in mind,
                    educating them from Beginner to Advanced Technician over the life of the training.
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="program" type="radio" value="program4" id="old">
                    <label class="form-check-label" for="program4">
                        <b>Defense and Tactical Training</b>
                    </label>
                    Program focused on educating individuals to effectively maintain the safety and well-being of
                    themselves and their families in any situation that could occur.
                </div>

                <br>
                
                <span>
                    <label for="instructor">Select Instructor:</label>
                    <select class="form-control form-select rounded-0" id="instructor" name="instructor" required>
                        <option disabled selected>Choose instructor</option>
                        <?php

                        include('connect.php');

                        $query = "SELECT * FROM Instructors";
                        $result = $database->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option>" . $row["InstructorName"] . "</option>";
                            }
                        } else {
                            echo "broken";
                        }

                        $database->close();

                        ?>
                    </select>
                    </span>


                <div class="justify-content-center">
                    <input class="btn btn-primary" id="submit" type="submit" value="Enroll" />
                </div>

            </div>

        </div>
    </form>

</body>

</html>