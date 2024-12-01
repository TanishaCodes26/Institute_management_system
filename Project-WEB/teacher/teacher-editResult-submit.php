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
$result_id = $_POST['result_id'];
$teacher_id = $_POST['teacher_id'];
$teacher_name = $_POST['teacher_name'];
$student_id = $_POST['Std_id'];
$student_name = $_POST['Std_name'];
$course_name = $_POST['Course_name'];
$total_marks = $_POST['marks'];
$marks_obtained = $_POST['obtain'];
$percentage = $_POST['percentage'];
$grade = $_POST['grade'];

// Handle file upload for result PDF
$new_result_pdf = "";
if (!empty($_FILES['result']['name'])) {
    $new_result_pdf = $_FILES['result']['name'];
    $result_target = "../uploads/" . basename($new_result_pdf);
    if (!move_uploaded_file($_FILES['result']['tmp_name'], $result_target)) {
        die("Error uploading result PDF file.");
    }
}

// Prepare the update statement
$sql = "UPDATE results SET 
            Std_id = '$student_id', 
            Std_name = '$student_name', 
            teacher_id = '$teacher_id', 
            teacher_name = '$teacher_name', 
            Course_name = '$course_name', 
            marks = '$total_marks', 
            obtain = '$marks_obtained', 
            percentage = '$percentage', 
            grade = '$grade'";

if ($new_result_pdf) {
    $sql .= ", result = '$new_result_pdf'";
}

$sql .= " WHERE result_id = '$result_id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Result updated successfully.'); window.location.href = 'teacher-manageResult.php';</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
