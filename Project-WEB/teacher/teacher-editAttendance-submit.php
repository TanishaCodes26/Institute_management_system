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

session_start();
$id = $_POST['teacher_id'];
$teacher_name = $_POST['teacher_name'];
$course_name = $_POST['Course_name'];
$attendance_id = $_POST['attendance_id'];

// Retrieve student IDs and their attendance status from the form
$attendance_data = [];
foreach ($_POST as $key => $value) {
    if (strpos($key, 'attendance_') === 0) {
        $student_id = str_replace('attendance_', '', $key);
        $attendance_data[] = [
            'Std_id' => $student_id,
            'status' => $value
        ];
    }
}

// Update attendance data in the database
foreach ($attendance_data as $attendance) {
    $student_id = $attendance['Std_id'];
    $status = $attendance['status'];

    // Fetch student name from the database
    $student_sql = "SELECT Std_name FROM students_details WHERE Std_id='$student_id'";
    $student_result = $conn->query($student_sql);
    if ($student_result->num_rows > 0) {
        $student_row = $student_result->fetch_assoc();
        $student_name = $student_row['Std_name'];
    }

    // Calculate total attendance percentage
    $total_sql = "SELECT COUNT(*) as total_classes FROM student_attendance WHERE Std_id='$student_id' AND Course_name='$course_name'";
    $total_result = $conn->query($total_sql);
    $total_row = $total_result->fetch_assoc();
    $total_classes = $total_row['total_classes'];

    $present_sql = "SELECT COUNT(*) as present_classes FROM student_attendance WHERE Std_id='$student_id' AND Course_name='$course_name' AND status='Present'";
    $present_result = $conn->query($present_sql);
    $present_row = $present_result->fetch_assoc();
    $present_classes = $present_row['present_classes'] + ($status == 'Present' ? 1 : 0);

    if ($total_classes > 0) {
        $attendance_percentage = ($present_classes / $total_classes) * 100;
    } else {
        $attendance_percentage = 0; // Handle division by zero
    }

    // Update attendance data
    $update_sql = "UPDATE student_attendance SET 
                   teacher_id='$id', 
                   teacher_name='$teacher_name', 
                   Std_id='$student_id', 
                   Std_name='$student_name', 
                   Course_name='$course_name',  
                   status='$status', 
                   attendance='$attendance_percentage'
                   WHERE attendance_id='$attendance_id'";

    if ($conn->query($update_sql) !== TRUE) {
        echo "Error: " . $conn->error;
    }
}

echo "<script>alert('Attendance updated successfully.'); window.location.href = 'teacher-manageAttendance.php';</script>";

// Close the connection
$conn->close();
?>
