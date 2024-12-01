<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    * {
        padding: 0px;
        margin: 0px;
    }

    body {
        background-color: #f4f4ff;
        font-family: 'poppins', sans-serif;
    }

    .tag-line {
        height: 30px;
        background-color: rgb(225, 172, 50);
        font-size: 1.2em;
    }

    .section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 50px;
        background-color: white;
    }

    .left-box {
        width: 40%;
    }

    .welcome {
        font-size: 2.8em;
        font-weight: bold;
        color: black;
        margin-bottom: 20px;
    }

    .tagline {
        font-size: 1.6em;
        color: #0099ff;
        margin-bottom: 15px;
    }

    .courses {
        font-size: 1.3em;
        color: #5e17eb;
        height: 40px;
        margin-bottom: 20px;
        white-space: nowrap;
        overflow: hidden;
    }

    .course-btn {
        padding: 10px 20px;
        background-color: #2980b9;
        color: white;
        text-decoration: none;
        font-size: 1.2em;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .course-btn:hover {
        background-color: cadetblue;
        color: black;
        box-shadow: 2px 2px 5px black;
    }

    /* Clock container */
    .clock-container {
        position: absolute;
        top: 180px;
        left: 70px;
        width: 30%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: 'Arial', sans-serif;
        color: black;
        background-color: #4ea6cf;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    /* Clock time */
    .clock {
        font-size: 2em;
        margin-bottom: 10px;
    }

    /* Date */
    .date {
        font-size: 1.5em;
    }



    /* Image Slider */
    .slider {
        width: 60%;
        height: 400px;
        position: relative;
        overflow: hidden;
    }

    .slider img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .slider img.active {
        opacity: 1;
    }



    /* section 2 */
    .about-notice-section {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        background-color: #f5f5f5;
        overflow: hidden;
    }

    .about-us {
        width: 60%;
        padding: 20px;
        border-right: 2px solid #2c3e50;
        animation: slideInLeft 0.5s forwards;
    }

    .about-us h2 {
        font-size: 2em;
        margin-bottom: 10px;
        position: relative;
    }

    .about-us h2::after {
        content: '';
        position: absolute;
        width: 4px;
        background-color: #2c3e50;
        height: 100%;
        top: 0;
        left: -8px;
    }

    .about-us p {
        font-size: 1.2em;
        margin: 20px 0;
    }

    .about-us a {
        font-weight: bold;
        text-decoration: none;
        color: #2c3e50;
        font-size: 1.2em;
    }

    .latest-notices {
        width: 35%;
        padding: 20px;
        animation: slideInRight 0.5s forwards;
    }

    .latest-notices h3 {
        position: relative;
        font-size: 1.8em;
        margin-bottom: 10px;
    }

    .latest-notices h3::after {
        content: '';
        position: absolute;
        width: 4px;
        background-color: #2c3e50;
        height: 100%;
        top: 0;
        left: -10px;
    }

    .notice {
        border: 1px solid #2c3e50;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #ffffff;
        transition: transform 0.2s;
    }

    .notice:hover {
        transform: scale(1.02);
        color: #0099ff;
    }

    .watch-more {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 15px;
        background-color: #2c3e50;
        color: white;
        text-decoration: none;
        border-radius: 10px;
        font-weight: bold;
        transition: all .3s ease;
    }

    .watch-more:hover {
        background-color: #0099ff;
    }

    /* Animations */
    @keyframes slideInLeft {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }



    /* Section 3 */
    .popular-courses {
        text-align: center;
        padding: 40px 20px;
    }

    .popular-courses h2 {
        margin-bottom: 30px;
        font-size: 2em;
        color: #333;
    }

    .course-cards {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        width: 400px;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
        /* Initially hidden for animation */
    }

    .card:hover {
        box-shadow: 5px 5px 10px black;
    }

    .card.visible {
        opacity: 1;
        transform: translateY(0);
        animation: slideIn 0.5s forwards ease;
        /* Animation only when visible */
    }

    .card img {
        width: 120px;
        height: auto;
        border-radius: 10px;
    }

    .card h3 {
        margin: 10px 0;
        font-size: 1.5em;
    }

    .card p {
        margin-bottom: 15px;
        font-size: 0.9em;
        color: black;
    }

    .explore-button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none;
        font-size: 1em;
        transition: background-color 0.3s ease;
    }

    .explore-button:hover {
        background-color: cadetblue;
    }

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


    /* section 4 */
    .key-features {
        padding: 60px 20px;
        background-color: #e0f7fa;
        text-align: center;
    }

    .key-features h2 {
        font-size: 2em;
        color: #333;
        margin-bottom: 50px;
        letter-spacing: 1px;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        padding: 0 20px;
    }

    .feature-card {
        background-color: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        text-align: center;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
    }

    .feature-card i {
        font-size: 3.5em;
        color: #00796b;
        margin-bottom: 20px;
    }

    .feature-card h3 {
        font-size: 1.6em;
        color: #333;
        margin-bottom: 15px;
    }

    .feature-card p {
        font-size: 1em;
        color: #555;
    }



    /* Social Media Section */
    .social-media {
        text-align: center;
        padding: 10px 20px;
        background-color: #77a1bd;
        color: white;
    }

    .social-media h2 {
        font-size: 2em;
        margin-bottom: 20px;
        color: #fff;
    }

    /* Social Media Icons Container */
    .social-icons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 40px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    /* Social Media Icon Styles */
    .social-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        color: #00796b;
        font-size: 1.8em;
        text-decoration: none;
        cursor: pointer;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .social-icon:hover {
        transform: translateY(-10px);
        background-color: #004d40;
        color: white;
    }

    /* Icon colors */
    .facebook {
        background-color: #3b5998;
        color: white;
    }

    .instagram {
        background-color: #e1306c;
        color: white;
    }

    .youtube {
        background-color: #ff0000;
        color: white;
    }

    .linkedin {
        background-color: #0077b5;
        color: white;
    }



    @media (max-width:1340px) and (min-width:1001px) {
        .clock-container {
            width: 25%;
            font-size: 1em;
            padding: 20px;
        }

        .welcome {
            font-size: 2.2em;
        }

    }

    @media (max-width:1000px) and (min-width:831px) {
        .clock-container {
            width: 25%;
            font-size: .7em;
            padding: 20px;
        }

        .welcome {
            font-size: 1.7em;
        }

        .tagline {
            font-size: 1.3em;
        }

        .courses {
            font-size: 1em;
        }
    }

    @media (max-width:830px) and (min-width:651px) {
        .section {
            flex-direction: column;
        }

        .left-box {
            width: 100%;
        }

        .slider {
            width: 100%;
            height: 250px;
            margin-top: 20px;

        }

        .clock-container {
            top: 220px;
            left: 470px;
            width: 25%;
            font-size: .5em;
            padding: 10px;
        }

        .welcome {
            font-size: 2em;
        }

        .tagline {
            font-size: 1.5em;
        }

        .courses {
            font-size: 1em;
        }

    }

    @media (max-width:650px) and (min-width:481px) {
        .section {
            flex-direction: column;
            padding: 20px;
        }

        .left-box {
            width: 100%;
        }

        .slider {
            width: 100%;
            height: 250px;
            margin-top: 20px;

        }

        .clock-container {
            top: 15px;
            left: 350px;
            width: 25%;
            font-size: .5em;
            padding: 10px;
        }

        .welcome {
            font-size: 2em;
        }

        .tagline {
            font-size: 1.5em;
        }

        .courses {
            font-size: 1em;
        }

        .about-us {
            padding: 10px;
            width: 40%;
        }

        .about-us h2 {
            font-size: 1.5em;
        }

        .about-us p {
            font-size: 1em;
        }

        .latest-notices {
            padding: 10px;
            width: 60%;
        }

        .latest-notices h3 {
            font-size: 1.5em;
        }
    }

    @media (max-width:480px) and (min-width:400px) {
        .section {
            flex-direction: column;
            padding: 20px;
        }

        .left-box {
            width: 100%;
        }

        .slider {
            width: 100%;
            height: 250px;
            margin-top: 20px;

        }

        .clock-container {
            top: 10px;
            left: 300px;
            width: 25%;
            font-size: .4em;
            padding: 5px;
            font-weight: bold;
        }

        .welcome {
            font-size: 1.7em;
        }

        .tagline {
            font-size: 1.2em;
        }

        .courses {
            font-size: .8em;
        }

        .about-notice-section {
            flex-direction: column;
        }

        .about-us {
            padding: 10px;
            width: 100%;
            border: none;
        }

        .about-us h2 {
            font-size: 1.5em;
        }

        .about-us p {
            font-size: 1em;
        }

        .latest-notices {
            padding: 10px;
            width: 100%;
        }

        .latest-notices h3 {
            font-size: 1.5em;
        }

        .social-icons {
            gap: 20px;
        }
    }

    @media (max-width:401px) and (min-width:340px) {
        .section {
            flex-direction: column;
            padding: 20px;
        }

        .left-box {
            width: 100%;
        }

        .slider {
            width: 100%;
            height: 250px;
            margin-top: 20px;

        }

        .clock-container {
            top: 10px;
            left: 250px;
            width: 25%;
            font-size: .4em;
            padding: 5px;
            font-weight: bold;
        }

        .welcome {
            font-size: 1.7em;
        }

        .tagline {
            font-size: 1.2em;
        }

        .courses {
            font-size: .8em;
        }

        .about-notice-section {
            flex-direction: column;
        }

        .about-us {
            padding: 10px;
            width: 100%;
            border: none;
        }

        .about-us h2 {
            font-size: 1.5em;
        }

        .about-us p {
            font-size: 1em;
        }

        .latest-notices {
            padding: 10px;
            width: 100%;
        }

        .latest-notices h3 {
            font-size: 1.5em;
        }

        .social-icons {
            gap: 20px;
        }
    }
    </style>
    <title>Home</title>
</head>

<body>
    <?php include 'header.php' ?>
    <main>
        <!-- Clock Container -->
        <div class="clock-container">
            <div id="clock" class="clock"></div>
            <div id="date" class="date"></div>
        </div>
        <marquee behavior="scroll" direction="left" class="tag-line">Welcome to Coder's Goal, Unlock Your Potential,
            Master
            the Future Start Your Journey with Us.</marquee>
        <section class="section">


            <!-- Left Side with Welcome Message -->
            <div class="left-box">
                <h1 class="welcome">Welcome to Coder's Goal</h1>
                <p class="tagline">"Empowering Future Innovators"</p>
                <div class="courses">
                    <span id="course-name" style="font-size: 1.4em;"></span>
                </div>
                <a href="/Project-WEB/course.php" class="course-btn">Explore Our Courses</a>
            </div>

            <!-- Right Side with Image Slider -->
            <div class="slider">
                <img src="https://plus.unsplash.com/premium_photo-1688466339297-4a65503b30c8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW5zdGl0dXRlJTIwaW1nfGVufDB8fDB8fHww"
                    alt="Institute Image 1" class="active">
                <img src="https://images.unsplash.com/photo-1692153610017-bdec76d27690?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8aW5zdGl0dXRlJTIwaW1nfGVufDB8fDB8fHww"
                    alt="Institute Image 2">
                <img src="https://images.unsplash.com/photo-1629436832213-2213fb7ceaf1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGluc3RpdHV0ZSUyMGltZ3xlbnwwfHwwfHx8MA%3D%3D"
                    alt="Institute Image 3">
            </div>
        </section>
       
        <section class="about-notice-section">
            <!-- About Us Section -->
            <div class="about-us">
                <h2>About Us</h2>
                <p>Welcome to Coder's Goal! We are dedicated to providing the best programming education, equipping
                    students
                    with skills to excel in the tech industry. Our courses are designed to meet the current industry
                    standards and
                    prepare students for real-world challenges.</p>
                <a href="../Project-WEB/about.php">See More</a>
            </div>

            <!-- Latest Notices Section -->
            <div class="latest-notices">
                <h3>Latest Notices</h3>
                <div class="notice">New course on JavaScript starting from next month!</div>
                <div class="notice">Enrollment for the upcoming semester is open now!</div>
                <div class="notice">Scholarship applications are now being accepted!</div>
                <div class="notice">Guest lecture by industry experts on Python!</div>
                <div class="notice">Coding competition registration is now live!</div>
                <a href="notices.html" class="watch-more">Watch More</a>
            </div>
        </section>

        <section>
            <div class="popular-courses">
                <h2>Most Popular Courses</h2>
                <div class="course-cards">
                    <div class="card">
                        <img src="../Project-WEB/img/c.png" alt="Course 1">
                        <h3>C Programming</h3>
                        <p>"This course is designed to introduce beginners to the fundamentals of C programming."</p>
                        <a href="../Project-WEB/course/c.html" class="explore-button">Explore</a>
                    </div>
                    <div class="card">
                        <img src="../Project-WEB/img/dsa.png" alt="Course 2">
                        <h3>Data Structure & Algorithm</h3>
                        <p>"This DSA course is designed to help students master data structures and algorithms, which
                            are essential for solving complex coding problems and cracking technical interviews."</p>
                        <a href="../Project-WEB/course/dsa.html" class="explore-button">Explore</a>
                    </div>
                    <div class="card">
                        <img src="../Project-WEB/img/py.png" alt="Course 3">
                        <h3>Python</h3>
                        <p>"This Python course is ideal for beginners who want to learn coding, as well as for
                            experienced developers looking to advance their skills."</p>
                        <a href="../Project-WEB/course/py.html" class="explore-button">Explore</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="key-features">
            <h2>Our Key Features</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <i class="fa fa-user-tie"></i>
                    <h3>Expert Faculty</h3>
                    <p>Get guidance from experienced professionals who are experts in their fields.</p>
                </div>
                <div class="feature-card">
                    <i class="fa fa-headset"></i>
                    <h3>24/7 Online Support</h3>
                    <p>Our support team is available anytime, ensuring you get help whenever needed.</p>
                </div>
                <div class="feature-card">
                    <i class="fa fa-building"></i>
                    <h3>Modern Infrastructure</h3>
                    <p>Our facilities are equipped with the latest technology and resources for optimal learning.</p>
                </div>
                <div class="feature-card">
                    <i class="fa fa-book"></i>
                    <h3>Wide Range of Courses</h3>
                    <p>Explore a variety of courses designed to meet the diverse needs of all students.</p>
                </div>
            </div>
        </section>

        <!-- Social Media Section -->
        <section class="social-media">
            <h2>Follow Us</h2>
            <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=61556110485652" target="_blank"
                    class="social-icon facebook">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/codergoals_/" target="_blank" class="social-icon instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/@codergoals" target="_blank" class="social-icon youtube">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://linkedin.com" target="_blank" class="social-icon linkedin">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </section>
    </main>
    <?php include 'footer.php' ?>

    <script>
      //Clock
      function updateClock() {
            const now = new Date();
            let hours = now.getHours();
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            // Convert to 12-hour format
            const amPm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // If hours = 0, set it to 12

            const timeString = `${hours}:${minutes}:${seconds} ${amPm}`;

            const dateString = now.toDateString();

            document.getElementById('clock').textContent = timeString;
            document.getElementById('date').textContent = dateString;
        }

        // Update clock every second
        setInterval(updateClock, 1000);
        // Initialize clock immediately
        updateClock();

        // JavaScript for course animation (typewriter effect)
        const courses = [
            "C Language", "C++", "Python",
            "Java", "HTML", "CSS", "Java Script",
            "MySQL", "php", "Computer Networking",
            "Computer Architecture", "Digital Electronis",
            "Operating System", "AI/ML", "React", "Data Structure & Algorithm"
        ];

        let currentCourse = 0;
        let courseNameElement = document.getElementById('course-name');
        let typingInterval;

        function typeCourse() {
            const course = courses[currentCourse];
            let charIndex = 0;
            courseNameElement.innerHTML = '';

            typingInterval = setInterval(() => {
                if (charIndex < course.length) {
                    courseNameElement.innerHTML += course[charIndex];
                    charIndex++;
                } else {
                    clearInterval(typingInterval);
                    setTimeout(() => {
                        courseNameElement.innerHTML = '';
                        currentCourse = (currentCourse + 1) % courses.length;
                        typeCourse();
                    }, 2000);
                }
            }, 150);
        }

        typeCourse();

        // JavaScript for image slider
        const images = document.querySelectorAll('.slider img');
        let currentImage = 0;

        function changeImage() {
            images[currentImage].classList.remove('active');
            currentImage = (currentImage + 1) % images.length;
            images[currentImage].classList.add('active');
        }

        setInterval(changeImage, 5000);

        // Function to check if an element is in the viewport
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Function to add the animation class when the section is visible
        function handleScroll() {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                if (isElementInViewport(card) && !card.classList.contains('visible')) {
                    card.classList.add('visible');
                    card.style.animationDelay = `${index * 0.1}s`; // Stagger animations
                }
            });
        }

        // Attach scroll event listener
        window.addEventListener('scroll', handleScroll);


        // Function to check if an element is in the viewport
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Function to add the animation class when the section is visible
        function handleScroll() {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                if (isElementInViewport(card) && !card.classList.contains('visible')) {
                    card.classList.add('visible');
                    card.style.animationDelay = `${index * 0.1}s`; // Stagger animations
                }
            });
        }

        // Attach scroll event listener
        window.addEventListener('scroll', handleScroll);
    </script>
</body>
</html>