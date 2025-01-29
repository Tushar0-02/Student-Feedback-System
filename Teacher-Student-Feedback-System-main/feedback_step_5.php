<?php
include "configASL.php";
session_start();

if (!empty($_POST)) {
    $roll = $_POST['roll'];
    $subject = $_POST['subject'];
    $faculty_id = $_POST['faculty_id'];

    // Collect all question responses
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $q7 = $_POST['q7'];
    $q8 = $_POST['q8'];
    $q9 = $_POST['q9'];
    $q10 = $_POST['q10'];

    // Calculate total and percentage
    $total = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10;
    $percentage = ($total / 50) * 100;

    // Insert feedback into the feeds table
    $insertFeedbackQuery = "
        INSERT INTO feeds (
            faculty_id, roll, name, subject,
            q1, q2, q3, q4, q5, q6, q7, q8, q9, q10,
            total, percent
        ) VALUES (
            '$faculty_id', '$roll', '" . $_SESSION['name'] . "', '$subject',
            '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10',
            '$total', '$percentage'
        )
    ";

    $insertCommentQuery = "
        INSERT INTO comments (faculty_id, comment)
        VALUES ('$faculty_id', '" . mysqli_real_escape_string($al, $_POST['comment']) . "')
    ";

    $feedbackInserted = mysqli_query($al, $insertFeedbackQuery);
    $commentInserted = mysqli_query($al, $insertCommentQuery);

    if ($feedbackInserted && $commentInserted) {
        ?>
        <script type="text/javascript">
            alert('Feedback successfully submitted');
            window.location = 'feedback_step_2.php';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert('Error submitting feedback. Please try again.');
            window.location = 'feedback_step_3.php';
        </script>
        <?php
    }
}
?>
