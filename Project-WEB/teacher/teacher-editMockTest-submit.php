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
$mock_test_id = $_POST['mock_test_id'];
$teacher_id = $_POST['teacher_id'];
$teacher_name = $_POST['teacher_name'];
$course_name = $_POST['Course_name'];
$exam_name = $_POST['title'];
$submission_date = $_POST['submission_date'];
$submission_status = $_POST['submission_status'];
$exam_link = $_POST['link'];

// Update data in the database
$sql = "UPDATE mock_test SET 
        teacher_id='$teacher_id', 
        teacher_name='$teacher_name', 
        Course_name='$course_name', 
        title='$exam_name', 
        submission_date='$submission_date', 
        submission_status='$submission_status', 
        link='$exam_link' 
        WHERE mock_test_id='$mock_test_id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Mock test updated successfully.'); window.location.href = 'teacher-manageMockTest.php';</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
