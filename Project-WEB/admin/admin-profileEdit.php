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
$admin_id = $_SESSION['Admin_id'];

$sql = "SELECT * FROM admin_details WHERE Admin_id = '$admin_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin Details</title>
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
        <a href="admin-profile.php" class="button">⬅️Back</a>
        <h2>Edit Admin Details</h2>
        <form action="admin-profileEdit-submit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="admin_id">Admin ID:(View Only)</label>
                <input type="text" id="admin_id" name="Admin_id" value="<?php echo $row['Admin_id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="Password" value="<?php echo $row['Password']; ?>">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="Email_id" value="<?php echo $row['Email_id']; ?>">
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
                <label for="institute_name">Institute Name:</label>
                <input type="text" id="institute_name" name="institute_name" value="<?php echo $row['institute_name']; ?>">
            </div>
            <div class="form-group"> 
                <label for="institute_logo">Current Institute Logo:</label> 
                <img src="../uploads/<?php echo $row['institute_logo']; ?>" alt="Institute Logo" width="50" height="50"> 
            </div>
            <div class="form-group">
                <label for="institute_logo">Upload New Institute Logo:</label>
                <input type="file" id="institute_logo" name="institute_logo" accept="image/*">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input type="text" id="facebook" name="facebook" value="<?php echo $row['facebook']; ?>">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram:</label>
                <input type="text" id="instagram" name="instagram" value="<?php echo $row['instagram']; ?>">
            </div>
            <div class="form-group">
                <label for="youtube">YouTube:</label>
                <input type="text" id="youtube" name="youtube" value="<?php echo $row['youtube']; ?>">
            </div>
            <div class="form-group">
                <label for="linkedin">LinkedIn:</label>
                <input type="text" id="linkedin" name="linkdin" value="<?php echo $row['linkdin']; ?>">
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>


