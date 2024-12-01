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
$teacher_id = $_POST['teacher_id'];
$password = $_POST['Password'];
$email = $_POST['Email'];
$ph_no = $_POST['Ph_no'];
$address = $_POST['Address'];
$qualification = $_POST['Qualification'];
$experience = $_POST['Experience'];

// Initialize variables for new photo and sign
$new_photo = "";
$new_sign = "";

// Handle file uploads
if (!empty($_FILES['Photo']['name'])) {
    $photo = $_FILES['Photo']['name'];
    $photo_target = "../uploads/" . basename($photo);
    if (move_uploaded_file($_FILES['Photo']['tmp_name'], $photo_target)) {
        $new_photo = "Photo = '$photo', ";
    } else {
        echo "Error uploading photo.<br>";
    }
}

if (!empty($_FILES['sign']['name'])) {
    $sign = $_FILES['sign']['name'];
    $sign_target = "../uploads/" . basename($sign);
    if (move_uploaded_file($_FILES['sign']['tmp_name'], $sign_target)) {
        $new_sign = "Sign = '$sign', ";
    } else {
        echo "Error uploading sign.<br>";
    }
}

// Debugging: Print the SQL query
$sql = "UPDATE teachers SET $new_photo $new_sign Password = '$password', Email = '$email', Ph_no = '$ph_no', Address = '$address', Qualification = '$qualification', Experience = '$experience' WHERE teacher_id = '$teacher_id'";
echo "SQL Query: $sql<br>";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record updated successfully.'); window.location.href = 'teacher-profile.php';</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
