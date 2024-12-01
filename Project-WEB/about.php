<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    /* General Styling */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    .about-us-section {
        display: flex;
        padding: 20px;

        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    /* Left: Image Styling */
    .about-us-image {
        width: 40%;
        padding-right: 20px;
    }

    .about-us-image img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    /* Right: Content and Capsules Styling */
    .about-us-content {
        width: 60%;
        padding-left: 20px;
    }

    .about-us-content h2 {
        font-size: 2.5em;
        margin-bottom: 15px;
        color: black;
        display: inline-block;

        padding-left: 20px;

        position: relative;
    }

    .about-us-content h2::after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;

        background-color: #007BFF;

        margin-left: 10px;

    }

    .about-us-content p {
        font-size: 1.1em;
        line-height: 1.8;
        color: black;
        margin-bottom: 20px;
        text-align: justify;
    }

    /* Capsules Section */
    .capsules-container {
        display: flex;
        justify-content: space-between;
    }

    .capsule {
        display: flex;
        align-items: center;
        margin-right: 10px;
        padding: 20px;
        background-color: #8ba9d0;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .capsule .icon {
        font-size: 2em;
        margin-right: 10px;
        color: #426ca5;
    }

    .capsule p {
        margin-bottom: 0;
        font-size: 1.1em;
        color: black;
    }


    .container {
        display: flex;
        justify-content: center;
        max-width: 100%;
        max-height: fit-content;
        background-color: white;
    }

    .part {
        width: 32%;
        height: auto;
        margin: 40px 0px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, .2);
    }

    .part img {
        width: 200px;
        height: 200px;
        border-radius: 8px;
        /* Optional: for rounded corners */
    }

    .part h3 {
        font-size: 2em;
        color: black;
        margin: 10px 0;
    }

    .part p {
        padding: 20px;
        margin: 0px 0px;
        font-size: 1.1em;
        line-height: 1.5;
        color: black;
        text-align: justify;
    }



    @media (max-width:1340px) and (min-width:1001px) {
        .about-us-content h2 {
            font-size: 2em;
        }

        .about-us-content p {
            font-size: 1em;
        }

        .capsule {
            padding: 5px;
            border-radius: 10px;
        }

        .capsule p {
            font-size: .9em;
        }

        .capsule .icon {
            font-size: 1.1em;
        }
    }

    @media (max-width:1000px) and (min-width:830px) {
        .about-us-section {
            flex-direction: column;
        }

        .about-us-image {
            align-self: center;
            width: 50%;
            padding: 0;
        }

        .about-us-content {
            width: 100%;
        }

        .capsule {
            padding: 10px;

        }

        .capsule .icon {
            font-size: 1.5em;
        }
    }

    @media (max-width:831px) and (min-width:651px) {
        .about-us-section {
            flex-direction: column;
        }

        .about-us-image {
            align-self: center;
            width: 50%;
            padding: 0;
        }

        .about-us-content {
            width: 100%;
            padding: 0;
        }

        .about-us-content h2 {
            font-size: 1.8em;
        }

        .about-us-content p {
            font-size: 1em;
        }

        .capsule {
            padding: 10px;

        }

        .capsule .icon {
            font-size: 1.1em;
        }

        .capsule p {
            font-size: .9em;
        }

        .part img {
            height: 150px;
            width: 150px;
        }

        .part h3 {
            font-size: 1.8em;
        }

        .part p {
            padding: 10px;
        }
    }

    @media (max-width:650px) and (min-width:481px) {
        .about-us-section {
            flex-direction: column;
        }

        .about-us-image {
            align-self: center;
            width: 50%;
            padding: 0;
        }

        .about-us-content {
            width: 100%;
            padding: 0;
        }

        .about-us-content h2 {
            font-size: 1.5em;
        }

        .about-us-content p {
            font-size: .9em;
        }

        .capsule {
            padding: 5px;
            border-radius: 8px;

        }

        .capsule .icon {
            font-size: .7em;
        }

        .capsule p {
            font-size: .6em;
        }

        .container {
            flex-direction: column;
            padding: 0 10px;
        }

        .part {
            width: 100%;
            border-left: 3px solid #426ca5;
            border-right: 3px solid #426ca5;
        }

        .part img {
            height: 150px;
            width: 150px;
        }

        .part h3 {
            font-size: 1.8em;
        }

        .part p {
            padding: 20px;
        }
    }

    @media (max-width:480px) and (min-width:340px) {
        .about-us-section {
            flex-direction: column;
        }

        .about-us-image {
            align-self: center;
            width: 60%;
            padding: 0;
        }

        .about-us-content {
            width: 100%;
            padding: 0;
        }

        .about-us-content h2 {
            font-size: 1.2em;
        }

        .about-us-content p {
            font-size: .8em;
        }

        .capsule {
            padding: 2px;
            margin-right: 0;
            border-radius: 5px;
            flex-direction: column;

        }

        .capsule .icon {
            font-size: .7em;
        }

        .capsule p {
            font-size: .6em;
        }

        .container {
            flex-direction: column;
            padding: 0 10px;
        }

        .part {
            width: 100%;
            border-left: 3px solid #426ca5;
            border-right: 3px solid #426ca5;
        }

        .part img {
            height: 100px;
            width: 100px;
        }

        .part h3 {
            font-size: 1.2em;
        }

        .part p {
            padding: 20px;
            font-size: 1em;
        }
    }
    </style>
    <title>About Us</title>
</head>

<body>
    <?php include 'header.php' ?>
    <main>
        <!-- About Us Section -->
        <div class="about-us-section">
            <!-- Left Part: Image -->
            <div class="about-us-image">
                <img src="../Project-WEB/img/team.png" alt="About Us Image">
            </div>

            <!-- Right Part: About Us Content -->
            <div class="about-us-content">
                <h2>About Us</h2>
                <p>
                    Welcome to Coder's Goal, a premier educational institution dedicated to shaping the future of
                    technology
                    through high-quality learning. Our mission is to empower students with the skills, knowledge, and
                    confidence they need to excel in their careers.

                    At Coder's Goal, we offer a diverse range of courses tailored to meet industry demands, blending
                    theoretical concepts with practical applications. Our experienced faculty are passionate educators
                    committed to providing personalized attention and mentorship, ensuring that each student receives
                    the
                    support they need to thrive.

                    We believe in holistic development, promoting not just academic excellence but also extracurricular
                    engagement. Students can participate in sports, cultural activities, and various clubs to enhance
                    their
                    interpersonal skills and leadership qualities.

                    Our modern infrastructure includes state-of-the-art classrooms and labs, providing an ideal
                    environment
                    for learning. Additionally, our robust placement cell assists students in securing internships and
                    job
                    opportunities with leading companies.
                </p>

                <!-- Capsules Section -->
                <div class="capsules-container">
                    <!-- Capsule 1: Address -->
                    <div class="capsule">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <p>Karimpur, Nadia-741152, West Bengal</p>
                    </div>

                    <!-- Capsule 2: Email -->
                    <div class="capsule">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <p>info@codersgoal.com</p>
                    </div>

                    <!-- Capsule 3: Phone -->
                    <div class="capsule">
                        <div class="icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <p>+91 7719332510</p>
                    </div>
                </div>
            </div>
        </div>

        <section class="three-part-section">
            <div class="container">
                <div class="part">
                    <img src="../Project-WEB/img/story.png" alt="Description of Image 1">
                    <h3>Our Story</h3>
                    <p>" At Coder's Goal, we began our journey with a vision to empower aspiring tech enthusiasts
                        through
                        quality education. Established by passionate educators, our institution has evolved into a
                        vibrant
                        community dedicated to excellence in learning. We offer a diverse range of courses, from
                        programming
                        languages to advanced technologies, ensuring our students gain practical skills that meet
                        industry
                        demands. Our commitment to fostering a supportive environment encourages collaboration and
                        innovation. With experienced faculty and modern infrastructure, we are proud to guide our
                        students
                        toward achieving their dreams and shaping the future of technology together. "
                    </p>
                </div>
                <div class="part" style="border-left: 3px solid #426ca5; border-right: 3px solid #426ca5;">
                    <img src="../Project-WEB/img/mission.png" alt="Description of Image 2">
                    <h3>Our Mission</h3>
                    <p>" At Coder's Goal, our mission is to provide accessible, high-quality education that empowers
                        students
                        to excel in the ever-evolving world of technology. We are dedicated to nurturing talent through
                        a
                        comprehensive curriculum that combines theoretical knowledge with practical experience. Our goal
                        is
                        to create an inclusive and inspiring learning environment where students can thrive, innovate,
                        and
                        grow. We strive to equip our students with the skills and confidence necessary to succeed in
                        their
                        careers, while fostering a passion for lifelong learning. By doing so, we aim to contribute
                        positively to the community and the global tech landscape. "
                    </p>
                </div>
                <div class="part">
                    <img src="../Project-WEB/img/what-do.png" alt="Description of Image 3">
                    <h3>What We Do</h3>
                    <p>" At Coder's Goal, we specialize in delivering industry-relevant courses in computer science and
                        programming. Our diverse offerings include in-depth training in languages such as Java, C, and
                        Python, alongside essential topics like web development, data science, and software engineering.
                        We
                        focus on practical learning experiences, incorporating hands-on projects and real-world
                        applications
                        to ensure our students gain valuable skills. In addition to academic instruction, we provide
                        personalized mentorship, career guidance, and placement assistance to support students in their
                        professional journeys. "</p>
                </div>
            </div>
        </section>

    </main>
    <?php include 'footer.php' ?>
</body>

</html>