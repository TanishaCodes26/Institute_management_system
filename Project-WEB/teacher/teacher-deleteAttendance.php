<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "institue_data";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the attendance ID from the URL
$attendance_id = $_GET['id'];

// Prepare the delete statement
$sql = "DELETE FROM student_attendance WHERE attendance_id='$attendance_id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Attendance record deleted successfully.'); window.location.href = 'teacher-manageAttendance.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
