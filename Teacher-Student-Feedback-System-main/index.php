<?php
include("configASL.php");
session_start();

if (isset($_SESSION['aid'])) {
    header("location:home.php");
    exit;
}

if (!empty($_POST)) {
    $aid = mysqli_real_escape_string($al, $_POST['aid']);
    $pass = mysqli_real_escape_string($al, $_POST['pass']); // Direct comparison without hashing

    $sql = mysqli_query($al, "SELECT * FROM admin WHERE aid='$aid' AND password='$pass'");
    if (mysqli_num_rows($sql) == 1) {
        $_SESSION['aid'] = $_POST['aid'];
        header("location:home.php");
        exit;
    } else {
        echo "failed";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Student Feedback System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("abtuniversity") no-repeat center center/cover;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #loginContainer {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.8s ease;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 10px;
            color:rgb(84, 146, 233);
        }

        h2 {
            font-size: 20px;
            font-weight: 400;
            color: #444;
            margin-bottom: 25px;
        }

        form {
            width: 100%;
        }

        label {
            font-size: 16px;
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #ff457e;
            outline: none;
            box-shadow: 0 0 8px rgba(255, 69, 126, 0.3);
        }

        input[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #ff457e, #ff7590);
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #ff3366, #ff507e);
            transform: scale(1.03);
        }

        .footer-link {
            margin-top: 25px;
            font-size: 14px;
            color: #555;
        }

        .footer-link a {
            text-decoration: none;
            color: #ff457e;
            font-weight: bold;
            transition: color 0.3s;
        }

        .footer-link a:hover {
            color: #ff3366;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div id="loginContainer">
        <h1>Admin Login</h1>
        <h2>Student Feedback System</h2>
        <form method="post" action="">
            <label for="aid">Admin ID</label>
            <input type="text" name="aid" id="aid" placeholder="Enter Admin ID" required>

            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass" placeholder="Enter Password" required>

            <input type="submit" value="Login">
        </form>
        <div class="footer-link">
            Student Feedback? <a href="feedback.php">Click Here</a>
        </div>
    </div>
</body>
</html>
