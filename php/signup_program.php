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

    <form action="register_program.php" method="post">
        <div class="card">

            <div class="card-body px-5 py-5">

                <h1>PLEASE REGISTER ME FOR:</h1>

                <div class="form-check">
                    <input class="form-check-input" name="program" type="radio" value="program1" id="new">
                    <label class="form-check-label" for="program1">
                        The Tiny Tigers
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="program" type="radio" value="program2" id="old">
                    <label class="form-check-label" for="program2">
                        The Little Ninjas
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="program" type="radio" value="program3" id="new">
                    <label class="form-check-label" for="program3">
                        Junior Program
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="program" type="radio" value="program4" id="old">
                    <label class="form-check-label" for="program4">
                        Defense and Tactical Training
                    </label>
                </div>

                <label for="instructor">Select Instructor:</label>
                <select class="form-control form-select rounded-0" id="instructor" name="instructor" required>
                    <option disabled selected>Choose instructor</option>
                    <?php

                    include('connect.php');

                    $query = "SELECT * FROM Instructors";
                    $result = $database -> query($query);
                    
                    if ($result -> num_rows > 0)
                    {
                        while ($row = $result -> fetch_assoc())
                        {
                            echo "<option>".$row["InstructorName"]."</option>";
                        }
                    }
                    else
                    {
                        echo "broken";
                    }

                    $database -> close();

                    ?>
                </select>

                <div class="justify-content-center">
                    <input class="btn btn-primary" id="submit" type="submit" value="Enroll" />
                </div>

            </div>

        </div>
    </form>

</body>

</html>