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

// Retrieve the grade ID from the URL
$grade_id = $_GET['id'];

// Prepare the delete statement
$sql = "DELETE FROM grades WHERE grade_id='$grade_id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Grade deleted successfully.'); window.location.href = 'teacher-manageGrade.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
