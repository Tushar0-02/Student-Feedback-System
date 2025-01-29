<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$name=$y['name'];

?>
<!doctype html>
<html><!-- Designed & Developed by Ashish Labade (Tech Vegan) www.ashishvegan.com | Not for Commercial Use-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Feedback System</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
    }

    #topHeader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        text-align: center;
        background:rgb(81, 140, 192);
        color: white;
        padding: 10px 0;
        font-size: 20px;
        z-index: 1000;
    }

    .tag {
        font-size: 14px;
        color: #ddd;
    }

    #content {
        margin-top: 80px;
        padding: 20px;
    }

    .SubHead {
        font-size: 22px;
        font-weight: bold;
        color: #333;
    }

    .button {
        display: block;
        width: 90%;
        max-width: 300px;
        margin: 10px auto;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        color: white;
        background-color: #007BFF;
        border-radius: 5px;
        font-size: 18px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .button:hover {
        background-color: #0056b3;
    }

    @media (max-width: 600px) {
        #topHeader {
            font-size: 16px;
        }

        .SubHead {
            font-size: 20px;
        }

        .button {
            font-size: 16px;
        }
    }
</style>
</head>

<body>
<div id="topHeader">
     Sanjay Ghodawat University<br />
    <span class="tag">STUDENT FEEDBACK SYSTEM</span>
</div>

<div id="content" align="center">
<br>
<span class="SubHead">Welcome Admin <?php echo $name;?></span>
<br>
<br>

<a href="feeds.php" class="button">Feedback</a>
<a href="manageFaculty.php" class="button">Manage Faculty</a>
<br>
<br>
<a href="changePass.php" class="button">Change Password</a>
<a href="logout.php" class="button">Logout</a>
<br>
<br>

</div>
</body>
</html>
