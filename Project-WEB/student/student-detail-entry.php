<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "institue_data"; // Your actual database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #1e3c72, #2a5298, #6dd5ed, #ffffff);
            margin: 0;
            padding: 0;
        }
        .admission-container {
            max-width: 650px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }
        .button {
            text-decoration: none;
            font-size: 1.2em;
            color: black;
        }
        .admission-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e3c72;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: black;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="date"],
        .form-group input[type="file"],
        .form-group input[type="number"],
        .form-group select {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 16px;
        }
        .form-group input[type="file"] {
            padding: 6px;
            background-color: #f7f7f7;
        }
        .form-group input:focus,
        .form-group select:focus {
            border-color: #6dd5ed;
            box-shadow: 0 0 10px rgba(109, 213, 237, 0.5);
        }
        .img{
            height: 200px;
            width: 200px;
        }
        .form-group input[type="submit"] {
            width: 100%;
            padding: 15px;
            background: linear-gradient(to right, #1e3c72, #2a5298, #6dd5ed);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .form-group input[type="submit"]:hover {
            background: linear-gradient(to right, #6dd5ed, #2a5298, #1e3c72);
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <div class="admission-container">
    <a href="/Project-WEB/admission.php" class="button">⬅️Back</a>
        <h2>Student Admission Form</h2>
        <form action="student-detail-submit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="Photo" required>
            </div>
            <div class="form-group">
                <label for="sign">Signature:</label>
                <input type="file" id="sign" name="sign" required>
            </div>
            <div class="form-group">
                <label for="std_name">Name:</label>
                <input type="text" id="std_name" name="Std_Name" required>
            </div>
            <div class="form-group">
                <label for="father_name">Father's Name:</label>
                <input type="text" id="father_name" name="Father_name" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="DOB" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="Gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="Ph_no" required>
            </div>
            <div class="form-group">
                <label for="qualification">Qualification:</label>
                <select id="qualification" name="Qualification" required>
                    <option value="" disabled selected>Select your qualification</option>
                    <option value="10th">10th</option>
                    <option value="12th">12th</option>
                    <option value="Graduation">Graduation</option>
                    <option value="Masters">Masters</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pursuing">Pursuing:</label>
                <input type="text" id="pursuing" name="Pursuing" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="Address" required>
            </div>
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <select id="course_name" name="Course_name" required>
                <option value="" disabled selected>Select your course</option>
                    <?php
                    $sql = "SELECT Course_Name FROM course_details";
                    $result = $conn->query($sql);

                    // Populate the options dynamically
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . htmlspecialchars($row['Course_Name']) . "'>" . htmlspecialchars($row['Course_Name']) . "</option>";
                        }
                    } else {
                        echo "<option value=''>No courses available</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="transaction_id">Transaction ID:</label>
                <input type="text" id="transaction_id" name="transaction_details" required>
            </div>
            <div class="form-group">
                <label for="qr">QR Code for Payment:</label>
                <img src="/Project-WEB/img/qr.jpg" alt="QR Code for Payment" class="img">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
