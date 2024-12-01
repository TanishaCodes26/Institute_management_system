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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
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
            <h2>Student Result Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Total Marks</th>
                        <th>Marks Obtained</th>
                        <th>Percentage</th>
                        <th>Grade</th>
                        <th>Result (PDF)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $sql= "SELECT * from results WHERE Std_id='$student_id'";
                $result= $conn->query($sql);
                if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>" . $row['Course_name'] . "</td>
                            <td>" . $row['marks'] . "</td>
                            <td>" . $row['obtained'] . "</td>
                            <td>" . $row['percentage'] . "%</td>
                            <td>" . $row['grade'] . "</td>
                            <td><a href='../uploads/" . $row['result'] . "' target='_blank'>Download PDF</a></td>
                            <td>" . $row['result_date'] . "</td>
                        </tr>";
                    }
                } 
                else {
                    echo "<tr><td colspan='7'>No results found</td></tr>";
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