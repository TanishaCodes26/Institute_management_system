<?php
session_start();

if (!isset($_SESSION['Std_id'])) {
    header("Location: /Project-WEB/home.php");
    exit();
}

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: -1");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

// Database configuration
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

// Assume student ID is stored in session after login
$student_id = $_SESSION['Std_id'];

$sql= "SELECT Course_name from students_details where Std_id='$student_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $course = $row['Course_name'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
    body {
        padding-top: 110px;
        padding-left: 300px;
        padding-right: 30px;
    }

    /* Welcome Section */
    .welcome-section {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 5px rgba(0, 0, 0, 0.5);
        background: linear-gradient(135deg, #2a2a72, #009ffd);
        padding: 10px 20px;
        width: 100%;
    }

    .welcome-text {
        flex: 1;
        color: white;
    }

    .welcome-text h1 {
        font-size: 2.2em;
        color: white;
        margin-bottom: 10px;
        margin-right: 5px;
        display: inline-block;
    }

    .welcome-text p {
        font-size: 1.2em;
        color: white;
    }

    .welcome-image {
        flex: 0.4;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .welcome-image img {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }



    .dashboard {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
    }

    .left-section {
        width: 58%;
    }

    .table-details {
        width: 100%;
        margin: auto;
        background: linear-gradient(135deg, #f4ffd4, #f5f5dc);
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .right-section {
        width: 40%;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background: linear-gradient(135deg, #f0f4f8, #c2e9fb);
    }

    ul {
        list-style-type: none;
    }

    li {
        line-height: 3;
        border-bottom: 1px solid black;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin-bottom: 10px;
        border-radius: 10px;
        padding: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid black;
    }

    th {
        background-color: #4cafbe;
        color: white;
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
        <div class="welcome-section">
            <?php
        // Fetch student data from database
        $sql = "SELECT Std_Name, Photo FROM students_details WHERE Std_id = '$student_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $student_name = $row['Std_Name'];
            $student_photo = $row['Photo'];
        }
        ?>
            <!-- Left Section: Welcome Text -->
            <div class="welcome-text">
                <h1>Welcome Back,<h1 style="color: yellow;"><?php echo htmlspecialchars($student_name); ?>!</h1>
                </h1>
                <p>Always stay updated in your student portal.</p>
            </div>

            <!-- Right Section: Student Photo -->
            <div class="welcome-image">
                <img src="/Project-WEB/uploads/<?php echo htmlspecialchars($student_photo); ?>" alt="Student Photo">
            </div>
        </div>

        <div class="dashboard">
            <div class="left-section">
                <!-- Class Schedule Table -->
                <div class="table-details">
                    <h3>Class Schedule</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Teacher Name</th>
                                <th>Topic</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql= "SELECT teacher_name, topic_name, class_date, class_time from classes where Course_name='$course' limit 2";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) { 
                                while ($row = $result->fetch_assoc()) { 
                                    echo "<tr> 
                                    <td>{$row['teacher_name']}</td> 
                                    <td>{$row['topic_name']}</td> 
                                    <td>{$row['class_date']}</td> 
                                    <td>{$row['class_time']}</td> </tr>"; 
                                }
                            } 
                            else { 
                                echo "<tr><td colspan='4'>No schedule available</td></tr>"; 
                            } 
                            ?>
                        </tbody>
                    </table> <!-- Mock Test Table -->
                </div>
                <div class="table-details">
                    <h3>Mock Tests</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Exam Title</th>
                                <th>Submission Date</th>
                                <th>Submission Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql= "SELECT * from mock_test where Course_name='$course' limit 2";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) { 
                               while ($row = $result->fetch_assoc()) { 
                                    echo "<tr> 
                                    <td>{$row['title']}</td> 
                                    <td>{$row['submission_date']}</td> 
                                    <td>{$row['submission_status']}</tr>"; 
                                } 
                            } 
                            else { 
                                echo "<tr><td colspan='3'>No mock test data available</td></tr>"; 
                            } 
                            ?>
                        </tbody>
                    </table> <!-- Recent Results Table -->
                </div>
                <div class="table-details">
                    <h3>Recent Results</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Exam Title</th>
                                <th>Marks</th>
                                <th>Percentage</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql= "SELECT title, marks, persentage, grade_date from grades where Course_name='$course' limit 2";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) { 
                                while ($row = $result->fetch_assoc()) { 
                                    echo "<tr> 
                                    <td>{$row['title']}</td> 
                                    <td>{$row['marks']}</td> 
                                    <td>{$row['persentage']}</td> 
                                    <td>{$row['grade_date']}</td> </tr>"; 
                                } 
                            } 
                            else { 
                                echo "<tr><td colspan='4'>No recent results available</td></tr>"; 
                            } 
                            ?>
                        </tbody>
                    </table> <!-- Current Course and Attendance Table -->
                </div>
                <div class="table-details">
                    <h3>Current Course & Attendance</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Join Date</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql= "SELECT Course_name, join_date, Attendance from students_details where Std_id='$student_id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc(); 
                                    echo "<tr> 
                                    <td>{$row['Course_name']}</td> 
                                    <td>{$row['join_date']}</td> 
                                    <td>{$row['Attendance']}%</td> </tr>";
                            } 
                            else { 
                                echo "<tr><td colspan='3'>No current course data available</td></tr>"; 
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="right-section">
                <h3>Notices</h3>
                <ul>
                    <?php 
                        $sql= "SELECT notice_date, content FROM notice ORDER BY notice_date DESC LIMIT 10";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) { 
                            while ($row = $result->fetch_assoc()) { 
                                echo "<li>{$row['notice_date']}: {$row['content']}</li>"; 
                            } 
                        } 
                        else { echo "<li>No notices available</li>"; 
                        } 
                        $conn->close();
                        ?>
                </ul>
            </div>
        </div>
    </main>
    <br>
    <?php include 'student-portal-footer.php'; ?>

</body>

</html>