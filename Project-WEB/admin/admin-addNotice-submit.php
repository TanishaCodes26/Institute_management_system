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
$date = $_POST['notice_date'];
$content = $_POST['content'];

// Insert data into database
$sql = "INSERT INTO notice (notice_date, content) 
        VALUES ('$date', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Notice added successfully.'); window.location.href = 'admin-addNotice.php';</script>";
    
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

