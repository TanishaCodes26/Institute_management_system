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
$student_id = $_SESSION['Std_id'];

$sql = "SELECT Std_name from students_details where Std_id='$student_id'";
$result=$conn->query($sql);
if($result->num_rows>0){
    $row=$result->fetch_assoc();
    $student_name=$row['Std_name'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Feedback Form</title>
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
        const studentNameField = document.getElementById('student_name');
        if (anonymousCheckbox.checked) {
            studentNameField.value = 'Anonymous';
        } else {
            studentNameField.value = '<?= htmlspecialchars($student_name); ?>';
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
<?php include 'student-portal-header.php'; ?>
    <div class="form-container">
        <h2>Student Feedback Form</h2>
        <form method="POST" action="student-feedback-submit.php">
            <!-- Anonymous Checkbox -->
            <div class="form-group">
                <label>
                    <input type="checkbox" id="anonymous" name="anonymous" onclick="toggleAnonymous()"> Submit Feedback
                    Anonymously
                </label>
            </div>

            <!-- Dynamic Student Name -->
            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" id="student_name" name="Std_name" value="<?= htmlspecialchars($student_name); ?>"
                    readonly>
            </div>

            <!-- Course Name -->
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <select id="course_name" name="Course_name" required>
                    <option value="" disabled selected>Select course</option>
                    <?php
                    $sql="SELECT * from course_details";
                    $result=$conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
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
                <input type="hidden" id="rating" name="rating" required>
            </div>


            <!-- Course Content Satisfaction -->
            <div class="form-group">
                <label for="course_content">How satisfied are you with the course content?</label>
                <select id="course_content" name="course_content" required>
                    <option value="" disabled selected>Choose one</option>
                    <option value="Very Dissatisfied">Very Dissatisfied</option>
                    <option value="Dissatisfied">Dissatisfied</option>
                    <option value="Neutral">Neutral</option>
                    <option value="Satisfied">Satisfied</option>
                    <option value="Very Satisfied">Very Satisfied</option>
                </select>
            </div>

            <!-- Teacher Communication Skills -->
            <div class="form-group">
                <label for="teacher_communication">Rate your teacher's communication skills (1 to 5):</label>
                <select id="teacher_communication" name="teacher_communication" required>
                    <option value="" disabled selected>Choose one</option>
                    <option value="1">1 - Poor</option>
                    <option value="2">2 - Fair</option>
                    <option value="3">3 - Good</option>
                    <option value="4">4 - Very Good</option>
                    <option value="5">5 - Excellent</option>
                </select>
            </div>

            <!-- Concept Understanding -->
            <div class="form-group">
                <label for="concept_understanding">Did you clearly understand the concepts taught?</label>
                <select id="concept_understanding" name="concept_understanding" required>
                    <option value="" disabled selected>Choose one</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Partially">Partially</option>
                </select>
            </div>
            <div class="form-group">
                <label for="suggestions">What improvements would you suggest? (Optional)</label>
                <textarea id="suggestions" name="suggestions" placeholder="Provide your suggestions here..."></textarea>

            </div>
            <div class="form-group">
                <label for="comments">Additional Comments: (Optional)</label>
                <textarea id="comments" name="comments" placeholder="Provide any additional feedback..."></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
    <?php include 'student-portal-footer.php'; ?>
</body>

</html>