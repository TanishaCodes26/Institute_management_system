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
$admin_id = $_POST['Admin_id'];
$password = $_POST['Password'];
$name = $_POST['name'];
$email = $_POST['Email_id'];
$ph_no = $_POST['Ph_no'];
$address = $_POST['Address'];
$institute_name = $_POST['institute_name'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$youtube = $_POST['youtube'];
$linkedin = $_POST['linkdin'];

$new_logo = "";

// Handle file uploads
if (!empty($_FILES['institute_logo']['name'])) {
    $logo = $_FILES['institute_logo']['name'];
    $logo_target = "../uploads/" . basename($logo);
    if (move_uploaded_file($_FILES['institute_logo']['tmp_name'], $logo_target)) {
        $new_logo = "institute_logo = '$logo', ";
    }
}

// Prepare the update statement
$sql = "UPDATE admin_details SET Password=?, name=?, Email_id=?, Ph_no=?, Address=?, institute_name=?, facebook=?, instagram=?, youtube=?, linkdin=? ";

// Include logo in the update statement if a new one was uploaded
if ($new_logo) {
    $sql .= ", institute_logo=?";
}

$sql .= " WHERE Admin_id=?";

$stmt = $conn->prepare($sql);

// Bind parameters
if ($new_logo) {
    $stmt->bind_param("sssssssssssss", $password, $name, $email, $ph_no, $address, $institute_name, $facebook, $instagram, $youtube, $linkedin, $logo, $admin_id);
} else {
    $stmt->bind_param("sssssssssss", $password, $name, $email, $ph_no, $address, $institute_name, $facebook, $instagram, $youtube, $linkedin, $admin_id);
}

// Execute the statement
if ($stmt->execute()) {
    echo "<script>alert('Record updated successfully.'); window.location.href = 'admin-profile.php';</script>";
} else {
    echo "Error updating record: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
