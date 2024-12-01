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
$class_id = $_POST['class_id'];
$teacher_id = $_POST['teacher_id'];
$teacher_name = $_POST['teacher_name'];
$course_name = $_POST['Course_Name'];
$class_date = $_POST['class_date'];
$class_time = $_POST['class_time'];
$topic_name = $_POST['topic_name'];
$class_status = $_POST['class_status'];

// Update data in the database
$sql = "UPDATE classes SET 
        teacher_id='$teacher_id', 
        teacher_name='$teacher_name', 
        course_name='$course_name', 
        class_date='$class_date', 
        class_time='$class_time', 
        topic_name='$topic_name', 
        class_status='$class_status' 
        WHERE class_id='$class_id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Class schedule updated successfully.'); window.location.href = 'teacher-manageClasses.php';</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
