<?php
include "configASL.php";
session_start();

// Check if feedback has already been submitted
$sql = mysqli_query($al, "SELECT * FROM feeds WHERE roll='" . mysqli_real_escape_string($al, $_POST['roll']) . "' AND name='" . mysqli_real_escape_string($al, $_POST['faculty']) . "' AND subject='" . mysqli_real_escape_string($al, $_POST['subject']) . "'");

if (mysqli_num_rows($sql) > 0) {
    ?>
    <script type="text/javascript">
        alert('Feedback already submitted');
        window.location = 'feedback_step_3.php';
    </script>
    <?php
    exit;
}

// Save session data
if (isset($_POST['roll'])) {
    $_SESSION['roll'] = $_POST['roll'];
}
if (isset($_POST['faculty_id'])) {
    $_SESSION['faculty_id'] = $_POST['faculty_id'];
}
if (isset($_POST['subject'])) {
    $_SESSION['subject'] = $_POST['subject'];
}

// Fetch questions
$q = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM questions WHERE id = '1'"));
$parameters = ["Poor", "Fair", "Good", "Very Good", "Excellent"];
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
            max-width: 600px;
            margin: 0 auto;
            text-align: left;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tr {
            margin-bottom: 20px;
        }

        .td {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"], select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        textarea {
            resize: none;
        }

        .question {
            margin-bottom: 20px;
        }

        .question span {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        .options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .options input {
            margin-right: 5px;
        }

        .buttons {
            text-align: center;
            margin-top: 20px;
        }

        .buttons input {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }

        .buttons input:hover {
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
    <form method="post" action="feedback_step_5.php">
        <div class="tr">
            <div class="td">
                <label>Roll No:</label>
            </div>
            <div class="td">
                <input type="text" disabled value="<?php echo $_SESSION['roll']; ?>" />
                <input type="hidden" value="<?php echo $_SESSION['roll']; ?>" name="roll" />
            </div>
        </div>
        <div class="tr">
            <div class="td">
                <label>Faculty:</label>
            </div>
            <div class="td">
                <input type="text" disabled value="<?php echo $_SESSION['name']; ?>" />
                <input type="hidden" value="<?php echo $_SESSION['faculty_id']; ?>" name="faculty_id" />
            </div>
        </div>
        <div class="tr">
            <div class="td">
                <label>Subject:</label>
            </div>
            <div class="td">
                <input type="text" disabled value="<?php echo $_SESSION['subject']; ?>" />
                <input type="hidden" value="<?php echo $_SESSION['subject']; ?>" name="subject" />
            </div>
        </div>
        <hr>

        <?php for ($i = 1; $i <= 10; $i++) { ?>
            <div class="question">
                <span><?php echo $i; ?>. <?php echo $q['q' . $i]; ?></span>
                <div class="options">
                    <?php foreach ($parameters as $index => $parameter) { ?>
                        <label>
                            <input type="radio" required name="q<?php echo $i; ?>" value="<?php echo $index + 1; ?>" />
                            <?php echo $parameter; ?>
                        </label>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <div class="tr">
            <div class="td">
                <textarea name="comment" rows="5" placeholder="Enter Comments" required></textarea>
            </div>
        </div>

        <div class="buttons">
            <input type="button" onClick="window.location='feedback_step_3.php'" value="BACK">
            <input type="submit" value="SUBMIT" onClick="return confirm('Are you sure?')">
        </div>
    </form>
</div>
</body>
</html>
