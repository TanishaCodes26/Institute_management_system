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

// Fetch mock test details for editing
$mocktest_id = $_GET['id']; // Get the mock test ID from the URL
$sql = "SELECT * FROM mock_test WHERE mock_test_id='$mocktest_id'";
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
    <title>Edit Mock Test</title>
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
    .form-group input[type="url"],
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
        <a href="teacher-manageMockTest.php" class="button">⬅️Back</a>
        <h2>Edit Mock Test</h2>
        <form action="teacher-editMockTest-submit.php" method="post">
            <input type="hidden" name="mock_test_id" value="<?php echo $mocktest_id; ?>">
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
                <select id="course_name" name="Course_name" required>
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
                <label for="exam_name">Exam Name:</label>
                <select id="exam_name" name="title" required>
                    <option value="Mock Test 1" <?php if ($row['title'] == 'Mock Test 1') echo 'selected'; ?>>Mock Test
                        1</option>
                    <option value="Mock Test 2" <?php if ($row['title'] == 'Mock Test 2') echo 'selected'; ?>>Mock Test
                        2</option>
                    <option value="Mock Test 3" <?php if ($row['title'] == 'Mock Test 3') echo 'selected'; ?>>Mock Test
                        3</option>
                    <option value="Mock Test 4" <?php if ($row['title'] == 'Mock Test 4') echo 'selected'; ?>>Mock Test
                        4</option>
                    <option value="Mock Test 5" <?php if ($row['title'] == 'Mock Test 5') echo 'selected'; ?>>Mock Test
                        5</option>
                    <option value="Mock Test 6" <?php if ($row['title'] == 'Mock Test 6') echo 'selected'; ?>>Mock Test
                        6</option>
                    <option value="Mock Test 7" <?php if ($row['title'] == 'Mock Test 7') echo 'selected'; ?>>Mock Test
                        7</option>
                    <option value="Mock Test 8" <?php if ($row['title'] == 'Mock Test 8') echo 'selected'; ?>>Mock Test
                        8</option>
                    <option value="Mock Test 9" <?php if ($row['title'] == 'Mock Test 9') echo 'selected'; ?>>Mock Test
                        9</option>
                    <option value="Mock Test 10" <?php if ($row['title'] == 'Mock Test 10') echo 'selected'; ?>>Mock
                        Test 10</option>
                </select>
            </div>
            <div class="form-group">
                <label for="submission_date">Submission Date:</label>
                <input type="date" id="submission_date" name="submission_date"
                    value="<?php echo $row['submission_date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="submission_status">Submission Status:</label>
                <select id="submission_status" name="submission_status" required>
                    <option value="Pending" <?php if ($row['submission_status'] == 'Pending') echo 'selected'; ?>>Pending
                    </option>
                    <option value="Completed" <?php if ($row['submission_status'] == 'Completed') echo 'selected'; ?>>
                        Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exam_link">Exam Link:</label>
                <input type="url" id="exam_link" name="link" value="<?php echo $row['link']; ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>