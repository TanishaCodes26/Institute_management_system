<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "institue_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$teacher_id = isset($_GET['id']) ? $_GET['id'] : 0;

if ($teacher_id > 0) {
    $sql = "SELECT * FROM teachers WHERE teacher_id = '$teacher_id'";
    $result= $conn->query($sql);
    if($result->num_rows>0){
        $teacher = $result->fetch_assoc();
    }
    else{
        echo "No Teacher Found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Details</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #e6ee9c, #80cbc4);
    }

    .container {
        background: linear-gradient(to right, #f0f4f8, #c2e9fb);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        width: 80vw;
        margin: 20px;
    }
    .back{
        font-size: 1.5em;
        text-decoration: none;
        color: black;
    }
    .heading {
        text-align: center;
        margin-bottom: 20px;
    }

    .heading h2 {
        font-size: 2em;
    }

    .teacher-table {
        width: 100%;
        border-collapse: collapse;
    }

    .teacher-table td {
        border: 1px solid black;
        padding: 10px;
        text-align: left;
        width: 50%;
        font-size: 1.1em;
    }

    .teacher-table th {
        font-weight: bold;
        width: 20%;
        border: 1px solid black;
        padding: 10px;
        text-align: left;
        font-size: 1.2em;
    }

    .teacher-photo {
        position: relative;
        left: 20%;
        width: 200px;
        height: 200px;
        object-fit: cover;
    }
    .teacher-sign{
        position: relative;
        left: 20%;
        width: 200px;
        height: 80px;
    }
    </style>
</head>

<body>
    <div class="container">
        <a href="admin-manageTeacher.php" class="back">⬅️Back</a>
        <div class="heading">
            <h2>Teacher Details</h2>
        </div>
        <table class="teacher-table">
            <tr>
                <th>Teacher ID</th>
                <td><?php echo htmlspecialchars($teacher['teacher_id']); ?></td>
                <td rowspan="7"><img src="/Project-WEB/uploads/<?php echo htmlspecialchars($teacher['Photo']); ?>"
                        alt="Teacher Photo" class="teacher-photo"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo htmlspecialchars($teacher['Password']); ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo htmlspecialchars($teacher['teacher_name']); ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo htmlspecialchars($teacher['Gender']); ?></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><?php echo htmlspecialchars($teacher['Ph_no']); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($teacher['Email']); ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo htmlspecialchars($teacher['Address']); ?></td>
            </tr>
            <tr>
                <th>Qualification</th>
                <td><?php echo htmlspecialchars($teacher['Qualification']); ?></td>
                <td rowspan="4"><img src="/Project-WEB/uploads/<?php echo htmlspecialchars($teacher['sign']); ?>"
                        alt="Teacher sign" class="teacher-sign"></td>
            </tr>
            <tr>
                <th>Subjects</th>
                <td><?php echo htmlspecialchars($teacher['Subjects']); ?></td>
            </tr>
            <tr>
                <th>Experience</th>
                <td><?php echo htmlspecialchars($teacher['Experience']); ?></td>
            </tr>
            <tr>
                <th>Date of Joining</th>
                <td><?php echo htmlspecialchars($teacher['join_date']); ?></td>
            </tr>
        </table>
    </div>
</body>

</html>