<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Project-WEB\PHPMailer-master\src/Exception.php';
require 'C:\xampp\htdocs\Project-WEB\PHPMailer-master\src/PHPMailer.php';
require 'C:\xampp\htdocs\Project-WEB\PHPMailer-master\src/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "institue_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//generate passwoard
function generateSecurePassword($length = 8) {
  return bin2hex(random_bytes($length / 2));  // Generates random password of given length
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['teacher_name'];
$gender = $_POST['Gender'];
$email = $_POST['Email'];
$phone = $_POST['Ph_no'];
$qualification = $_POST['Qualification'];
$experience = $_POST['Experience'];
$subjects = $_POST['Subjects'];
$address = $_POST['Address'];
$photo = $_FILES['Photo']['name'];
$sign = $_FILES['sign']['name'];
$generatedPassword = generateSecurePassword(10);
$join_date = date("Y-m-d");
// File upload path
$photo_target = "../uploads/" . basename($photo);
$sign_target = "../uploads/" . basename($sign);

// Move uploaded files to target directory
move_uploaded_file($_FILES['Photo']['tmp_name'], $photo_target);
move_uploaded_file($_FILES['sign']['tmp_name'], $sign_target);

// Insert data into database
$sql = "INSERT INTO teachers (PASSWORD, teacher_Name, Gender, Email, Ph_no, Qualification, Experience, Subjects, Address, Photo, sign, join_date) 
        VALUES ('$generatedPassword', '$name', '$gender', '$email', '$phone', '$qualification', '$experience', '$subjects', '$address', '$photo', '$sign', '$join_date')";

if ($conn->query($sql) === TRUE) {
    // Send email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Set SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'codergoals054@gmail.com'; // Gmail username
        $mail->Password = 'okvb xeyx fmkx mrcg'; // Gmail password or App-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Email setup
        $mail->setFrom('codergoals054@gmail.com', 'Coders Goal');
        $mail->addAddress($email, $name);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "Admission Confirmation";
        $mail->Body = "<h2>Hello $name,</h2><p>Thank you for choosing our institute!</p>";

        $mail->send();
        echo "<script>alert('Admission successful! A confirmation email has been sent.'); window.location.href = 'admin-addTeacher.html';</script>";
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
