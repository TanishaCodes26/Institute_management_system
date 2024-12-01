<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "institue_data"; // Make sure this is the correct database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$id = $_SESSION['teacher_id'];

$sql = "SELECT teacher_name FROM teachers WHERE teacher_id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $teacher_name = $row['teacher_name'];
}

// Retrieve form data
$teacher_id = $_POST['teacher_id'];
$teacher_name = $_POST['teacher_name'];
$student_id = $_POST['Std_id'];
$student_name = $_POST['Std_name'];
$course_name = $_POST['Course_name'];
$total_marks = $_POST['marks'];
$marks_obtained = $_POST['obtain'];
$percentage = $_POST['percentage'];
$grade = $_POST['grade'];
$date = date('Y-m-d');

// Handle file upload for result PDF
$result_pdf = "";
if (!empty($_FILES['result']['name'])) {
    $result_pdf = $_FILES['result']['name'];
    $result_target = "../uploads/" . basename($result_pdf);
    if (!move_uploaded_file($_FILES['result']['tmp_name'], $result_target)) {
        die("Error uploading result PDF file.");
    }
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO results (Std_id, Std_name, teacher_id, teacher_name, Course_name, marks, obtain, percentage, grade, result, result_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issiiisssss", $student_id, $student_name, $teacher_id, $teacher_name, $course_name, $total_marks, $marks_obtained, $percentage, $grade, $result_pdf, $date);

// Execute the statement
if ($stmt->execute()) {
    echo "<script>alert('Result added successfully.'); window.location.href = 'teacher-manageResult.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
