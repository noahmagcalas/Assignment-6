<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Member Info - Northern Kingdom Karate Academy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>

    <?php

    $sessID = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab';
    session_id($sessID);
    session_start();

    // boot users that arent admins
    if (!$_SESSION['admin']) {
        header("Location: logout.php");
        exit();
    }

    ?>

    <?php include('../html/header_alt.html'); ?>

    <h2 class="text-center">Instructors</h2>
    <div class="table-responsive">
        <table class="instructors table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col" colspan="6">Name</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include('connect.php');

                $query = "SELECT ID, InstructorName FROM Instructors";
                $result = $database->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $instructorID = $row["ID"];
                        $instructorName = $row["InstructorName"];

                        echo "<tr>";
                        echo "<th scope='row'>$instructorID</th>";
                        echo "<td colspan='6'>$instructorName</td>";
                        echo "<td><a class='delete btn btn-sm btn-outline-danger px-2 py-0' href='admin_action.php?instructorID=$instructorID'><i class='bi bi-trash-fill'></i></a></td>";
                        echo "</tr>";

                    }
                } else {
                    echo "No Instructors";
                }

                ?>

                <tr>
                    <th scope="row"></th>
                    <form action="admin_action.php" method="post">
                        <td colspan="6">
                            <input type="text" class="form-control" name="instructorName" placeholder="John Doe"
                                required></input>
                        </td>
                        <td colspan="2">
                            <span class="icon-input-btn">
                                <i class='bi bi-person-plus text-primary'></i>
                                <input class="btn btn-outline-primary" type="submit" value=""></input>
                            </span>
                        </td>
                    </form>
                </tr>

            </tbody>
        </table>
    </div>

    <br>

    <h2 class="text-center">Members</h2>
    <div class="table-responsive-md">
        <table class="members table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col" colspan="2">Username</th>
                    <th scope="col" colspan="2">Last Name</th>
                    <th scope="col" colspan="2">First Name</th>
                    <th scope="col" colspan="2">Phone #</th>
                    <th scope="col" colspan="2">Join Date</th>
                    <th scope="col" colspan="2">Password</th>
                    <th scope="col" colspan="1">Edit</th>
                </tr>
            </thead>
            <tbody>

                <?php

                include('connect.php');

                $query = "SELECT * FROM Members";
                $result = $database->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $memberID = $row["ID"];
                        $userName = $row["Username"];
                        $lastName = $row['Last_Name'];
                        $firstName = $row['First_Name'];
                        $phoneNumber = $row['Phone'];
                        $joinDate = $row['Date_Joined'];
                        $password = $row['Passwordd'];

                        echo "<tr>";
                        echo "<th scope='row'>$memberID</th>";
                        echo "<td colspan='2'>$userName</td>";
                        echo "<td colspan='2'>$lastName</td>";
                        echo "<td colspan='2'>$firstName</td>";
                        echo "<td colspan='2'>$phoneNumber</td>";
                        echo "<td colspan='2'>$joinDate</td>";
                        echo "<td colspan='2'>$password</td>";
                        echo "<td colspan='1'><a class='delete btn btn-sm btn-outline-danger px-2 py-0' href='admin_action.php?memberID=$memberID'><i class='bi bi-trash-fill'></i></a></td>";
                        echo "</tr>";

                    }
                } else {
                    echo "No Members";
                }

                ?>

                <tr>
                    <th scope="row"></th>
                    <form action="register_member.php" method="post">
                        <td colspan="2"><input type="text" class="form-control item" name="username"
                                placeholder="Username" required></input></td>
                        <td colspan="2"><input type="text" class="form-control item" name="lastname"
                                placeholder="Last name" required></td>
                        <td colspan="2"><input type="text" class="form-control item" name="firstname"
                                placeholder="First name" required></td>
                        <td colspan="2"><input type="tel" class="form-control item" name="phone"
                                placeholder="(000) 000-0000" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required></td>
                        <td colspan="2"><!-- date joined --></td>
                        <td colspan="2"><input type="password" class="form-control item" name="password1"
                                placeholder="Password" required></td>
                        <td colspan="1">
                            <span class="icon-input-btn">
                                <i class='bi bi-person-plus text-primary'></i>
                                <input class="btn btn-outline-primary" type="submit" value=""></input>
                            </span>
                        </td>
                    </form>
                </tr>

                <tr>
                    <form action="modify_member.php" method="post">
                        <td>
                            <select class="form-control form-select-md rounded-0 px-0" name="memberID" required>
                                <option disabled selected>ID</option>

                                <?php

                                include('connect.php');

                                $query = "SELECT ID FROM Members";
                                $result = $database->query($query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option>" . $row["ID"] . "</option>";
                                    }
                                } else {
                                    echo "<option disabled>No members found</option>";
                                }

                                $database->close();

                                ?>

                            </select>
                        </td>

                        <td colspan="2"><input type="text" class="form-control item" name="username"
                                placeholder="Username"></input></td>
                        <td colspan="2"><input type="text" class="form-control item" name="lastname"
                                placeholder="Last name"></td>
                        <td colspan="2"><input type="text" class="form-control item" name="firstname"
                                placeholder="First name"></td>
                        <td colspan="2"><input type="tel" class="form-control item" name="phone"
                                placeholder="(000) 000-0000" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"></td>
                        <td colspan="2"><input type="text" class="form-control item" name="joindate"
                                placeholder="Date joined"></td>
                        <td colspan="2"><input type="password" class="form-control item" name="password1"
                                placeholder="Password"></td>
                        <td colspan="1">
                            <span class="icon-input-btn">
                                <i class='bi bi-pencil text-secondary'></i>
                                <input class="btn btn-outline-secondary" type="submit" value=""></input>
                            </span>
                        </td>

                    </form>
                </tr>

            </tbody>
        </table>
    </div>

    <br>

    <h2 class="text-center">Search</h2>
    <div class="table-responsive">
        <table class="search table table-striped">
            <tbody>
                <tr>
                    <form action="admin.php" method="get">
                        <td colspan="2">
                            <input type="number" class="form-control item" name="searchid" placeholder="ID">
                        </td>

                        <td colspan="4">
                            <input type="text" class="form-control item" name="searchname" placeholder="Last name">
                        </td>

                        <td></td>

                        <td colspan="6">
                            <div class="d-flex flex-row-reverse">
                                <span class="icon-input-btn">
                                    <i class='bi bi-search text-secondary'></i>
                                    <input class="btn btn-outline-secondary" type="submit" value=""></input>
                                </span>
                            </div>
                        </td>

                    </form>
                </tr>

                <?php

                include('connect.php');

                $searchID = $_GET['searchid'];
                $searchLastName = $_GET['searchname'];

                $queries = array();

                if ($searchID) array_push($queries, "ID = $searchID");
                if ($searchLastName) array_push($queries, "Last_Name = '$searchLastName'");

                if (count($queries) <= 0) {
                    header("Location: admin.php");
                    exit();
                }

                $query = "SELECT * FROM Members WHERE (";
                for ($i = 0; $i < count($queries); $i++) {
                    if ($i != 0) $query .= " AND ";
                    $query .= $queries[$i];
                }
                $query .= ")";
                echo $query;
                $result = $database -> query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $memberID = $row["ID"];
                        $userName = $row["Username"];
                        $lastName = $row['Last_Name'];
                        $firstName = $row['First_Name'];
                        $phoneNumber = $row['Phone'];
                        $joinDate = $row['Date_Joined'];
                        $password = $row['Passwordd'];

                        echo "<tr>";
                        echo "<th scope='row'>$memberID</th>";
                        echo "<td colspan='2'>$userName</td>";
                        echo "<td colspan='2'>$lastName</td>";
                        echo "<td colspan='2'>$firstName</td>";
                        echo "<td colspan='2'>$phoneNumber</td>";
                        echo "<td colspan='2'>$joinDate</td>";
                        echo "<td colspan='2'>$password</td>";
                        echo "</tr>";

                    }
                } else {
                    echo "<tr><td colspan='13'>No results</td></tr>";
                }

                ?>

            </tbody>
        </table>
    </div>

</body>