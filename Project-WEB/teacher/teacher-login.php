<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
    <style>
        /* Background styling */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4a90e2, #9013fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container styling */
        .login-container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container h2 {
            color: #4a90e2;
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Form group and input styling */
        .form-group {
            position: relative;
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: black;
            margin-bottom: 6px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 8px rgba(74, 144, 226, 0.2);
        }

        /* Submit button styling */
        .form-group input[type="submit"] {
            background: #4a90e2;
            color: white;
            font-size: 18px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            transition: all .3s ease;
        }

        .form-group input[type="submit"]:hover {
            background: #3a78cc;
            box-shadow: 0 6px 12px rgba(74, 144, 226, 0.3);
        }

        .form-group span {
            position: absolute;
            bottom: 12px;
            right: -12px;
            font-size: 1.2em;
            cursor: pointer;
        }
    </style>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById('Password');
            var showPasswordIcon = document.getElementById('showPassword');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                showPasswordIcon.innerHTML = '🫣';
            } else {
                passwordField.type = 'password';
                showPasswordIcon.innerHTML = '😵';
            }
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Teacher Login</h2>
        <form action="teacher-login-submit.php" method="post">
            <div class="form-group">
                <label for="teacher_id">Teacher ID:</label>
                <input type="text" id="teacher_id" name="teacher_id" required>
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="password" id="Password" name="Password" required>
                <span id="showPassword" onclick="togglePassword()">😵</span>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>
</html>
