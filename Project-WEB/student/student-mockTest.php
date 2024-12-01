<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "institue_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$student_id = $_SESSION['Std_id'];

// Query to fetch course details and corresponding teacher
$sql1 = "SELECT Course_name from students_details where Std_id='$student_id'";
$data= $conn->query($sql1);

if ($data->num_rows > 0) {
    $row = $data->fetch_assoc();
    $course = $row['Course_name'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mock-Test</title>
    <style>
    body {
        padding-top: 110px;
        padding-left: 300px;
        padding-right: 30px;

    }

    .container {
        width: 100%;
        margin: auto;
        background: linear-gradient(135deg, #f4ffd4, #f5f5dc);
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h2 {
        text-align: center;
        color: black;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th,
    td {
        text-align: center;
        padding: 12px;
        border-bottom: 1px solid black;
    }

    th {
        background-color: #4cafbe;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    </style>
</head>

<body>
<?php include 'student-portal-header.php'; ?>
<main>
    <div class="container">
        <h2>Student Mock-Test Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Exam Name</th>
                    <th>Submission Date</th>
                    <th>Link</th>
                    <th>Submission Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql= "SELECT * from mock_test where Course_name='$course'";
                $result= $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                            echo "<tr>
                            <td>" . $row['Course_name'] . "</td>
                            <td>" . $row['title'] . "</td>
                            <td>" . $row['submission_date'] . "</td>
                            <td><a href=".$row['link'].">Exam link</a></td>
                            <td>" . $row['submission_status'] . "</td>
                            </tr>";
                    }
                } 
                else {
                    echo "<tr><td colspan='5'>No Mock-Test found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</main>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include 'student-portal-footer.php'; ?>
</body>

</html>