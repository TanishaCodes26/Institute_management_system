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
$id = $_SESSION['Admin_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Profile</title>
    <style>
    body {
        background: linear-gradient(135deg, #e6ee9c, #80cbc4);

    }

    .container {
        width: 90%;
        margin: 50px auto;
        background: linear-gradient(135deg, #f4ffd4, #f5f5dc);
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .links {
        display: flex;
        justify-content: left;
        align-items: baseline;
        gap: 15px;
    }

    h1,
    h2 {
        text-align: center;
        color: black;
    }

    a {
        text-decoration: none;
        color: black;
        font-size: 1.3em;
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

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }
    </style>
</head>

<body>
    <main>
        <h1>Admin Profile</h1>
        <div class="container">
            <h2>Basic Information</h2>
            <div class="links">
                <a href="admin-dashboard.php">⬅️Back</a>
                <a href="admin-profileEdit.php">Edit</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Admin Id</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone no</th>
                        <th>Institute Name</th>
                        <th>Institute Logo</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql= "SELECT * from admin_details where Admin_id= '$id'";
                    $result= $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                            <td>" . $row['Admin_id'] . "</td>
                            <td>" . $row['Password'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['Email_id'] . "</td>
                            <td>" . $row['Ph_no'] . "</td>
                            <td>" . $row['institute_name'] . "</td>
                            <td><img src='../uploads/" . $row['institute_logo'] . "' alt='Institute Logo' width='50' height='50'></td>
                            <td>" . $row['Address'] . "</td>
                            </tr>";
                        }
                    } 
                    else {
                        echo "<tr><td colspan='8'>No Details found</td></tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
        <div class="container">
            <table>
                <h2>Social Links</h2>
                <thead>
                    <tr>
                        <th>Facebook</th>
                        <th>Instaggram</th>
                        <th>Youtube</th>
                        <th>Linkdin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql= "SELECT * from admin_details";
                    $result= $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                            <td><a href=". $row['facebook'] . " target='_blank'><i class='fa-brands fa-facebook'></i> Facebook</a></td>
                            <td><a href=" . $row['instagram'] . " target='_blank'><i class='fa-brands fa-square-instagram'></i> Instagram</a></td>
                            <td><a href=" . $row['youtube'] . " target='_blank'><i class='fa-brands fa-youtube'></i> YouTube</a></td>
                            <td><a href=" . $row['linkdin'] . " target='_blank'><i class='fa-brands fa-linkedin'></i> LinkedIn</a></td>
                            </tr>";
                        }
                    } 
                    else {
                        echo "<tr><td colspan='4'>No Admin found</td></tr>";
                    }

                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>