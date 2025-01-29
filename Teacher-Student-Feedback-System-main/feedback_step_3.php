<?php
include "configASL.php";
session_start();

if (isset($_POST['roll'])) {
    $_SESSION['roll'] = $_POST['roll'];
}

if (isset($_POST['faculty_id'])) {
    $_SESSION['faculty_id'] = $_POST['faculty_id'];
}

// Fetch Faculty Name
$nm = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM faculty WHERE faculty_id='" . $_SESSION['faculty_id'] . "'"));
$_SESSION['name'] = $nm['name'];
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
            margin-bottom: 15px;
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

        .td input[type="text"],
        .td select {
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
            margin: 5px;
        }

        .tdd input:hover {
            background-color: #0056b3;
        }

        input[type="button"] {
            background-color: #6c757d;
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
    <span class="SubHead">Step III</span>
    <form method="post" action="feedback_step_4.php">
        <div id="table">
            <div class="tr">
                <div class="td">
                    <label>Roll No :</label>
                </div>
                <div class="td">
                    <input type="text" disabled value="<?php echo $_SESSION['roll']; ?>" />
                    <input type="hidden" value="<?php echo $_SESSION['roll']; ?>" name="roll" />
                </div>
            </div>
            <div class="tr">
                <div class="td">
                    <label>Faculty :</label>
                </div>
                <div class="td">
                    <input type="text" disabled value="<?php echo $_SESSION['name']; ?>" />
                    <input type="hidden" value="<?php echo $_SESSION['faculty_id']; ?>" name="faculty_id" />
                </div>
            </div>
            <div class="tr">
                <div class="td">
                    <label>Subject :</label>
                </div>
                <div class="td">
                    <select name="subject" required>
                        <option value="NA" disabled selected>- - Select Subject - -</option>
                        <?php
                        $x = mysqli_query($al, "select distinct s1, s2 from faculty WHERE faculty_id='" . $_SESSION['faculty_id'] . "'");
                        while ($y = mysqli_fetch_array($x)) {
                            ?>
                            <option value="<?php echo $y['s1']; ?>"><?php echo $y['s1']; ?></option>
                            <option value="<?php echo $y['s2']; ?>"><?php echo $y['s2']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="tdd">
            <input type="button" onClick="window.location='feedback_step_2.php'" value="BACK">
            <input type="submit" value="NEXT">
        </div>
    </form>
</div>
</body>
</html>
