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
$course_name = $_POST['Course_Name'];
$class_date = $_POST['class_date'];
$class_time = $_POST['class_time'];
$topic_name = $_POST['topic_name'];
$class_status = $_POST['class_status'];
$date = date('Y-m-d');

// Insert data into the database
$sql = "INSERT INTO classes (teacher_id, teacher_name, Course_Name, class_date, class_time, topic_name, class_status, set_date) 
        VALUES ('$teacher_id', '$teacher_name', '$course_name', '$class_date', '$class_time', '$topic_name', '$class_status', $date')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Class schedule added successfully.'); window.location.href = 'teacher-manageClasses.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>
