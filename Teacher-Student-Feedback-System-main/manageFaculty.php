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

if(!empty($_POST))
{
    $fc=$_POST['fc'];
    $sub=$_POST['sub'];
    $subb=$_POST['subb'];
    $faculty_id = uniqid();
    $u=mysqli_query($al,"insert into faculty(faculty_id,name,s1,s2) values('$faculty_id','$fc','$sub','$subb')");
    if($u==true)
    {
        ?>
        <script type="application/javascript">
        alert('Successfully added');
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
        background-color: #f4f4f9;
    }

    #topHeader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        text-align: center;
        background:rgb(57, 113, 224);
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
        text-align: center;
    }

    .SubHead {
        font-size: 22px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
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

    input[type="text"], select {
        width: 100%;
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background: #f9f9f9;
    }

    input[type="submit"], input[type="button"] {
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background: #007BFF;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    input[type="submit"]:hover, input[type="button"]:hover {
        background: #0056b3;
    }

    table {
        width: 100%;
        max-width: 800px;
        margin: 20px auto;
        border-collapse: collapse;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    table th {
        background:rgb(64, 113, 227);
        color: white;
    }

    table tr:nth-child(even) {
        background: #f9f9f9;
    }

    table tr:hover {
        background: #f1f1f1;
    }

    a {
        color: red;
        text-decoration: none;
        font-size: 18px;
    }

    a:hover {
        text-decoration: underline;
    }

    @media (max-width: 600px) {
        .tr {
            flex-direction: column;
        }

        .td {
            margin: 5px 0;
        }

        input[type="submit"], input[type="button"] {
            font-size: 14px;
            padding: 8px 16px;
        }

        table {
            font-size: 14px;
        }
    }
</style>
</head>

<body>
<div id="topHeader">
    Sanjay Ghodawat University<br />
    <span class="tag">STUDENT FEEDBACK SYSTEM</span>
</div>

<div id="content">
    <span class="SubHead">Add Faculty</span>
    <form method="post" action="">
        <div id="table">
            <div class="tr">
                <div class="td">
                    <label>Faculty : </label>
                </div>
                <div class="td">
                    <input type="text" name="fc" size="25" required placeholder="Enter Faculty Name" />
                </div>
            </div>
            <div class="tr">
                <div class="td">
                    <label>Subject I : </label>
                </div>
                <div class="td">
                    <input type="text" name="sub" size="25" required placeholder="Enter Subject" />
                </div>
            </div>
            <div class="tr">
                <div class="td">
                    <label>Subject II : </label>
                </div>
                <div class="td">
                    <input type="text" name="subb" size="25" required placeholder="Enter Subject" />
                </div>
            </div>
        </div>
        <div class="tdd">
            <input type="submit" value="ADD FACULTY" />
        </div>
    </form>

    <span class="SubHead">Manage Faculty</span>
    <table>
        <tr>
            <th>Sr. No.</th>
            <th>Name</th>
            <th>Subject I</th>
            <th>Subject II</th>
            <th>Delete</th>
        </tr>
        <?php
        $sr = 1;
        $h = mysqli_query($al, "select * from faculty");
        while ($j = mysqli_fetch_array($h)) {
        ?>
        <tr>
            <td><?php echo $sr; $sr++; ?></td>
            <td><?php echo $j['name']; ?></td>
            <td><?php echo $j['s1']; ?></td>
            <td><?php echo $j['s2']; ?></td>
            <td><a href="delete.php?del=<?php echo $j['id']; ?>" onClick="return confirm('Are you sure?')">[x]</a></td>
        </tr>
        <?php } ?>
    </table>
    <input type="button" onClick="window.location='home.php'" value="BACK">
</div>
<footer> introo+</footer>
</body>
</html>
