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

session_start();
$teacher_id = $_SESSION['teacher_id'];

$sql = "SELECT * FROM teachers WHERE teacher_id = '$teacher_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Students Details</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background: linear-gradient(to bottom right, #1e3c72, #2a5298, #6dd5ed, #ffffff);
        margin: 0;
        padding: 0;
    }

    .form-container {
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

    .form-container h2 {
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

    .form-group input {
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
        background-color: white;
    }

    .form-group input:focus {
        border-color: #6dd5ed;
        box-shadow: 0 0 10px rgba(109, 213, 237, 0.5);
    }

    .form-group button {
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

    .form-group button:hover {
        background: linear-gradient(to right, #6dd5ed, #2a5298, #1e3c72);
        transform: scale(1.02);
    }
    </style>
</head>

<body>
    <div class="form-container">
        <a href="teacher-profile.php" class="button">⬅️Back</a>
        <h2>Edit Teacher Details</h2>
        <form action="teacher-profileEdit-submit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="teacher_id">Teacher ID:(View Only)</label>
                <input type="text" id="teacher_id" name="teacher_id" value="<?php echo $row['teacher_id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="photo">Current Photo:</label>
                <img src="../uploads/<?php echo $row['Photo']; ?>" alt="Teacher Photo" width="60" height="60">
            </div>
            <div class="form-group">
                <label for="photo">Upload New Photo:</label>
                <input type="file" id="photo" name="Photo" accept="image/*">
            </div>
            <div class="form-group">
                <label for="sign">Current Signature:</label>
                <img src="../uploads/<?php echo $row['sign']; ?>" alt="Teacher Signature" width="150" height="50">
            </div>
            <div class="form-group">
                <label for="sign">Upload New Signature:</label>
                <input type="file" id="sign" name="sign" accept="image/*">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="Password" value="<?php echo $row['Password']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="Email" value="<?php echo $row['Email']; ?>">
            </div>
            <div class="form-group">
                <label for="ph_no">Phone Number:</label>
                <input type="text" id="ph_no" name="Ph_no" value="<?php echo $row['Ph_no']; ?>">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="Address" value="<?php echo $row['Address']; ?>">
            </div>
            <div class="form-group">
                <label for="qualification">Qualification:</label>
                <input type="text" id="qualification" name="Qualification" value="<?php echo $row['Qualification']; ?>">
            </div>
            <div class="form-group">
                <label for="experience">Experience:</label>
                <input type="text" id="experience" name="Experience" value="<?php echo $row['Experience']; ?>">
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>