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
$student_name = $anonymous ? 'Anonymous' : $_POST['Std_name'];
$course_name = $_POST['Course_name'];
$rating = $_POST['rating'];
$course_content = $_POST['course_content'];
$teacher_communication = $_POST['teacher_communication'];
$concept_understanding = $_POST['concept_understanding'];
$suggestions = $_POST['suggestions'];
$comments = $_POST['comments'];
$date = date('Y-m-d'); // Set the current date

// Insert feedback data into the database
$sql = "INSERT INTO student_feedback (Std_name, Course_name, rating, course_content, teacher_communication, concept_understanding, suggestions, comments, feedback_date) 
        VALUES ('$student_name', '$course_name', '$rating', '$course_content', '$teacher_communication', '$concept_understanding', '$suggestions', '$comments', '$date')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Feedback submitted successfully.'); window.location.href = 'student-feedback.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>
