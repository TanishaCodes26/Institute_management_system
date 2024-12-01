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
$student_id = $_POST['Std_id'];
$password = $_POST['Password'];

// Query to select the student's details
$sql = "SELECT Std_Name FROM students_details WHERE Std_id = '$student_id' AND Password = '$password'";
$result = $conn->query($sql);

// Check if the credentials match
if ($result->num_rows > 0) {
    // Fetch the student's name
    $row = $result->fetch_assoc();
    $student_name = $row['Std_Name'];

    // Store student ID and name in session
    $_SESSION['Std_id'] = $student_id;
    $_SESSION['Password'] = $password;

    // If login is successful, show an alert with the student's name and redirect to the dashboard
    echo "<script>alert('Login successful! Welcome, $student_name'); window.location.href = 'student-dashboard.php';</script>";
} else {
    // If login fails, show an error message
    echo "<script>alert('Invalid ID or Password. Please try again.'); window.location.href = 'student-login.php';</script>";
}

// Close the database connection
$conn->close();
?>
