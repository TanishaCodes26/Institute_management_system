<?php
session_start();

if (!isset($_SESSION['Admin_id'])) {
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

// Total Students
$sql = "SELECT COUNT(*) AS total_students FROM students_details";
$result = $conn->query($sql);
$total_students = $result->fetch_assoc()['total_students'];

// Total Teachers
$sql = "SELECT COUNT(*) AS total_teachers FROM teachers";
$result = $conn->query($sql);
$total_teachers = $result->fetch_assoc()['total_teachers'];

// Total Courses
$sql = "SELECT COUNT(*) AS total_courses FROM course_details";
$result = $conn->query($sql);
$total_courses = $result->fetch_assoc()['total_courses'];

// Total Revenue
$sql = "SELECT SUM(amount) AS total_revenue FROM payments";
$result = $conn->query($sql);
$total_revenue = $result->fetch_assoc()['total_revenue'];

// Total Expenses
$sql = "SELECT SUM(amount) AS total_expenses FROM expenses";
$result = $conn->query($sql);
$total_expenses = $result->fetch_assoc()['total_expenses'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
    body {
        padding-top: 110px;
        padding-left: 300px;
        padding-right: 30px;
        background: linear-gradient(135deg, #f2f4f7, #d7e3fc);
        font-family: Arial, sans-serif;
    }

    .dashboard-container {
        width: 100%;
        background: linear-gradient(135deg, #ffffff, #e3f2fd);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        display: flex;
        padding: 20px;
        justify-content: space-between;
    }

    .welcome-section {
        width: 60%;
        padding: 20px;
        background: linear-gradient(135deg, #e3fdfd, #ffe4e1);
        border-radius: 10px;
        margin-right: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .welcome-section h2 {
        margin: 0;
        font-size: 24px;
        color: #01579b;
    }

    .welcome-section p {
        font-size: 18px;
        color: #0277bd;
    }

    .action-buttons {
        width: 40%;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .action-buttons button {
        width: 48%;
        padding: 15px 10px;
        color: white;
        background: linear-gradient(135deg, #0288d1, #039be5);
        border: none;
        border-radius: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .action-buttons button:hover {
        background: linear-gradient(135deg, #01579b, #0277bd);
    }

    .section {
        display: flex;
        margin-top: 30px;
    }

    .latest-admissions {
        width: 50%;
        background: #e3f2fd;
        padding: 20px;
        border-radius: 10px;
        margin-right: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .latest-admissions h3 {
        margin-top: 0;
        color: #0277bd;
    }

    .counts {
        width: 50%;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .count-box {
        color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        min-width: 150px;
        height: 150px;
    }

    .count-box h4 {
        margin: 0;
        font-size: 24px;
    }

    .count-box p {
        margin: 10px 0 0;
        font-size: 18px;
    }

    .birthday-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .birthday-box {
        background: #e3f2fd;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        flex: 1;
        max-width: 200px;
    }

    .birthday-box h3 {
        margin-top: 0;
        color: #0277bd;
    }

    .birthday-box img {
        border-radius: 50%;
        margin-top: 10px;
    }

    .birthday-box p {
        margin: 10px 0 0;
        color: #01579b;
        font-weight: bold;
    }

    #no-birthday {
        background-color: bisque;
        width: 250px;
        height: 60px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, .2);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border-bottom: 1px solid black;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        background: #0277bd;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #d7dbde;
    }
    </style>
</head>

<body>
    <?php include 'admin-header.php'; ?>
    <main>
        <div class="dashboard-container">
            <div class="welcome-section">
                <h2>Welcome, Admin!</h2>
                <p>Your diligent work ensures everything runs smoothly.</p>
            </div>
            <div class="action-buttons">
                <button onclick="window.location.href='admin-addStudent.php'">Add Student</button>
                <button onclick="window.location.href='admin-addTeacher.php'">Add Teacher</button>
                <button onclick="window.location.href='admin-addCourse.php'">Add Course</button>
                <button onclick="window.location.href='admin-addNotice.php'">Add Notice</button>
            </div>
        </div>
        <div class="section">
            <div class="latest-admissions">
                <h3>Latest Student Admissions</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Admission Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT Std_name, Course_name, join_date FROM students_details ORDER BY join_date DESC LIMIT 5";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                <td>" . $row['Std_name'] . "</td>
                                <td>" . $row['Course_name'] . "</td>
                                <td>" .$row['join_date'] . "</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No recent admissions</td></tr>";
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="counts">
                <div class="count-box" style="background: #4caf50;">
                    <h4><?php echo $total_students; ?></h4>
                    <p>Total Students</p>
                </div>
                <div class="count-box" style="background: #ff9800;">
                    <h4><?php echo $total_teachers; ?></h4>
                    <p>Total Teachers</p>
                </div>
                <div class="count-box" style="background: #03a9f4;">
                    <h4><?php echo $total_courses; ?></h4>
                    <p>Total Courses</p>
                </div>
                <div class="count-box" style="background: #8bc34a;">
                    <h4><?php echo $total_revenue; ?></h4>
                    <p>Total Revenue</p>
                </div>
                <div class="count-box" style="background: #f44336;">
                    <h4><?php echo $total_expenses; ?></h4>
                    <p>Total Expenses</p>
                </div>
                <div class="birthday-container">
                    <?php
                $today = date("Y-m-d");

                // Query to fetch students whose birthdays are today
                $sql = "SELECT Std_Name, Photo FROM students_details WHERE DATE_FORMAT(DOB, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='birthday-box'>";
                        echo "<h3>Happy Birthday</h3>";
                        echo "<img src='../uploads/" . $row['Photo'] . "' alt='Student Photo' width='50' height='50'>";
                        echo "<p>" . $row['Std_Name'] . "</p>";
                        echo "</div>";
                    }
                } 
                else {
                    echo "<p id='no-birthday'>No birthdays today</p>";
                }
                $conn->close();
                ?>
                </div>

            </div>
        </div>
        </div>

    </main>
    <br>
    <?php include 'admin-footer.php'; ?>
</body>

</html>