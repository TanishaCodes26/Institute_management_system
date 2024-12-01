<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C Programming</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        main {
            padding: 20px;
        }

        .sec-1 {
            background-color: #e9e9fa;
            border-radius: 10px 10px 0 0;
        }

        .course-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .left-section {
            width: 70%;
            padding: 10px;
        }

        .right-section {
            width: 30%;
            padding: 10px;
        }

        .course-heading {
            font-size: 3.5em;
            margin-bottom: 10px;
            color: black;
        }

        .course-tagline {
            font-size: 1.8em;
            color: black;
            margin-bottom: 20px;
        }

        .capsules {
            display: flex;
            justify-content: space-evenly;
            margin-bottom: 20px;
        }

        .capsule {
            background-image: linear-gradient(#c3e5fb, #69c1fb);
            box-shadow: 0 4px 8px black;
            padding: 5px;
            width: 20%;
            border-radius: 30px;
            text-align: center;
        }

        .capsule h3 {
            font-size: 1.3em;
            margin-bottom: 5px;
            color: black;
        }

        .capsule p {
            font-size: 1.1em;
            color: black;
        }

        hr {
            height: 2px;
            background-color: black;
            border: none;
        }

        .course-content {
            display: flex;
            justify-content: space-evenly;
            margin-top: 25px;
        }

        .course-content .column {
            width: 30%;
        }

        .course-content .column p {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: black;
        }

        .download-btn {
            background-image: linear-gradient(#e0f7fa, #abe3eb);
            box-shadow: 0 4px 8px black;
            color: black;
            max-height: fit-content;
            padding: 20px 10px;
            font-size: 1em;
            font-weight: bolder;
            text-decoration: none;
            border-radius: 25px;
            transition: all .3s ease;
        }

        .download-btn:hover {
            background-image: linear-gradient(#c3e5fb, #69c1fb);

        }

        .laptop {
            width: 100%;
            height: auto;
        }


        .sec-2 {
            border-radius: 0 0 10px 10px;
            box-shadow: 0 2px 15px black;
        }

        .section-container-sec2 {
            display: flex;
            justify-content: space-between;
            background-color: #b2d6ed;
            padding: 15px 10px;
            border-radius: 0 0 10px 10px;
        }

        .left-part {
            width: 70%;
            display: flex;
            justify-content: space-evenly;
            margin-bottom: 20px;
        }

        .circle {
            text-align: center;

        }

        .circle-icon {
            position: relative;
            top: 5px;
            width: 110px;
            height: 110px;
            background-color: #e9e9fa;
            box-shadow: 0 4px 8px black;
            border-radius: 50%;
            margin: 10px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .5s ease .1s;
        }

        .circle-icon:hover {
            top: -10px;
        }

        .circle-icon img {
            width: 80%;
        }

        .circle-text {
            font-size: .8em;
            font-weight: bold;
            color: black;
            text-align: center;
        }

        .right-part {
            width: 30%;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        .class-details {
            display: flex;
            justify-content: center;
            max-width: 100%;
        }

        .date,
        .time {
            margin: 5px 15px;
        }

        .date-details,
        .time-details {
            padding: 10px 20px;
            font-size: 1em;
            margin: 5px 0px;
            max-width: 100%;
            border-radius: 20px;
            text-align: center;
            color: black;
            background-color: #acdaf9;
            box-shadow: 0 4px 8px black;
        }

        .enroll-now {
            background-image: linear-gradient(#e0f7fa, #abe3eb);
            box-shadow: 0 4px 8px black;
            color: black;
            text-decoration: none;
            font-weight: bolder;
            padding: 15px;
            font-size: 1.4em;
            border-radius: 30px;
            text-align: center;
            transition: all .3s ease;
            cursor: pointer;
        }

        .enroll-now:hover {
            background-image: linear-gradient(#c3e5fb, #69c1fb);
        }



        .sec-3 {
            margin-top: 30px;
            border-radius: 10px;
        }

        .section-container-sec3 {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            background-color: #b2d6ed;
            padding: 15px 10px;
            border-radius: 10px;
        }

        .left-part-sec3 {
            width: 60%;
            display: flex;
            justify-content: space-evenly;
        }

        .circle-container {
            text-align: center;
        }

        .circle-sec3 {
            position: relative;
            top: 5px;
            width: 110px;
            height: 110px;
            background-color: #e9e9fa;
            box-shadow: 0 4px 8px black;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .5s ease .1s;
        }

        .circle-sec3:hover {
            top: -10px;
        }

        .circle-sec3 img {
            width: 80%;
        }

        .right-part-sec3 {
            width: 40%;
            padding: 10px;
            border-radius: 10px;
        }

        .right-part-sec3 h2 {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: black;
        }

        .right-part-list {
            list-style-type: none;
            color: black;
            font-size: .9em;
        }

        .right-part-list li {
            margin-bottom: 8px;
        }



        .sec-4 {
            background-color: #e9e9fa;
            border-radius: 10px;
            margin-top: 5px;
        }

        .section-container-sec4 {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-radius: 10px;
        }

        /* Left Part */
        .left-part-sec4 {
            width: 60%;
            display: flex;
            padding: 10px;
        }

        .teacher-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .5);
        }

        .teacher-circle img {
            width: 80%;
            height: 80%;
            border-radius: 50%;
        }

        .info {
            display: flex;
            flex-direction: column;
            align-self: center;
            padding: 5px;
            margin-left: 20px;
        }

        .info p {
            font-size: 1.1em;
            color: black;
            width: fit-content;

        }

        .info-box {
            width: 40%;
            background-image: linear-gradient(#e0f7fa, #abe3eb);
            padding: 10px;
            margin-left: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 2px 5px black;
        }

        .info-box h3 {
            font-size: 1.3em;
            margin-bottom: 10px;
        }

        .info-box p {
            font-size: 1em;
            line-height: 1.3;
            text-align: justify;
            color: black;
        }

        /* Right Part */
        .right-part-sec4 {
            width: 40%;
            padding: 10px;
            color: black;
        }

        .faq-heading {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .faq-item {
            margin-bottom: 10px;
        }

        .faq-item h4 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .faq-item p {
            font-size: 14px;
        }


        @media (max-width:1340px) and (min-width:1001px) {
            .course-heading {
                font-size: 2.5em;
            }

            .course-tagline {
                font-size: 1.5em;
            }

            .capsule {
                width: 22%;
                padding: 5px;
                border-radius: 25px;
            }

            .capsule h3 {
                font-size: 1.1em;
            }

            .capsule p {
                font: .9em;
            }

            .course-content .column {
                width: 30%;
            }

            .course-content .column p {
                font-size: 1em;
            }

            .download-btn {
                font-size: .9em;
                padding: 10px 10px;
                width: 20%;
                text-align: center;
            }

            .date-details,
            .time-details {
                padding: 5px 10px;
                font-size: .9em;
                max-width: 100%;
            }

            .enroll-now {
                font-size: 1.2em;
                padding: 10px 10px;
                width: 80%;
                align-self: center;
            }

            .left-part-sec4 {
                flex-direction: column;
            }

            .teacher-circle {
                align-self: center;
            }

            .info-box {
                width: 100%;
                margin-left: 0;
            }
        }

        @media (max-width:1000px) and (min-width:831px) {
            .course-heading {
                font-size: 2em;
            }

            .course-tagline {
                font-size: 1.2em;
            }

            .capsule {
                width: 22%;
                padding: 2px 0;
                border-radius: 25px;
            }

            .capsule h3 {
                font-size: .9em;
            }

            .capsule p {
                font-size: .8em;
            }

            .course-content .column {
                width: 50%;
            }

            .course-content .column p {
                font-size: .9em;
            }

            .download-btn {
                font-size: .8em;
                padding: 10px 10px;
                width: 30%;
                text-align: center;
            }

            .circle-icon {
                height: 90px;
                width: 90px;
            }

            .circle p {
                font-size: .6em;
            }

            .date,
            .time {
                margin: 5px 5px;
            }

            .date-details,
            .time-details {
                padding: 5px 10px;
                font-size: .7em;
                width: 100px;
            }

            .enroll-now {
                font-size: 1.2em;
                padding: 10px 10px;
                width: 70%;
                align-self: center;
            }

            .circle-sec3 {
                height: 90px;
                width: 90px;
            }

            .circle-sec3 p {
                font-size: .5em;
            }

            .left-part-sec4 {
                flex-direction: column;
            }

            .teacher-circle {
                align-self: center;
            }

            .info-box {
                width: 100%;
                margin-left: 0;
            }
        }

        @media (max-width:830px) and (min-width:651px) {
            .course-container {
                flex-direction: column-reverse;
            }

            .left-section {
                width: 100%;
            }

            .right-section {
                align-self: center;
                width: 50%;
            }

            .laptop {
                width: 100%;
            }

            .course-heading {
                font-size: 2em;
            }

            .course-tagline {
                font-size: 1.2em;
            }

            .capsule {
                width: 22%;
                padding: 2px 0;
                border-radius: 25px;
            }

            .capsule h3 {
                font-size: .9em;
            }

            .capsule p {
                font-size: .8em;
            }

            .course-content .column {
                width: 50%;
            }

            .course-content .column p {
                font-size: .9em;
            }

            .download-btn {
                font-size: .8em;
                padding: 10px 10px;
                width: 30%;
                text-align: center;
            }

            .section-container-sec2 {
                flex-direction: column;
            }

            .left-part {
                width: 100%;
            }

            .circle-icon {
                height: 100px;
                width: 100px;
            }

            .circle p {
                font-size: .7em;
            }

            .right-part {
                width: 100%;
                flex-direction: row;
            }

            .date,
            .time {
                margin: 10px 10px;
            }

            .date-details,
            .time-details {
                padding: 10px 20px;
                font-size: .9em;
                width: 150px;
            }

            .class-details {
                width: 60%;
                justify-content: space-evenly;
            }

            .enroll-now {
                font-size: 1.2em;
                padding: 10px 10px;
                width: 30%;
                align-self: center;
            }

            .section-container-sec3 {
                flex-direction: column;
            }

            .left-part-sec3 {
                width: 100%;
            }

            .right-part-sec3 {
                width: 100%;
            }

            .circle-sec3 {
                height: 100px;
                width: 100px;
            }

            .circle-sec3 p {
                font-size: .5em;
            }

            .left-part-sec4 {
                flex-direction: column;
            }

            .teacher-circle {
                align-self: center;
            }

            .info-box {
                width: 100%;
                margin-left: 0;
            }
        }

        @media (max-width:650px) and (min-width:481px) {
            .course-container {
                flex-direction: column-reverse;
            }

            .left-section {
                width: 100%;
            }

            .right-section {
                align-self: center;
                width: 50%;
            }

            .laptop {
                width: 100%;
            }

            .course-heading {
                font-size: 1.7em;
            }

            .course-tagline {
                font-size: 1em;
            }

            .capsule {
                width: 22%;
                padding: 5px 0;
                border-radius: 20px;
            }

            .capsule h3 {
                font-size: .7em;
            }

            .capsule p {
                font-size: .7em;
            }

            .course-content .column {
                width: 50%;
            }

            .course-content .column p {
                font-size: .7em;
            }

            .download-btn {
                font-size: .7em;
                padding: 10px 10px;
                width: 30%;
                text-align: center;
            }

            .section-container-sec2 {
                flex-direction: column;
            }

            .left-part {
                width: 100%;
                flex-wrap: wrap;
            }

            .circle-icon {
                height: 100px;
                width: 100px;
            }

            .circle p {
                font-size: .7em;
            }

            .right-part {
                width: 100%;
                flex-direction: row;
            }

            .date,
            .time {
                margin: 10px 10px;
            }

            .date-details,
            .time-details {
                padding: 10px 20px;
                font-size: .6em;
                width: 110px;
            }

            .class-details {
                width: 60%;
                justify-content: left;
            }

            .enroll-now {
                font-size: 1.2em;
                padding: 10px 10px;
                width: 30%;
                align-self: center;
            }

            .section-container-sec3 {
                flex-direction: column;
            }

            .left-part-sec3 {
                width: 100%;
                flex-wrap: wrap;
            }

            .right-part-sec3 {
                width: 100%;
            }

            .circle-sec3 {
                height: 100px;
                width: 100px;
            }

            .circle-sec3 p {
                font-size: .5em;
            }

            .section-container-sec4 {
                flex-direction: column;
            }

            .left-part-sec4 {
                flex-direction: column;
                width: 100%;
            }

            .right-part-sec4 {
                width: 100%;
            }

            .teacher-circle {
                align-self: center;
            }

            .info-box {
                width: 100%;
                margin-left: 0;
            }
        }

        @media (max-width:480px) and (min-width:340px) {
            main {
                padding: 10px;
            }

            .course-container {
                flex-direction: column-reverse;
            }

            .left-section {
                width: 100%;
            }

            .right-section {
                align-self: center;
                width: 50%;
            }

            .laptop {
                width: 100%;
            }

            .course-heading {
                font-size: 1.5em;
            }

            .course-tagline {
                font-size: .9em;
            }

            .capsule {
                width: 24%;
                padding: 5px 0;
                border-radius: 10px;
            }

            .capsule h3 {
                font-size: .6em;
            }

            .capsule p {
                font-size: .6em;
            }

            .course-content {
                flex-direction: column;
            }

            .course-content .column {
                width: 100%;
            }

            .course-content .column p {
                font-size: 1em;
            }

            .download-btn {
                font-size: .9em;
                padding: 10px 10px;
                width: 50%;
                text-align: center;
            }

            .section-container-sec2 {
                flex-direction: column;
            }

            .left-part {
                width: 100%;
                flex-wrap: wrap;
            }

            .circle-icon {
                height: 90px;
                width: 90px;
            }

            .circle p {
                font-size: .6em;
            }

            .right-part {
                width: 100%;
            }

            .date,
            .time {
                margin: 10px 10px;
            }

            .date-details,
            .time-details {
                padding: 10px 20px;
                font-size: .7em;
                width: 120px;
            }

            .class-details {
                width: 100%;
                justify-content: space-around;
            }

            .enroll-now {
                font-size: 1.2em;
                padding: 10px 10px;
                width: 50%;
                align-self: center;
            }

            .section-container-sec3 {
                flex-direction: column;
            }

            .left-part-sec3 {
                width: 100%;
                flex-wrap: wrap;
            }

            .right-part-sec3 {
                width: 100%;
            }

            .circle-sec3 {
                height: 90px;
                width: 90px;
            }

            .circle-sec3 p {
                font-size: .5em;
            }

            .section-container-sec4 {
                flex-direction: column;
            }

            .left-part-sec4 {
                flex-direction: column;
                width: 100%;
            }

            .right-part-sec4 {
                width: 100%;
            }

            .teacher-circle {
                align-self: center;
            }

            .info-box {
                width: 100%;
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
<?php include '../header.php' ?>
    <main>
        <section class="sec-1">
            <div class="course-container">
                <!-- Left Section -->
                <div class="left-section">
                    <!-- Course Title and Tagline -->
                    <h1 class="course-heading">Mastering Computer Architecture: Building the Foundation of Computing Systems</h1>
                    <h2 class="course-tagline">" Understand how computers are designed and built. "</h2>

                    <!-- Capsules Section -->
                    <div class="capsules">
                        <div class="capsule">
                            <h3>❇️Duration</h3>
                            <p>2 Months</p>
                        </div>
                        <div class="capsule" style="background-image: linear-gradient(#e0f7fa, #abe3eb);">
                            <h3 style="color: black;">❇️Fees</h3>
                            <p style="color: black;">1499/-</p>
                        </div>
                        <div class="capsule">
                            <h3>❇️Mode</h3>
                            <p>Online</p>
                        </div>
                        <div class="capsule">
                            <h3>❇️Level</h3>
                            <p>Basic to Advanced</p>
                        </div>
                    </div>

                    <!-- Horizontal Line -->
                    <hr>
                    <!-- Course Content Section -->
                    <div class="course-content">
                        <div class="column">
                            <p>➡️Introduction to Computer Architecture and System Design</p>
                            <p>➡️CPU Fundamentals: Components, Registers, and ALU</p>
                        </div>
                        <div class="column">
                            <p>➡️Instruction Set Architecture (ISA) and Machine Language</p>
                            <p>➡️Pipelining and Performance Enhancement</p>
                        </div>
                        <a href="" class="download-btn">Download Syllabus</a>
                    </div>
                </div>

                <!-- Right Section with Image -->
                <div class="right-section">
                    <img src="../img/ca-back.png" alt="Course Image" class="laptop">
                </div>
            </div>
        </section>


        <section class="sec-2">
            <div class="section-container-sec2">
                <!-- Left Section with Circles -->
                <div class="left-part">
                    <div class="circle">
                        <div class="circle-icon">
                            <img src="../img/class.png" alt="2 classes/Week Icon">
                        </div>
                        <p class="circle-text">💠2 classes/Week</p>
                    </div>
                    <div class="circle">
                        <div class="circle-icon">
                            <img src="../img/asses.png" alt="Weekly Assessment Icon">
                        </div>
                        <p class="circle-text">💠Weekly Assessment</p>
                    </div>
                    <div class="circle">
                        <div class="circle-icon">
                            <img src="../img/exam.png" alt="Monthly Exam Icon">
                        </div>
                        <p class="circle-text">💠Assign Projects</p>
                    </div>
                    <div class="circle">
                        <div class="circle-icon">
                            <img src="../img/live.png" alt="Live Classes Icon">
                        </div>
                        <p class="circle-text">💠Live Classes</p>
                    </div>
                    <div class="circle">
                        <div class="circle-icon">
                            <img src="../img/expart.png" alt="Expert Guidance Icon">
                        </div>
                        <p class="circle-text">💠Expert Guidance</p>
                    </div>
                </div>

                <!-- Right Section with Capsules -->
                <div class="right-part">
                    <div class="class-details">
                        <div class="date">
                            <h3 class="date-details" style="background-color:#69c1fb;">Starting On</h3>
                            <p class="date-details">01 | 01 | 2025</p>
                        </div>
                        <div class="time">
                            <h3 class="time-details" style="background-color:#69c1fb;">Class Time</h3>
                            <p class="time-details">Discuss on Group</p>
                        </div>
                    </div>
                    <a href="" class="enroll-now">Enroll Now</a>
                </div>
            </div>
        </section>


        <section class="sec-3">
            <div class="section-container-sec3">
                <!-- Left Section with Circles -->
                <div class="left-part-sec3">
                    <div class="circle-container">
                        <div class="circle-sec3">
                            <img src="../img/certificate.png" alt="Circle Image 1">
                        </div>
                        <div class="circle-text">💠Certificate</div>
                    </div>
                    <div class="circle-container">
                        <div class="circle-sec3">
                            <img src="../img/life-time.png" alt="Circle Image 2">
                        </div>
                        <div class="circle-text">💠Life Time Access</div>
                    </div>
                    <div class="circle-container">
                        <div class="circle-sec3">
                            <img src="../img/clear.png" alt="Circle Image 3">
                        </div>
                        <div class="circle-text">💠Clear Concept</div>
                    </div>
                    <div class="circle-container">
                        <div class="circle-sec3">
                            <img src="../img/real.png" alt="Circle Image 4">
                        </div>
                        <div class="circle-text">💠Real-life Problem Solving</div>
                    </div>
                </div>

                <!-- Right Section with Heading and Paragraph -->
                <div class="right-part-sec3">
                    <h2>Course Objective</h2>
                    <ul class="right-part-list">
                        <li>🔵Learn how modern CPUs are designed and optimized for performance.</li>
                        <li>🔵Understand the role of memory and storage in computer systems.</li>
                        <li>🔵Explore pipelining, parallelism, and advanced processing architectures.</li>
                        <li>🔵Build your own basic CPU model as a hands-on project.</li>
                    </ul>

                </div>
            </div>
        </section>


        <section class="sec-4">
            <div class="section-container-sec4">
                <!-- Left Section -->
                <div class="left-part-sec4">
                    <!-- Teacher Circle -->
                    <div class="teacher-circle">
                        <a href=""><img src="../img/ramesh-net.png" alt="Teacher Image"></a>
                    </div>

                    <!-- Box 1: Teacher Heading and Text -->
                    <div class="info">
                        <p>Name: Dr. Ramesh Iyer</p>
                        <p>Phone: +91 9876543210</p>
                        <p>Email: ramesh.iyer@computerscienceedu.com</p>
                        <hr>
                    </div>

                    <!-- Box 2: Teacher Description -->
                    <div class="info-box">
                        <h3>Instructor Interaction:</h3>
                        <p>Dr. Iyer fosters a collaborative learning environment where students are encouraged to ask
                            questions and participate in discussions. He provides one-on-one mentorship and regularly
                            organizes workshops and seminars with industry experts. His approachable nature ensures that
                            students feel comfortable seeking guidance and feedback on their projects.</p>
                    </div>
                </div>

                <!-- Right Section: FAQ -->
                <div class="right-part-sec4">
                    <h2 class="faq-heading">FAQ</h2>

                    <div class="faq-item">
                        <h4>What is the difference between computer architecture and computer organization?</h4>
                        <p>Computer architecture refers to the high-level design and structure of a system, while computer organization focuses on how the system's internal components are interconnected and function together.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h4>How can this course help me in my computer engineering career?</h4>
                        <p>This course provides deep insights into how computer systems are built and optimized, essential knowledge for careers in hardware design, embedded systems, or advanced software development.</p>
                    </div>

                    <div class="faq-item">
                        <h4>Will I get to work on practical projects?</h4>
                        <p>Yes, throughout the course, you will work on hands-on projects, including building a simplified CPU model, to apply the concepts you've learned.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include '../footer.php' ?>
</body>

</html>