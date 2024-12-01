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
$notice_id = $_POST['notice_id'];
$date = $_POST['notice_date'];
$content = $_POST['content'];

// Prepare and bind
$sql = "UPDATE notice SET notice_date='$date', content='$content' WHERE notice_id='$notice_id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record updated successfully.'); window.location.href = 'admin-manageNotice.php';</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
