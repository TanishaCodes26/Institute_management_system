<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        background-color: #f4f4ff;
    }

    .faculty-page {
        max-width: 95%;
        margin: 0 auto;
        text-align: center;
    }

    .page-heading {
        font-size: 2.5em;
        font-weight: bold;
        margin: 20px 0;
        color: black;
        text-align: center;
    }

    .faculty-table {
        width: 100%;
        /* border-collapse: collapse; */
    }

    .faculty-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        margin: 20px 0;
        box-shadow: 0 2px 5px gray;
        border-radius: 10px;
    }

    .faculty-row.odd {
        background-color: #b8d1eb;
        flex-direction: row;
    }

    .faculty-row.even {
        background-color: #72acea;
        flex-direction: row-reverse;
    }

    /* Faculty Image and Details */
    .faculty-img {
        text-align: center;
    }

    .faculty-img img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .faculty-name-email {
        font-size: 1em;
        color: black;
    }

    /* Column Titles */
    .faculty-details {
        color: black;
        width: 25%;
        text-align: left;
        padding: 0 10px;
    }

    .faculty-details-heading {
        font-size: 1.2em;
        text-align: center;
        margin-bottom: 10px;
    }

    .faculty-details-list {
        color: black;
        font-size: 1em;
        list-style: square;
    }

    .faculty-details-list li {
        margin-bottom: 5px;
    }

    .faculty-details p {
        text-align: justify;
    }



    @media (max-width:831px) and (min-width:651px) {
        .faculty-row {
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
        }

        .faculty-details {
            width: 45%;
        }
    }

    @media (max-width:650px) and (min-width:481px) {
        .faculty-row {
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
        }

        .faculty-details {
            width: 70%;
        }
    }

    @media (max-width:480px) and (min-width:340px) {
        .faculty-row {
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
        }

        .faculty-details {
            width: 70%;
        }
    }
    </style>
    <title>Faculty</title>
</head>

<body>
    <?php include 'header.php' ?>
    <main>
        <!-- Page Heading -->
        <h1 class="page-heading">Our Faculty</h1>

        <section class="faculty-page">

            <!-- Faculty Table -->
            <div class="faculty-table">

                <!-- Faculty Row 1 (Odd) -->
                <div class="faculty-row odd">
                    <div class="faculty-img">
                        <img src="../Project-WEB/img/anirban-dsa.png" alt="Teacher Image">
                        <p class="faculty-name-email">Dr. Arindam Mukherjee<br>arindam.mukherjee@csedu.in</p>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Qualification</h3>
                        <ul class="faculty-details-list">
                            <li>PhD in Computer Science from Carnegie Mellon University, USA</li>
                            <li>M.Tech in Computer Science from Indian Institute of Technology (IIT), Kharagpur</li>
                            <li>B.Tech in Information Technology from Jadavpur University, Kolkata</li>
                        </ul>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Focused Area</h3>
                        <ul class="faculty-details-list">
                            <li>Fundamentals of Programming with C</li>
                            <li>Advanced C++ Programming and Object-Oriented Design</li>
                            <li>Data Structures and Algorithms (Undergraduate and Postgraduate)</li>
                            <li>Competitive Coding and Problem Solving with C++</li>
                            <li>Systems Programming with C/C++</li>
                        </ul>
                    </div>
                    <div class="faculty-details experience">
                        <h3 class="faculty-details-heading">Experience</h3>
                        <p>Dr. Arindam Mukherjee has over 15 years of experience in teaching and mentoring students in
                            programming languages and core computer science topics, specializing in C, C++, and Data
                            Structures & Algorithms (DSA). He has worked with various prestigious institutions and has
                            conducted numerous coding workshops for competitive programming. His background includes
                            contributions to both academic research and large-scale industry projects involving systems
                            programming and algorithm design.</p>
                    </div>
                </div>

                <!-- Faculty Row 2 (Even) -->
                <div class="faculty-row even">
                    <div class="faculty-img">
                        <img src="../Project-WEB/img/priya-py.png" alt="Teacher Image">
                        <p class="faculty-name-email">Dr. Priya Reddy<br>priya.reddy@aiml.edu.in</p>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Qualification</h3>
                        <ul class="faculty-details-list">
                            <li>PhD in Artificial Intelligence and Machine Learning from Stanford University</li>
                            <li>M.Tech in Data Science and AI from Indian Institute of Technology (IIT), Madras</li>
                            <li>B.Tech in Computer Science from Anna University, Chennai</li>
                        </ul>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Focused Area</h3>
                        <ul class="faculty-details-list">
                            <li>Python for Machine Learning (Undergraduate)</li>
                            <li>Artificial Intelligence with Python (Postgraduate)</li>
                            <li>Deep Learning with TensorFlow and Keras</li>
                            <li>Natural Language Processing using Python</li>
                            <li>AI for Business Applications</li>
                        </ul>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Experience</h3>
                        <p>Dr. Priya Reddy has over 10 years of academic and industry experience specializing in Python
                            programming, artificial intelligence, and machine learning. She has worked as a research
                            scientist with Google AI and led multiple AI-driven projects at Microsoft Research Labs. In
                            academia, Dr. Reddy has been instrumental in developing advanced AI and machine learning
                            courses, making her an expert in the field.</p>
                    </div>
                </div>

                <!-- Faculty Row 3 (Odd) -->
                <div class="faculty-row odd">
                    <div class="faculty-img">
                        <img src="../Project-WEB/img/ramesh-java.png" alt="Teacher Image">
                        <p class="faculty-name-email">Dr. Ramesh Gupta<br>ramesh.gupta@softwareedu.in</p>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Qualification</h3>
                        <ul class="faculty-details-list">
                            <li>PhD in Software Engineering with a focus on Java-based Enterprise Applications,
                                University of Illinois, Urbana-Champaign</li>
                            <li>M.Tech in Computer Science from Indian Institute of Technology (IIT), Delhi</li>
                            <li>B.Tech in Computer Science and Engineering from National Institute of Technology (NIT),
                                Trichy</li>
                        </ul>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Focused Area</h3>
                        <ul class="faculty-details-list">
                            <li>Introduction to Java Programming (Undergraduate)</li>
                            <li>Advanced Java Programming and Web Development (Postgraduate)</li>
                            <li>Java EE and Spring Framework for Enterprise Applications</li>
                            <li>Software Design Patterns with Java</li>
                            <li>Mobile Application Development with Java and Android</li>
                        </ul>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Experience</h3>
                        <p> Dr. Ramesh Gupta brings over 12 years of teaching and industry experience, specializing in
                            Java programming and software development. He has worked as a software architect for IBM and
                            Oracle, where he led projects on Java-based enterprise applications. His academic career is
                            focused on teaching core and advanced Java concepts, helping students build a strong
                            foundation in object-oriented programming and enterprise-level software design.</p>
                    </div>
                </div>

                <!-- Faculty Row 4 (Even) -->
                <div class="faculty-row even">
                    <div class="faculty-img">
                        <img src="../Project-WEB/img/aditi-front.png" alt="Teacher Image">
                        <p class="faculty-name-email">Ms. Aditi Sharma<br>aditi.sharma@webedu.com</p>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Qualification</h3>
                        <ul class="faculty-details-list">
                            <li>M.S. in Web Development from University of California, Berkeley</li>
                            <li>B.Tech in Computer Science and Engineering from Vellore Institute of Technology (VIT)
                            </li>
                        </ul>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Focused Area</h3>
                        <ul class="faculty-details-list">
                            <li>Introduction to HTML, CSS, and JavaScript</li>
                            <li>Advanced Front-End Development with React</li>
                            <li>Building Responsive Web Applications</li>
                            <li>UI/UX Design Fundamentals</li>
                            <li>Capstone Project in Front-End Development</li>
                        </ul>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Experience</h3>
                        <p>Ms. Aditi Sharma has over 8 years of experience in front-end development and UI/UX design.
                            She has worked with top tech companies like Google and Adobe, where she contributed to the
                            design and development of user-friendly web applications. Her passion for teaching has led
                            her to mentor aspiring web developers, helping them build a strong foundation in front-end
                            technologies.</p>
                    </div>
                </div>

                <!-- Faculty Row 5 (Odd) -->
                <div class="faculty-row odd">
                    <div class="faculty-img">
                        <img src="../Project-WEB/img/bikram-back.png" alt="Teacher Image">
                        <p class="faculty-name-email">Mr. Vikram Patel<br>vikram.patel@backendedu.com</p>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Qualification</h3>
                        <ul class="faculty-details-list">
                            <li>M.S. in Software Engineering from Stanford University</li>
                            <li>B.Tech in Computer Science and Engineering from Indian Institute of Technology (IIT),
                                Kanpur</li>
                        </ul>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Focused Area</h3>
                        <ul class="faculty-details-list">
                            <li>Introduction to Server-Side Development</li>
                            <li>Advanced Back-End Development with Node.js</li>
                            <li>Database Management and SQL</li>
                            <li>API Development and Integration</li>
                            <li>Capstone Project in Back-End Development</li>
                        </ul>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Experience</h3>
                        <p>Mr. Vikram Patel has over 10 years of experience in back-end development, specializing in
                            server-side programming and database management. He has worked with leading tech companies
                            such as Amazon and Microsoft, where he contributed to the development of scalable and
                            efficient back-end systems. His extensive industry experience allows him to provide students
                            with valuable insights into real-world application development.</p>
                    </div>
                </div>

                <!-- Faculty Row 6 (Even) -->
                <div class="faculty-row even">
                    <div class="faculty-img">
                        <img src="../Project-WEB/img/ramesh-net.png" alt="Teacher Image">
                        <p class="faculty-name-email">Dr. Ramesh Iyer<br>ramesh.iyer@computerscienceedu.com</p>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Qualification</h3>
                        <ul class="faculty-details-list">
                            <li>Ph.D. in Computer Science from Massachusetts Institute of Technology (MIT)</li>
                            <li>M.Tech in Computer Science and Engineering from Indian Institute of Technology (IIT),
                                Bombay</li>
                            <li>B.E. in Computer Engineering from Pune Institute of Computer Technology</li>
                        </ul>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Focused Area</h3>
                        <ul class="faculty-details-list">
                            <li>Computer Networking</li>
                            <li>Computer Architecture</li>
                            <li>Digital Electronics</li>
                            <li>Operating Systems</li>
                            <li>Advanced Topics in Computer Networking</li>
                        </ul>
                    </div>
                    <div class="faculty-details">
                        <h3 class="faculty-details-heading">Experience</h3>
                        <p> Dr. Ramesh Iyer has over 12 years of experience in the fields of computer networking,
                            architecture, and operating systems. He has worked with major tech companies such as Cisco
                            and IBM, where he was involved in designing and optimizing network systems. His extensive
                            experience allows him to bridge the gap between theoretical knowledge and practical
                            application, providing students with a comprehensive learning experience.</p>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <?php include 'footer.php' ?>
</body>

</html>