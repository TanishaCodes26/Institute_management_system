<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Header</title>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
    /* Basic Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #f0f4c3, #b2dfdb);
        font-family: 'poppins', sans-serif;
    }

    /* Header Styling */
    .header {
        background: linear-gradient(135deg, #ffffff, #f9f9f9);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 30px;
        background-color: white;
        color: black;
        position: fixed;
        width: 100%;
        top: 0px;
        left: 0px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .5);
        z-index: 2;
    }

    /* Logo and Institute Name */
    .header-left {
        display: flex;
        align-items: center;
    }

    .logo {
        width: 60px;
        height: 60px;
        margin-right: 20px;
        border-radius: 50%;
    }

    .institute-name {
        font-size: 2em;
        font-weight: bold;
    }

    /* Digital Clock Styling */
    .clock {
        font-size: 1.5em;
        font-weight: bold;
        color: #004aad;
    }

    /* Right Side Buttons */
    .header-right {
        display: flex;
        gap: 15px;
    }

    .header-button {
        background-color: #004aad;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none;
        font-size: 1.2em;
        transition: all .3s ease;
    }

    /* Sidebar Styling */
    .sidebar {
        width: 250px;
        background: linear-gradient(135deg, #2a2a72, #009ffd);
        box-shadow: 0 0 5px black;
        color: white;
        padding-top: 20px;
        position: fixed;
        height: 100vh;
        top: 110px;
        left: 20px;
        border-radius: 15px;
        z-index: 2;

    }

    /* Sidebar Links with Icons */
    .sidebar a {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        color: white;
        text-decoration: none;
        font-size: 1.2em;
        transition: all .3s ease;
    }

    .sidebar a i {
        margin-right: 15px;
        font-size: 1.2em;
    }

    .sidebar a:hover {
        background-color: #517fbc;
    }

    .sidebar .active {
        font-weight: bolder;
        background-color: rgba(81, 127, 188, .5);
    }
    </style>
</head>

<body>
    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    ?>
    <!-- Header -->
    <div class="header">
        <!-- Left Section: Logo and Name -->
        <div class="header-left">
            <img src="../img/logo.jpg" alt="Logo" class="logo">
            <div class="institute-name">Coder's Goal</div>
        </div>

        <!-- Middle Section: Digital Clock -->
        <div class="clock" id="clock"></div>

        <!-- Right Section: Dashboard and Logout Buttons -->
        <div class="header-right">
            <a href="student-dashboard.php" class="header-button"><i class="fa-solid fa-house-user"></i> Dashboard</a>
            <a href="student-logout.php" class="header-button" style="background-color: red;"><i
                    class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="student-profile.php" class="<?php if($currentPage == 'student-profile.php') echo 'active'; ?>">
            <i class="fas fa-user"></i>Profile
        </a>
        <a href="student-course.php" class="<?php if($currentPage == 'student-course.php') echo 'active'; ?>">
            <i class="fas fa-book"></i>Courses
        </a>
        <a href="student-mockTest.php" class="<?php if($currentPage == 'student-mockTest.php') echo 'active'; ?>">
            <i class="fas fa-edit"></i>Mock Test
        </a>
        <a href="student-grade.php" class="<?php if($currentPage == 'student-grade.php') echo 'active'; ?>">
            <i class="fas fa-chart-line"></i>Grade
        </a>
        <a href="student-result.php" class="<?php if($currentPage == 'student-result.php') echo 'active'; ?>">
            <i class="fas fa-file-alt"></i>Result
        </a>
        <a href="student-attendance.php" class="<?php if($currentPage == 'student-attendance.php') echo 'active'; ?>">
            <i class="fas fa-check-circle"></i>Attendance
        </a>
        <a href="student-feedback.php" class="<?php if($currentPage == 'student-feedback.php') echo 'active'; ?>">
            <i class="fas fa-comments"></i>Feedback
        </a>
        <a href="student-helpDesk.php" class="<?php if($currentPage == 'student-helpDesk.php') echo 'active'; ?>">
            <i class="fas fa-headset"></i>Help Desk
        </a>
        <br><br>
        <a href="admin-logout.php">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>

    </div>

    <script>
    function updateClock() {
        const clock = document.getElementById('clock');
        const now = new Date();
        const date = now.toLocaleDateString();
        const time = now.toLocaleTimeString();
        clock.innerHTML = `<strong>${date} (${time})</strong>`;
    }
    setInterval(updateClock, 1000);
    updateClock(); // Initial call to display the clock immediately 
    </script>

</body>

</html>