<?php
// Database connection details
$servername = "localhost"; // Database host
$username = "root"; // Database username
$password = ""; // Database password (leave empty if no password is set)
$dbname = "institue_data"; // Replace with your actual database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch help desk details from the admin table
$sql = "SELECT Address, Ph_no, Email_id FROM admin_details LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch data
    $helpData = $result->fetch_assoc();
} else {
    echo "No help desk information available.";
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Help Desk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    /* Basic styling for help desk layout */
    body {
        padding-top: 110px;
        padding-left: 300px;
        padding-right: 30px;
    }

    .help-section {
        text-align: center;
        padding: 20px;
        width: 100%;
        margin: auto;
    }

    .help-section h2 {
        font-size: 2em;
        color: black;
        margin-bottom: 10px;
    }

    .help-section p {
        font-size: 1.2em;
        color: #black;
    }

    .help-cards {
        display: flex;
        gap: 20px;
        justify-content: space-between;
        margin-top: 50px;
    }

    .card {
        background: linear-gradient(135deg, #ffffff, #e0f7fa);
        border-radius: 10px;
        width: 300px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .card-icon {
        font-size: 40px;
        margin-bottom: 15px;
        color: #0073e6;
    }

    .card-title {
        font-size: 1.5em;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .card-content {
        font-size: 1.1em;
        color: #555;
    }
    </style>
</head>

<body>
    <?php include 'teacher-header.php'; ?>
    <main>
        <div class="help-section">
            <h2>Need Assistance?</h2>
            <p>"Our Help Desk is here to provide you with quick and reliable support. Whether you're facing account
                issues, course management challenges, or technical problems, we offer comprehensive FAQs,
                troubleshooting guides, and direct assistance. Reach out through our contact form for personalized
                support from our dedicated team."</p>

            <div class="help-cards">
                <div class="card">
                    <div class="card-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="card-title">Address</div>
                    <div class="card-content"><?php echo htmlspecialchars($helpData['Address']); ?></div>
                </div>

                <div class="card">
                    <div class="card-icon"><i class="fas fa-phone"></i></div>
                    <div class="card-title">Phone</div>
                    <div class="card-content"><?php echo htmlspecialchars($helpData['Ph_no']); ?></div>
                </div>

                <div class="card">
                    <div class="card-icon"><i class="fas fa-envelope"></i></div>
                    <div class="card-title">Email</div>
                    <div class="card-content"><?php echo htmlspecialchars($helpData['Email_id']); ?></div>
                </div>
            </div>
        </div>
    </main>
    <br><br><br><br><br>
    <?php include 'teacher-footer.php'; ?>
</body>

</html>