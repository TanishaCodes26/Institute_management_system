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
$name = $_POST['name'];
$email = $_POST['email'];
$phno = $_POST['ph_no'];
$address = $_POST['address'];
$message = $_POST['message'];
$date = date('Y-m-d');
// Prepare and bind
$sql = "INSERT INTO enquiries (name, email, ph_no, address, message, enquiry_date) VALUES ('$name', '$email', '$phno', '$address', '$message', '$date')";

// Execute the statement
if ($conn->query($sql)=== True) {
    echo "<script>alert('Enquiry submitted successfully.'); window.location.href = 'contact.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$conn->close();
?>
