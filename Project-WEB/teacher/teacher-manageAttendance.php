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
session_start();
$id = $_SESSION['teacher_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Attendance</title>
    <style>
        body {
            padding-top: 110px;
            padding-left: 300px;
            padding-right: 30px;
        }

        .container {
            width: 100%;
            margin: auto;
            background: linear-gradient(135deg, #f4ffd4, #f5f5dc);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: black;
        }

        .button {
            display: flex;
            justify-content: left;
            align-items: center;
            gap: 20px;
        }

        .button a {
            padding: 10px 15px;
            background-color: #004aad;
            border-radius: 10px;
            color: white;
            border: none;
            text-decoration: none;
            font-size: 1.1em;
            cursor: pointer;
        }

        .search-box input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 400px;
        }

        .search-box input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #1e3c72;
            color: white;
            cursor: pointer;
        }

        .view {
            text-decoration: none;
            color: black;
        }

        .delete-btn {
            padding: 5px 10px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            text-align: center;
            padding: 12px;
            border-bottom: 1px solid black;
        }

        th {
            background-color: #4cafbe;
            color: white;
            font-weight: bold;
        }

        td {
            font-size: .9em;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this attendance record?')) {
            window.location.href = 'teacher-deleteAttendance.php?id=' + id;
        }
    }
    </script>

</head>
<body>
    <?php include 'teacher-header.php'; ?>
    <main>
        <div class="container">
            <h2>Manage Attendance</h2>
            <div class="button">
                <a href="teacher-addAttendance.php">Add</a>
                <div class="search-box">
                    <form action="" method="get">
                        <input type="text" name="search" placeholder="Search by Student Name, Course Name or Date">
                        <input type="submit" value="Search">
                    </form>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Sl_no</th>
                        <th>Student Name</th>
                        <th>Course Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total Attendance</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sl_no = 1;
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sql = "SELECT * FROM student_attendance 
                            WHERE teacher_id='$id' 
                            AND (Std_name LIKE '%$search%' 
                            OR Course_name LIKE '%$search%' 
                            OR date LIKE '%$search%') 
                            ORDER BY date DESC";
                } else {
                    $sql = "SELECT * FROM student_attendance 
                            WHERE teacher_id='$id' 
                            ORDER BY date DESC";
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $sl_no . "</td>
                            <td>" . $row['Std_name'] . "</td>
                            <td>" . $row['Course_name'] . "</td>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['status'] . "</td>
                            <td>" . $row['attendance'] . "%</td>
                            <td><a href='teacher-editAttendance.php?id={$row['attendance_id']}' class='view'>Edit</a></td>
                            <td><button class='delete-btn' onclick='confirmDelete(" . $row["attendance_id"] . ")'>Delete</button></td>
                        </tr>";
                        $sl_no++;
                    }
                } else {
                    echo "<tr><td colspan='8'>No attendance records available</td></tr>";
                }

                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </main>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include 'teacher-footer.php'; ?>
</body>
</html>
