<?php
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
session_start();
$student_id = $_SESSION['Std_id'];

// Fetch student data from the database
$sql = "SELECT * FROM students_details WHERE Std_id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
} else {
    echo "No student found.";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <style>
    body {
        padding-top: 110px;
        padding-left: 300px;
        padding-right: 30px;
    }

    .profile-container {
        background: linear-gradient(to right, #f0f4f8, #c2e9fb);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    .profile-container h2 {
        font-size: 2em;
        text-align: center;
    }

    .profile-container a {
        text-decoration: none;
        color: black;
        font-size: 1.3em;
        background-color: rgb(172, 205, 234);
        padding: 10px;
        border-radius: 10px;
    }

    .profile-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .profile-table td {
        border: 1px solid black;
        padding: 10px;
        text-align: left;
        width: 50%;
        font-size: 1.1em;
    }

    .profile-table th {
        font-weight: bold;
        width: 20%;
        border: 1px solid black;
        padding: 10px;
        text-align: left;
        font-size: 1.2em;
    }

    .profile-photo {
        position: relative;
        left: 20%;
        width: 200px;
        height: 200px;
        object-fit: cover;
    }

    .profile-sign {
        position: relative;
        left: 20%;
        width: 200px;
        height: 80px;
    }
    </style>
</head>

<body>
    <?php include 'student-portal-header.php'; ?>
    <main>
        <div class="profile-container">

            <h2>Student Profile</h2>
            <a href="student-profileEdit.php">Edit</a>
            <table class="profile-table">
                <tr>
                    <th>Student ID</th>
                    <td><?php echo htmlspecialchars($student['Std_id']); ?></td>
                    <td rowspan="7"><img src="/Project-WEB/uploads/<?php echo htmlspecialchars($student['Photo']); ?>"
                            alt="Student Photo" class="profile-photo"></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo htmlspecialchars($student['Std_name']); ?></td>
                </tr>
                <tr>
                    <th>Father's Name</th>
                    <td><?php echo htmlspecialchars($student['Father_name']); ?></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><?php echo htmlspecialchars($student['Ph_no']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($student['Email']); ?></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td><?php echo htmlspecialchars($student['DOB']); ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo htmlspecialchars($student['Gender']); ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo htmlspecialchars($student['Address']); ?></td>
                    <td rowspan="4"> <img src="/Project-WEB/uploads/<?php echo htmlspecialchars($student['sign']); ?>"
                            alt="Student Signature" class="profile-sign"></td>
                </tr>
                <tr>
                    <th>Current Course</th>
                    <td><?php echo htmlspecialchars($student['Course_name']); ?></td>
                </tr>
                <tr>
                    <th>Course Fees</th>
                    <td><?php echo htmlspecialchars($student['Fees']); ?></td>
                </tr>
                <tr>
                    <th>Date of Joining</th>
                    <td><?php echo htmlspecialchars($student['join_date']); ?></td>
                </tr>
            </table>
        </div>
    </main>
    <br><br><br><br><br>
    <?php include 'student-portal-footer.php'; ?>
</body>

</html>