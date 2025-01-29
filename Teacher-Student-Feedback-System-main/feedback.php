<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Feedback System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg,rgb(244, 244, 245),rgb(230, 233, 237));
        color: #333;
    }
    #topHeader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        text-align: center;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 15px 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        font-size: 20px;
    }
    #topHeader .tag {
        font-size: 16px;
        font-style: italic;
        color: #f1c40f;
    }
    #content {
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        width: 90%;
        max-width: 400px;
        margin: 100px auto 20px;
        text-align: center;
        animation: fadeIn 1s ease;
    }
    .SubHead {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #0056d6;
    }
    label {
        font-size: 16px;
        font-weight: bold;
        display: block;
        margin-bottom: 10px;
    }
    select {
        width: 100%;
        padding: 10px;
        margin: 10px 0 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        background-color: #f9f9f9;
    }
    input[type="button"], input[type="submit"] {
        background: #0056d6;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        margin: 5px;
        width: calc(50% - 10px);
    }
    input[type="button"]:hover, input[type="submit"]:hover {
        background: #003ba1;
    }
    .tdd {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    @media (max-width: 480px) {
        #content {
            width: 100%;
            padding: 20px;
        }
        .tdd {
            flex-direction: column;
        }
        input[type="button"], input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>
</head>

<body>
<div id="topHeader">
Sanjay Ghodawat University<br />
    <span class="tag">Student Feedback Systeam</span>
</div>

<div id="content">
    <span class="SubHead">Student Feedback Step I</span>
    <form method="post" action="feedback_step_2.php">
        <label for="roll">Roll No:</label>
        <select name="roll" id="roll" required>
            <option value="NA" disabled selected> - - Select Roll No. - -</option>
            <?php for ($x = 1; $x <= 200; $x++) { ?>
                <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
            <?php } ?>
        </select>

        <label for="div">Division (Div):</label>
        <select name="div" id="div" required>
            <option value="NA" disabled selected> - - Select Division - - </option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>

        <label for="year">Year:</label>
        <select name="year" id="year" required>
            <option value="NA" disabled selected> - - Select Year - - </option>
            <option value="1">First Year</option>
            <option value="2">Second Year</option>
            <option value="3">Third Year</option>
            <option value="4">Fourth Year</option>
        </select>

        <div class="tdd">
            <input type="button" onclick="window.location='index.php'" value="BACK">
            <input type="submit" value="NEXT">
        </div>
    </form>
</div>
</body>
</html>
