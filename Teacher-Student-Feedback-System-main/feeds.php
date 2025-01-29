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
        background-color: #f4f4f9;
    }

    #topHeader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        text-align: center;
        background:rgb(82, 166, 223);
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

    #table {
        width: 100%;
        max-width: 600px;
        margin: 20px auto;
        border: 1px solid #ddd;
        border-radius: 5px;
        background: white;
        padding: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .tr {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .td {
        flex: 1;
        margin: 0 5px;
    }

    label {
        font-size: 16px;
        color: #333;
    }

    select {
        width: 100%;
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background: #f9f9f9;
    }

    .tdd {
        text-align: center;
        margin-top: 20px;
    }

    input[type="button"], input[type="submit"] {
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background: #007BFF;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="button"]:hover, input[type="submit"]:hover {
        background: #0056b3;
    }

    @media (max-width: 600px) {
        #table {
            padding: 10px;
        }

        .tr {
            flex-direction: column;
        }

        .td {
            margin: 5px 0;
        }

        .SubHead {
            font-size: 20px;
        }

        input[type="button"], input[type="submit"] {
            font-size: 14px;
            padding: 8px 16px;
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
<span class="SubHead">Student Feedback</span>
<br>
<br>

<form method="post" action="feeds_2.php" >
<div id="table"> 
    <div class="tr">
        <div class="td">
            <label>Faculty : </label>
        </div>
        <div class="td">
            <select name="faculty_id" required>
                <option value="NA" disabled selected> - - Select Faculty - -</option>
                <?php
                $x=mysqli_query($al,"select * from faculty");
                while($y=mysqli_fetch_array($x))
                {
                ?>
                <option value="<?php echo $y['faculty_id'];?>"><?php echo $y['name'];?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="tr">
        <div class="td">
            <label>Subject : </label>
        </div>
        <div class="td">
            <select name="subject" required>
                <option value="NA" disabled selected> - - Select Subject - -</option>
                <?php
                $x=mysqli_query($al,"select * from faculty");
                while($y=mysqli_fetch_array($x))
                {
                ?>
                <option value="<?php echo $y['s1'];?>"><?php echo $y['s1'];?></option>
                <option value="<?php echo $y['s2'];?>"><?php echo $y['s2'];?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
        
<div class="tdd">
    <input type="button" onClick="window.location='home.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="NEXT" />
</div>
<br>
</form>

</div>
</body>
</html>
