<?php
// Start session
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "institue_data";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the form data
$teacher_id = $_POST['teacher_id'];
$password = $_POST['Password'];

// Query to select the student's details
$sql = "SELECT teacher_Name FROM teachers WHERE teacher_id = '$teacher_id' AND Password = '$password'";
$result = $conn->query($sql);

// Check if the credentials match
if ($result->num_rows > 0) {
    // Fetch the student's name
    $row = $result->fetch_assoc();
    $teacher_name = $row['teacher_Name'];

    // Store student ID and name in session
    $_SESSION['teacher_id'] = $teacher_id;
    $_SESSION['Password'] = $password;

    // If login is successful, show an alert with the student's name and redirect to the dashboard
    echo "<script>alert('Login successful! Welcome, $teacher_name'); window.location.href = 'teacher-dashboard.php';</script>";
} else {
    // If login fails, show an error message
    echo "<script>alert('Invalid ID or Password. Please try again.'); window.location.href = 'teacher-login.php';</script>";
}

// Close the database connection
$conn->close();
?>
