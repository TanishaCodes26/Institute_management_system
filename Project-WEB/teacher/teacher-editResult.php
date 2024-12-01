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

// Fetch student details
$students_sql = "SELECT Std_id, Std_name, Course_name FROM students_details";
$students_result = $conn->query($students_sql);

$students = [];
if ($students_result->num_rows > 0) {
    while ($row = $students_result->fetch_assoc()) {
        $students[$row['Std_id']] = [
            'name' => $row['Std_name'],
            'course' => $row['Course_name']
        ];
    }
}

// Fetch result details to edit
$result_id = $_GET['id']; // Get the result ID from the URL
$result_sql = "SELECT * FROM results WHERE result_id='$result_id'";
$result = $conn->query($result_sql);
if($result->num_rows>0){
    $result_data=$result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Result</title>
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

    .img {
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
    <script>
    const students = <?php echo json_encode($students); ?>;

    function updateStudentDetails() {
        const studentId = document.getElementById('student_id').value;
        const studentName = students[studentId].name;
        const courseName = students[studentId].course;

        document.getElementById('student_name').value = studentName;
        document.getElementById('course_name').value = courseName;
    }

    function calculatePercentageAndGrade() {
        const totalMarks = document.getElementById('total_marks').value;
        const marksObtained = document.getElementById('marks_obtained').value;
        const percentage = (marksObtained / totalMarks) * 100;
        document.getElementById('percentage').value = percentage.toFixed(2);

        let grade;
        if (percentage >= 90) {
            grade = 'A';
        } else if (percentage >= 80) {
            grade = 'B';
        } else if (percentage >= 70) {
            grade = 'C';
        } else if (percentage >= 60) {
            grade = 'D';
        } else {
            grade = 'F';
        }
        document.getElementById('grade').value = grade;
    }
    </script>
</head>

<body>
    <div class="admission-container">
        <a href="teacher-manageResult.php" class="button">⬅️Back</a>
        <h2>Edit Student Result</h2>
        <form action="teacher-editResult-submit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="result_id" value="<?php echo $result_id; ?>">
            <div class="form-group">
                <label for="teacher_id">Teacher ID:</label>
                <input type="text" id="teacher_id" name="teacher_id" value="<?php echo $id; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="teacher_name">Teacher Name:</label>
                <input type="text" id="teacher_name" name="teacher_name" value="<?php echo $teacher_name; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <select id="student_id" name="Std_id" required onchange="updateStudentDetails()">
                    <option value="" disabled>Select student ID</option>
                    <?php
                    foreach ($students as $std_id => $details) {
                        $selected = $result_data['Std_id'] == $std_id ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($std_id) . "' $selected>" . htmlspecialchars($std_id) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" id="student_name" name="Std_name" value="<?php echo $result_data['Std_name']; ?>"
                    readonly>
            </div>
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <input type="text" id="course_name" name="Course_name"
                    value="<?php echo $result_data['Course_name']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="total_marks">Total Marks:</label>
                <input type="number" id="total_marks" name="marks" value="<?php echo $result_data['marks']; ?>" required
                    oninput="calculatePercentageAndGrade()">
            </div>
            <div class="form-group">
                <label for="marks_obtained">Marks Obtained:</label>
                <input type="number" id="marks_obtained" name="obtain" value="<?php echo $result_data['obtain']; ?>"
                    required oninput="calculatePercentageAndGrade()">
            </div>
            <div class="form-group">
                <label for="percentage">Percentage:</label>
                <input type="text" id="percentage" name="percentage" value="<?php echo $result_data['percentage']; ?>"
                    readonly>
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" id="grade" name="grade" value="<?php echo $result_data['grade']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="current_result">Current Result (PDF):</label>
                <a href="../uploads/<?php echo $result_data['result']; ?>" target="_blank">View Current Result</a>
            </div>
            <div class="form-group">
                <label for="result">Upload New Result (PDF):</label>
                <input type="file" id="result" name="result" accept="application/pdf">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>