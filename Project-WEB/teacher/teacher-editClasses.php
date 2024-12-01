<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "institue_data";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$id = $_SESSION['teacher_id'];

$sql = "SELECT teacher_name FROM teachers WHERE teacher_id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $teacher_name = $row['teacher_name'];
}

// Fetch class details for editing
$class_id = $_GET['id']; // Get the class ID from the URL
$sql = "SELECT * FROM classes WHERE class_id='$class_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class Schedule</title>
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
        .form-group input[type="date"],
        .form-group input[type="time"],
        .form-group select {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 16px;
        }
        .form-group input:focus,
        .form-group select:focus {
            border-color: #6dd5ed;
            box-shadow: 0 0 10px rgba(109, 213, 237, 0.5);
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
        <a href="teacher-manageClasses.php" class="button">⬅️Back</a>
        <h2>Edit Class Schedule</h2>
        <form action="teacher-editClasses-submit.php" method="post">
            <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
            <div class="form-group">
                <label for="teacher_id">Teacher ID:</label>
                <input type="text" id="teacher_id" name="teacher_id" value="<?php echo $id; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="teacher_name">Teacher Name:</label>
                <input type="text" id="teacher_name" name="teacher_name" value="<?php echo $teacher_name; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <select id="course_name" name="Course_Name" required>
                    <option value="" disabled>Select course</option>
                    <?php
                    $sql = "SELECT Course_Name FROM course_details";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($course_row = $result->fetch_assoc()) {
                           echo "<option value='" . $course_row['Course_Name'] . "'>" . $course_row['Course_Name'] . "</option>";
                        }
                    }
                       
                   $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="class_date">Class Date:</label>
                <input type="date" id="class_date" name="class_date" value="<?php echo $row['class_date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="class_time">Class Time:</label>
                <input type="time" id="class_time" name="class_time" value="<?php echo $row['class_time']; ?>" required>
            </div>
            <div class="form-group">
                <label for="topic_name">Topic Name:</label>
                <input type="text" id="topic_name" name="topic_name" value="<?php echo $row['topic_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="class_status">Class Status:</label>
                <select id="class_status" name="class_status" required>
                    <option value="Pending" <?php if ($row['class_status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                    <option value="Completed" <?php if ($row['class_status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
