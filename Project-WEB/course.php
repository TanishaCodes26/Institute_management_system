<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    * {
        padding: 0;
        margin: 0;
    }

    body {
        background-color: #f4f4ff;
    }

    .hero {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        background-image: url(https://images.unsplash.com/photo-1504507926084-34cf0b939964?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzh8fGNvdXJzZSUyMGltZ3xlbnwwfHwwfHx8MA%3D%3D);
        background-size: auto;
        background-position: center;
        color: white;
        text-align: center;
        position: relative;
    }

    .hero::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.637);
        /* Dark overlay for readability */
    }

    .hero-content {
        position: relative;
        z-index: 1;
        /* Bring content above the overlay */
    }

    .hero h1 {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .hero p {
        font-size: 1.2em;
        margin-bottom: 10px;
    }



    .course-section {
        padding: 40px;
        text-align: center;

    }

    .course-section h2 {
        font-size: 2.5em;
        margin-bottom: 30px;
        color: black;
    }

    .course-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 15px;
    }

    .card {
        width: 300px;
        height: 320px;
        border: 1px solid transparent;
        border-radius: 20px;
        padding: 20px;
        text-align: center;
        transition: all .3s ease;
        opacity: 0;
        transform: translateY(20px);
        animation: slideIn 0.5s forwards .3s;
        margin: 10px;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
        background-color: white;
    }

    .card img {
        width: 100px;
        height: auto;
        margin-bottom: 20px;
    }

    .card h3 {
        font-size: 1.5em;
        margin-bottom: 10px;
        color: black;
    }

    .card p {
        font-size: 1em;
        margin-bottom: 20px;
        color: black;
    }

    .explore-button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 15px;
        cursor: pointer;
        text-decoration: none;
        font-size: 1em;
        transition: all 0.3s ease;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.7);
        animation: glow 1s infinite alternate;
    }

    @keyframes glow {
        0% {
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.7);
        }

        100% {
            box-shadow: 0 0 20px rgba(0, 123, 255, 1);
        }
    }

    .explore-button:hover {
        background-color: #0056b3;
    }

    /* Slide-in animation */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }



    .tution-sec {
        text-align: center;
        padding: 2em 0;
        background-color: #f8f9fa;
    }

    .body-heading {
        font-size: 2.5em;
        margin-bottom: 1.5em;
        color: black;
    }

    /* Tuition Cards Container */
    .tution-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Individual Tuition Cards */
    .tution-card {
        background-color: #fff;
        width: 18em;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 1.5em;
        transition: all 0.3s ease;
        position: relative;
    }

    .tution-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Tuition Card Heading */
    .tution-box-heading {
        font-size: 1.5em;
        margin-bottom: 1em;
        color: #00796b;
    }

    /* Tuition Card Paragraph */
    .tution-box-para {
        font-size: 1em;
        color: black;
        margin-bottom: 1.5em;
    }

    /* Explore Button Styling */
    .tution-box-btn {
        padding: 0.8em 1.2em;
        background-color: #00796b;
        border: none;
        color: #fff;
        border-radius: 10px;
        font-size: 1.1em;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .tution-box-btn:hover {
        background-color: #005a4c;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }



    @media (max-width:831px) and (min-width:651px) {
        .hero h1 {
            font-size: 2.2em;
        }

        .card {
            height: auto;
            width: 100%;
            box-shadow: 0 2px 5px black;
        }

    }

    @media (max-width:650px) and (min-width:481px) {
        .hero h1 {
            font-size: 1.6em;
        }

        .hero p {
            font-size: 1.1em;
        }

        .card {
            height: auto;
            width: 100%;
            box-shadow: 0 2px 5px black;
        }
    }

    @media (max-width:480px) and (min-width:340px) {
        .hero h1 {
            font-size: 1.1em;
        }

        .hero p {
            font-size: .9em;
        }

        .card {
            height: auto;
            width: 100%;
            box-shadow: 0 2px 5px black;
        }
    }
    </style>
    <title>Course</title>
</head>

<body>
    <?php include 'header.php' ?>
    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Transform Your Future with Our Courses</h1>
                <p>Empower yourself with knowledge and skills for a successful career.</p>
            </div>
        </section>

        <section class="course-section">
            <h2>Our Courses</h2>
            <div class="course-cards">
                <div class="card">
                    <img src="../Project-WEB/img/c.png" alt="C Language">
                    <h3>C Language</h3>
                    <p>Learn the fundamentals of C programming from scratch.</p>
                    <a href="../Project-WEB/course/c.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/c++.png" alt="C++">
                    <h3>C++</h3>
                    <p>Master object-oriented programming with C++.</p>
                    <a href="../Project-WEB/course/c++.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/py.png" alt="Python">
                    <h3>Python</h3>
                    <p>Dive into Python for versatile programming and automation.</p>
                    <a href="../Project-WEB/course/py.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/java.png" alt="Java" style="width: 60px;">
                    <h3>Java</h3>
                    <p>Explore the world of Java for modern development.</p>
                    <a href="../Project-WEB/course/java.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/dsa.png" alt="Data Structure & Algorithm">
                    <h3>Data Structure & Algorithm</h3>
                    <p>Learn how to structure and optimize data for efficiency.</p>
                    <a href="../Project-WEB/course/dsa.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/html.png" alt="HTML">
                    <h3>HTML</h3>
                    <p>Build the foundation of web development with HTML.</p>
                    <a href="../Project-WEB/course/html.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/css.png" alt="CSS">
                    <h3>CSS</h3>
                    <p>Design beautiful websites with powerful CSS styling.</p>
                    <a href="../Project-WEB/course/css.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/js.png" alt="JavaScript">
                    <h3>JavaScript</h3>
                    <p>Enhance website interactivity with JavaScript.</p>
                    <a href="../Project-WEB/course/js.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/sql.png" alt="MySQL">
                    <h3>MySQL</h3>
                    <p>Manage databases with MySQL for data storage and retrieval.</p>
                    <a href="../Project-WEB/course/sql.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/php.png" alt="PHP" style="width: 180px;">
                    <h3>PHP</h3>
                    <p>Develop dynamic websites using PHP server-side scripting.</p>
                    <a href="../Project-WEB/course/php.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/cn.png" alt="Computer Networking">
                    <h3>Computer Networking</h3>
                    <p>Learn the principles of networking for modern communication.</p>
                    <a href="../Project-WEB/course/cn.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/ca.png" alt="Computer Architecture">
                    <h3>Computer Architecture</h3>
                    <p>Understand how computers are designed and built.</p>
                    <a href="../Project-WEB/course/ca.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/de.png" alt="Digital Electronics">
                    <h3>Digital Electronics</h3>
                    <p>Explore the fundamentals of digital electronic systems.</p>
                    <a href="../Project-WEB/course/de.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/os.png" alt="Operating System">
                    <h3>Operating System</h3>
                    <p>Master the concepts behind modern operating systems.</p>
                    <a href="../Project-WEB/course/os.html" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/ai.png" alt="AI/ML">
                    <h3>AI/ML</h3>
                    <p>Dive deep into Artificial Intelligence and Machine Learning.</p>
                    <a href="../Project-WEB/course/ai.php" class="explore-button">Explore</a>
                </div>
                <div class="card">
                    <img src="../Project-WEB/img/react.png" alt="React">
                    <h3>React</h3>
                    <p>Build modern web applications with React.</p>
                    <a href="../Project-WEB/course/react.html" class="explore-button">Explore</a>
                </div>
            </div>
        </section>

        <section class="tution-sec">
            <h2 class="body-heading">Available Tuition</h2>
            <div class="tution-container">
                <div class="tution-card">
                    <h3 class="tution-box-heading">BCA 1st Semester</h3>
                    <p class="tution-box-para">Build Your Foundation:<br>Master Core Concepts</p>
                    <button class="tution-box-btn">Explore</button>
                </div>
                <div class="tution-card">
                    <h3 class="tution-box-heading">BCA 2nd Semester</h3>
                    <p class="tution-box-para">Expand Your Knowledge:<br>Dive Deeper into Programming</p>
                    <button class="tution-box-btn">Explore</button>
                </div>
                <div class="tution-card">
                    <h3 class="tution-box-heading">BCA 3rd Semester</h3>
                    <p class="tution-box-para">Unlock New Horizons:<br>Explore Advanced Computing</p>
                    <button class="tution-box-btn">Explore</button>
                </div>
                <div class="tution-card">
                    <h3 class="tution-box-heading">BCA 4th Semester</h3>
                    <p class="tution-box-para">Prepare for Real-World Applications:<br>Strengthen Core Skills</p>
                    <button class="tution-box-btn">Explore</button>
                </div>
                <div class="tution-card">
                    <h3 class="tution-box-heading">BCA 5th Semester</h3>
                    <p class="tution-box-para">Master Emerging Technologies:<br>Stay Ahead of Trends</p>
                    <button class="tution-box-btn">Explore</button>
                </div>
                <div class="tution-card">
                    <h3 class="tution-box-heading">BCA 6th Semester</h3>
                    <p class="tution-box-para">Specialize and Excel:<br>Focus on Advanced Electives</p>
                    <button class="tution-box-btn">Explore</button>
                </div>
                <div class="tution-card">
                    <h3 class="tution-box-heading">BCA 7th Semester</h3>
                    <p class="tution-box-para">Final Stretch:<br>Prepare for Graduation and Career Success</p>
                    <button class="tution-box-btn">Explore</button>
                </div>
                <div class="tution-card">
                    <h3 class="tution-box-heading">BCA 8th Semester</h3>
                    <p class="tution-box-para">Capstone Success:<br>Complete Your Major Project with Confidence</p>
                    <button class="tution-box-btn">Explore</button>
                </div>
            </div>
        </section>

    </main>
    <?php include 'footer.php' ?>
</body>
</html>