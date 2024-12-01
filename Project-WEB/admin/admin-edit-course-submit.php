<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "institue_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$course_id = $_POST['Course_id'];
$course_name = $_POST['Course_Name'];
$fees = $_POST['Fees'];
$duration = $_POST['Duration'];
$start_date = $_POST['Start_date'];
$teacher_name = $_POST['teacher_name'];

// Initialize variable for new syllabus
$new_syllabus = "";

// Handle file upload for new syllabus
if (!empty($_FILES['Syllabus']['name'])) {
    $syllabus = $_FILES['Syllabus']['name'];
    $syllabus_target = "../uploads/" . basename($syllabus);
    if (move_uploaded_file($_FILES['Syllabus']['tmp_name'], $syllabus_target)) {
        $new_syllabus = "Syllabus = '$syllabus', ";
    } else {
        echo "Error uploading syllabus file.<br>";
    }
}

// Prepare the update statement
$sql = "UPDATE course_details SET 
        Course_Name = '$course_name', 
        Fees = '$fees', 
        Duration = '$duration', 
        $new_syllabus
        Start_date = '$start_date', 
        teacher_name = '$teacher_name' 
        WHERE Course_id = '$course_id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Course details updated successfully.'); window.location.href = 'admin-manageCourse.php';</script>";
} else {
    echo "Error updating course: " . $conn->error;
}

// Close the connection
$conn->close();
?>
