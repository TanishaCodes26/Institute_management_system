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
$teacher_id = $_SESSION['teacher_id'];

$sql = "SELECT teacher_name FROM teachers WHERE teacher_id = '$teacher_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $teacher_name = $row['teacher_name'];
}

// Fetch course details
$courses_sql = "SELECT Course_Name FROM course_details";
$courses_result = $conn->query($courses_sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Feedback Form</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background: linear-gradient(to bottom right, #f0f4c3, #c8e6c9);
        padding-top: 110px;
        padding-left: 300px;
        padding-right: 30px;
    }

    .form-container {
        max-width: 800px;
        margin: auto;
        background: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #388e3c;
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
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #a5d6a7;
        box-shadow: 0 0 10px rgba(165, 214, 167, 0.5);
    }

    .star-rating span {
        font-size: 24px;
        cursor: pointer;
        color: #e0e0e0;
    }
    .star-rating span:hover,
    .star-rating span.selected {
        color: #ffeb3b;
    }

    .form-group input[type="submit"] {
        width: 100%;
        padding: 15px;
        background: linear-gradient(to right, #388e3c, #66bb6a);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .form-group input[type="submit"]:hover {
        background: linear-gradient(to right, #66bb6a, #388e3c);
        transform: scale(1.02);
    }
    </style>
    <script>
    function toggleAnonymous() {
        const anonymousCheckbox = document.getElementById('anonymous');
        const teacherNameField = document.getElementById('teacher_name');
        if (anonymousCheckbox.checked) {
            teacherNameField.value = 'Anonymous';
        } else {
            teacherNameField.value = '<?= htmlspecialchars($teacher_name); ?>';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-rating span');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                ratingInput.value = this.dataset.value;
                stars.forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
                let prevSibling = this.previousElementSibling;
                while (prevSibling) {
                    prevSibling.classList.add('selected');
                    prevSibling = prevSibling.previousElementSibling;
                }
            });
        });
    });
    </script>
</head>

<body>
    <?php include 'teacher-header.php'; ?>
    <div class="form-container">
        <h2>Teacher Feedback Form</h2>
        <form method="POST" action="teacher-feedback-submit.php">
            <!-- Anonymous Checkbox -->
            <div class="form-group">
                <label>
                    <input type="checkbox" id="anonymous" name="anonymous" onclick="toggleAnonymous()"> Submit Feedback
                    Anonymously
                </label>
            </div>

            <!-- Teacher Name -->
            <div class="form-group">
                <label for="teacher_name">Teacher Name:</label>
                <input type="text" id="teacher_name" name="teacher_name" value="<?= htmlspecialchars($teacher_name); ?>"
                    readonly>
            </div>

            <!-- Course Name -->
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <select id="course_name" name="Course_name" required>
                    <option value="" disabled selected>Select course</option>
                    <?php
                    if ($courses_result->num_rows > 0) {
                        while ($row = $courses_result->fetch_assoc()) {
                            echo "<option value='" . $row['Course_Name'] . "'>" . $row['Course_Name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <!-- Overall Satisfaction -->
            <div class="form-group">
                <label for="satisfaction">Overall Satisfaction:</label>
                <div class="star-rating" id="satisfaction">
                    <span data-value="1">&#9733;</span>
                    <span data-value="2">&#9733;</span>
                    <span data-value="3">&#9733;</span>
                    <span data-value="4">&#9733;</span>
                    <span data-value="5">&#9733;</span>
                </div>
                <input type="hidden" id="rating" name="satisfaction" required>
            </div>

            <!-- Any Problem Faced -->
            <div class="form-group">
                <label for="problems_faced">Any problems faced during the course? (Optional)</label>
                <textarea id="problems_faced" name="problems"
                    placeholder="Describe any problems faced..."></textarea>
            </div>

            <!-- Suggestions -->
            <div class="form-group">
                <label for="suggestions">What improvements would you suggest? (Optional)</label>
                <textarea id="suggestions" name="suggestions" placeholder="Provide your suggestions here..."></textarea>
            </div>

            <!-- Additional Comments -->
            <div class="form-group">
                <label for="comments">Additional Comments: (Optional)</label>
                <textarea id="comments" name="comments" placeholder="Provide any additional feedback..."></textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
    <?php include 'teacher-footer.php'; ?>
</body>

</html>