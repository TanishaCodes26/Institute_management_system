<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #1e3c72, #2a5298, #6dd5ed, #ffffff);
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 650px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }
        .button{
            text-decoration: none;
            font-size: 1.2em;
            color: black;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e3c72;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: black;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 16px;
        }
        .form-group textarea {
            height: 120px;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #6dd5ed;
            box-shadow: 0 0 10px rgba(109, 213, 237, 0.5);
        }
        .form-group button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(to right, #1e3c72, #2a5298, #6dd5ed);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .form-group button:hover {
            background: linear-gradient(to right, #6dd5ed, #2a5298, #1e3c72);
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <a href="admin-manageNotice.php" class="button">⬅️Back</a>
        <h2>Notice Form</h2>
        <form action="admin-addNotice-submit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="notice_date">
            </div>
            <div class="form-group">
                <label for="content">Notice:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
