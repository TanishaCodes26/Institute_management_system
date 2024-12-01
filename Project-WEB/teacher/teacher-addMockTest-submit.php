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

// Retrieve form data
$teacher_id = $_POST['teacher_id'];
$teacher_name = $_POST['teacher_name'];
$course_name = $_POST['Course_name'];
$exam_name = $_POST['title'];
$submission_date = $_POST['submission_date'];
$submission_status = $_POST['submission_status'];
$exam_link = $_POST['link'];
$date = date('Y-m-d');

// Insert data into the database
$sql = "INSERT INTO mock_test (teacher_id, teacher_name, Course_name, title, submission_date, submission_status, link, mock_test_date) 
        VALUES ('$teacher_id', '$teacher_name', '$course_name', '$exam_name', '$submission_date', '$submission_status', '$exam_link', '$date')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Mock test added successfully.'); window.location.href = 'teacher-manageMockTest.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>
