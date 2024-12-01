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
$anonymous = isset($_POST['anonymous']) ? 1 : 0;
$teacher_name = $_POST['teacher_name'];
$course_name = $_POST['Course_name'];
$rating = $_POST['satisfaction'];
$problems_faced = $_POST['problems'];
$suggestions = $_POST['suggestions'];
$comments = $_POST['comments'];
$date = date('Y-m-d'); // Set the current date

// Insert feedback data into the database
$sql = "INSERT INTO teacher_feedback (teacher_name, Course_name, satisfaction, problems, suggestions, comments, feedback_date) 
        VALUES ('$teacher_name', '$course_name', '$rating', '$problems_faced', '$suggestions', '$comments', '$date')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Feedback submitted successfully.'); window.location.href = 'teacher-feedback.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>
