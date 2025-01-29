<?php
include "configASL.php";
session_start();
if (isset($_POST['roll'])) {
    $_SESSION['roll'] = $_POST['roll'];
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
    <span class="SubHead">Step II</span>
    <form method="post" action="feedback_step_3.php">
        <div id="table">
            <div class="tr">
                <div class="td">
                    <label>Roll No :</label>
                </div>
                <div class="td">
                    <input type="text" disabled size="5" value="<?php echo $_SESSION['roll']; ?>" />
                </div>
            </div>
            <div class="tr">
                <div class="td">
                    <label>Faculty :</label>
                </div>
                <div class="td">
                    <select name="faculty_id" required>
                        <option value="NA" disabled selected>- - Select Faculty - -</option>
                        <?php
                        $x = mysqli_query($al, "select * from faculty");
                        while ($y = mysqli_fetch_array($x)) {
                            ?>
                            <option value="<?php echo $y['faculty_id']; ?>"><?php echo $y['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="tdd">
            <input type="button" onClick="window.location='feedback.php'" value="BACK">
            <input type="button" onClick="window.location='exit.php'" value="EXIT">
            <input type="submit" value="NEXT">
        </div>
    </form>
</div>
</body>
</html>
