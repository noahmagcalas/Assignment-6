<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Member Info - Northern Kingdom Karate Academy</title>
</head>

<body>
    <?php include('../html/header_alt.html'); ?>

    <h3 class="text-center">Information</h3>
    <div class="table-responsive-md">
        <table class="member-info table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone #</th>
                    <th>Date Joined</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <?php

                    $sessID = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab';
                    session_id($sessID);
                    session_start();

                    if ($_SESSION['username']) {
                        $fname = $_SESSION['first'];
                        $lname = $_SESSION['last'];
                        $date = $_SESSION['date'];
                        $phone = $_SESSION['pnum'];

                        echo "<td>$fname</td>
                                <td>$lname</td>
                                <td>$phone</td>
                                <td>$pnum</td>";
                    } else {
                        header("Location: login.php");

                        session_destroy();

                        header("Location: login.php");
                        exit();
                    }

                    ?>
                </tr>

            </tbody>
        </table>
    </div>

    <br>

    <h3 class="text-center">Payments</h3>
    <div class="table-responsive-md">
        <table class="member-payments table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member ID</th>
                    <th colspan='2'>Payment Date</th>
                    <th colspan='2'>Amount</th>
                </tr>
            </thead>
            <tbody>

                <?php

                include('connect.php');

                $memberID = $_SESSION['id'];
                $query = "SELECT * FROM Payments WHERE (Member_Id = $memberID)";
                $result = $database->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        // ID, Member_Id, Payment_Date, Amount
                        $paymentID = $row["ID"];
                        $memberID = $row["Member_Id"];
                        $paymentDate = $row["Payment_Date"];
                        $amount = $row["Amount"];

                        echo "<tr>";
                        echo "<th scope='row' colspan='1'>$paymentID</th>";
                        echo "<td>$memberID</td>";
                        echo "<td colspan='2'>$paymentDate</td>";
                        echo "<td colspan='2'>$amount</td>";
                        echo "</tr>";

                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No Payments</td></tr>";
                }

                ?>

            </tbody>
        </table>
    </div>

    <br>

    <h3 class="text-center">Enrollments</h3>
    <div class="table-responsive-md">
        <table class="member-payments table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th colspan='2'>Member ID</th>
                    <th colspan='2'>Payment ID</th>
                    <th colspan='2'>Program Name</th>
                    <th colspan='2'>Instructor ID</th>
                </tr>
            </thead>
            <tbody>

                <?php

                include('connect.php');

                $memberID = $_SESSION['id'];
                $query = "SELECT * FROM Enrollments WHERE (Member_Id = $memberID)";
                $result = $database->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $enrollmentID = $row["ID"];
                        $memberID = $row["Member_Id"];
                        $paymentID = $row["Payment_Id"];
                        $programName = $row["ProgramName"];
                        switch ($programName)
                        {
                            case "program1":
                                $programName = "Tiny Tigers";
                                break;
                            case "program2":
                                $programName = "Little Ninjas";
                                break;
                            case "program3":
                                $programName = "Junior";
                                break;
                            case "program4":
                                $programName = "Defense and Tactical Training";
                        }
                        $instructorID = $row['Instructor_Id'];

                        echo "<tr>";
                        echo "<th scope='row' colspan='1'>$paymentID</th>";
                        echo "<td colspan='2'>$memberID</td>";
                        echo "<td colspan='2'>$paymentID</td>";
                        echo "<td colspan='2'>$programName</td>";
                        echo "<td colspan='2'>$instructorID</td>";
                        echo "</tr>";

                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>No Enrollments</td></tr>";
                }

                ?>

            </tbody>
        </table>
    </div>

    <a href="signup_program.php">Enroll in a program</a>

    <?php include('../html/footer.html'); ?>

</body>