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
$grade_id = $_POST['grade_id'];
$teacher_id = $_POST['teacher_id'];
$teacher_name = $_POST['teacher_name'];
$student_id = $_POST['Std_id'];
$student_name = $_POST['Std_Name'];
$course_name = $_POST['Course_name'];
$exam_name = $_POST['title'];
$total_marks = $_POST['total_marks'];
$marks_obtained = $_POST['marks'];
$percentage = $_POST['persentage'];


// Update data in the database
$sql = "UPDATE grades SET 
        teacher_id='$teacher_id', 
        teacher_name='$teacher_name', 
        Std_id='$student_id', 
        Std_Name='$student_name', 
        Course_name='$course_name', 
        title='$exam_name', 
        total_marks='$total_marks', 
        marks='$marks_obtained', 
        persentage='$percentage'
        WHERE grade_id='$grade_id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Grade updated successfully.'); window.location.href = 'teacher-manageGrade.php';</script>";
} else {
    echo "Error updating record: " . $conn->error . "<br>SQL: " . $sql;
}

// Close the connection
$conn->close();
?>
