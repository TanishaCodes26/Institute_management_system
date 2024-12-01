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
$std_id = $_POST['Std_id'];
$password = $_POST['Password'];
$email = $_POST['Email'];
$ph_no = $_POST['Ph_no'];
$address = $_POST['Address'];

// Initialize variables for new photo and sign
$new_photo = "";
$new_sign = "";

// Handle file uploads
if (!empty($_FILES['Photo']['name'])) {
    $photo = $_FILES['Photo']['name'];
    $photo_target = "../uploads/" . basename($photo);
    if (move_uploaded_file($_FILES['Photo']['tmp_name'], $photo_target)) {
        $new_photo = "Photo = '$photo', ";
    }
}

if (!empty($_FILES['sign']['name'])) {
    $sign = $_FILES['sign']['name'];
    $sign_target = "../uploads/" . basename($sign);
    if (move_uploaded_file($_FILES['sign']['tmp_name'], $sign_target)) {
        $new_sign = "Sign = '$sign', ";
    }
}

// Prepare the update statement
$sql = "UPDATE students_details SET $new_photo $new_sign Password = '$password', Email = '$email', Ph_no = '$ph_no', Address = '$address' WHERE Std_id = '$std_id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record updated successfully.'); window.location.href = 'student-profile.php';</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
