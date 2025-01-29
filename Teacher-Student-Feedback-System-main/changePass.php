<?php
include("configASL.php");
session_start();
if (!isset($_SESSION['aid'])) {
    header("location:index.php");
}
$aid = $_SESSION['aid'];
$x = mysqli_query($al, "select * from admin where aid='$aid'");
$y = mysqli_fetch_array($x);
$name = $y['name'];
$old = $y['password'];

if (!empty($_POST)) {
    $p1 = sha1($_POST['p1']);
    $p2 = sha1($_POST['p2']);
    if ($old == $p1) {
        $u = mysqli_query($al, "update admin set password='$p2' where aid='$aid'");
    }
    if ($u == true) {
        ?>
        <script type="application/javascript">
            alert('Successfully changed password');
        </script>
        <?php
    } else {
        ?>
        <script type="application/javascript">
            alert('Incorrect old password');
        </script>
        <?php
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Feedback System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        #topHeader {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            font-size: 1.5rem;
        }

        .tag {
            font-size: 1rem;
            font-weight: lighter;
        }

        #content {
            padding: 20px;
            text-align: center;
        }

        .SubHead {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #table {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .tr {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .td {
            flex: 1 1 100%;
            text-align: left;
            margin-bottom: 5px;
        }

        .td label {
            font-weight: bold;
            color: #555;
        }

        .td input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .tdd {
            text-align: center;
            margin-top: 20px;
        }

        .tdd input {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .tdd input:hover {
            background-color: #0056b3;
        }

        input[type="button"] {
            padding: 10px 20px;
            border: none;
            background-color: #6c757d;
            color: white;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="button"]:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
<div id="topHeader">
    Sanjay Ghodawat University<br>
    <span class="tag">STUDENT FEEDBACK SYSTEM</span>
</div>

<div id="content">
    <span class="SubHead">Change Password</span>
    <form method="post" action="">
        <div id="table">
            <div class="tr">
                <div class="td">
                    <label>Old Password:</label>
                </div>
                <div class="td">
                    <input type="password" name="p1" required placeholder="Enter Old Password">
                </div>
            </div>
            <div class="tr">
                <div class="td">
                    <label>New Password:</label>
                </div>
                <div class="td">
                    <input type="password" name="p2" required placeholder="Enter New Password">
                </div>
            </div>
        </div>
        <div class="tdd">
            <input type="submit" value="CHANGE PASSWORD">
        </div>
    </form>
    <br>
    <input type="button" onClick="window.location='home.php'" value="BACK">
</div>
</body>
</html>
