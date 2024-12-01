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

// Retrieve the mock test ID from the URL
$mock_test_id = $_GET['id'];

// Prepare the delete statement
$sql = "DELETE FROM mock_test WHERE mock_test_id='$mock_test_id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Mock test deleted successfully.'); window.location.href = 'teacher-manageMockTest.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
