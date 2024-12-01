<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "institue_data";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$teacher_id = $_SESSION['teacher_id'];

$sql = "SELECT teacher_name, Photo FROM teachers WHERE teacher_id = '$teacher_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $teacher_name = $row['teacher_name'];
    $photo = $row['Photo'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    body {
        padding-top: 110px;
        padding-left: 300px;
        padding-right: 30px;
    }

    .dashboard-container {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin: auto;
        background: linear-gradient(to bottom right, #ffffff, #e3f2fd);
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    .info-section {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 20px;
        width: 70%;
    }

    .welcome-section h2 {
        color: #3f51b5;
        font-size: 2em;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .welcome-section .tagline {
        font-size: 1.2em;
        color: #1e88e5;
        margin: 10px 0;
        font-style: italic;
    }

    .info-section img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .button-container {
        width: 30%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .button-container a {
        padding: 12px 25px;
        background-color: #3f51b5;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-size: 1em;
        text-align: center;
        width: 40%;
        transition: all 0.3s ease;
    }

    .button-container a:hover {
        background-color: #5c6bc0;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
    .table-container { 
        display: flex; 
        justify-content: space-between; 
        margin-top: 30px; 
    } 
    .table-wrapper { 
        flex: 1; 
        margin: 10px;
        background: linear-gradient(135deg, #f4ffd4, #f5f5dc);
        padding: 20px;
        border-radius: 8px;
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

    td {
        font-size: .9em;
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
    <?php include 'teacher-header.php'; ?>
    <div class="dashboard-container">
        <div class="info-section">
            <img src="../uploads/<?= htmlspecialchars($photo); ?>" alt="Teacher Photo">
            <div class="welcome-section">
                <h2>Welcome, <?= htmlspecialchars($teacher_name); ?>!</h2>
                <p class="tagline">"Every lesson you teach plants a seed of knowledge and inspiration."</p>
            </div>
        </div>
        <div class="button-container">
            <a href="teacher-addClasses.php">Schedule Classes</a>
            <a href="teacher-addMockTest.php">Set MockTest</a>
            <a href="teacher-addGrade.php">Assign Grade</a>
            <a href="teacher-addAttendance.php">Take Attendance</a>
        </div>
    </div>
    <div class="table-container">
        <div class="table-wrapper">
            <h3>Scheduled Classes</h3>
            <table>
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Class Date</th>
                        <th>Time</th>
                        <th>Topic</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql_classes = "SELECT Course_name, class_date, class_time, topic_name, class_status 
                        FROM classes 
                        WHERE teacher_id='$teacher_id' AND class_status='Pending' 
                        ORDER BY class_date DESC";
                        $result_classes = $conn->query($sql_classes);
                        if ($result_classes->num_rows > 0) {
                            while ($row = $result_classes->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row['Course_name'] . "</td>
                                    <td>" . $row['class_date'] . "</td>
                                    <td>" . $row['class_time'] . "</td>
                                    <td>" . $row['topic_name'] . "</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No pending classes scheduled</td></tr>";
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="table-wrapper">
            <h3>Mock Tests</h3>
            <table>
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Exam Name</th>
                        <th>Submission Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql_mocktests = "SELECT Course_name, title, submission_date 
                        FROM mock_test 
                        WHERE teacher_id='$teacher_id' AND submission_status='Pending' 
                        ORDER BY submission_date DESC";
                        $result_mocktests = $conn->query($sql_mocktests);
                        if ($result_mocktests->num_rows > 0) {
                            while ($row = $result_mocktests->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row['Course_name'] . "</td>
                                    <td>" . $row['title'] . "</td>
                                    <td>" . $row['submission_date'] . "</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No pending mock tests</td></tr>";
                        }
                        $conn->close();
                        ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <?php include 'teacher-footer.php'; ?>
</body>

</html>
