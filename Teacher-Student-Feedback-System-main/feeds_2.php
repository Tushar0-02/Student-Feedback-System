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

if (!empty($_POST)) {
    $faculty_id = $_POST['faculty_id'];
    // Fetch Name
    $name = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM faculty WHERE faculty_id='" . $faculty_id . "'"));
    $subject = $_POST['subject'];
    $sql = mysqli_query($al, "select * from feeds where faculty_id='$faculty_id' AND subject='$subject'");
    while ($z = mysqli_fetch_array($sql)) {
        $q1 += $z['q1'];
        $q2 += $z['q2'];
        $q3 += $z['q3'];
        $q4 += $z['q4'];
        $q5 += $z['q5'];
        $q6 += $z['q6'];
        $q7 += $z['q7'];
        $q8 += $z['q8'];
        $q9 += $z['q9'];
        $q10 += $z['q10'];
        $total = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10;
        $s++;
    }
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Feedback System</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100 text-gray-800">
    <!-- Top Header -->
    <div class="bg-blue-600 text-white py-4 text-center">
      <h1 class="text-2xl font-bold">Sanjay Ghodawat University</h1>
      <p class="text-lg font-light">STUDENT FEEDBACK SYSTEM</p>
    </div>

    <!-- Content Section -->
    <div class="container mx-auto mt-8 px-4">
      <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold text-center mb-6">Student Feedback</h2>
        <table class="table-auto w-full text-left text-gray-700">
          <tbody>
            <tr>
              <td class="font-bold py-2">Faculty Name:</td>
              <td class="py-2"><?php echo $name['name']; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">Subject:</td>
              <td class="py-2"><?php echo $subject; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">1. Description of course objectives & assignments:</td>
              <td class="py-2"><?php echo $q1; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">2. Communication of ideas & information:</td>
              <td class="py-2"><?php echo $q2; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">3. Expression of expectations for performance:</td>
              <td class="py-2"><?php echo $q3; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">4. Availability to assist students in or out of class:</td>
              <td class="py-2"><?php echo $q4; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">5. Respect or concern for students:</td>
              <td class="py-2"><?php echo $q5; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">6. Stimulation of interest in course:</td>
              <td class="py-2"><?php echo $q6; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">7. Facilitation of learning:</td>
              <td class="py-2"><?php echo $q7; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">8. Enthusiasm for the subject:</td>
              <td class="py-2"><?php echo $q8; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">9. Encourage students to think independently, creatively & critically:</td>
              <td class="py-2"><?php echo $q9; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">10. Overall rating:</td>
              <td class="py-2"><?php echo $q10; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">Total Students:</td>
              <td class="py-2"><?php echo $s; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2">Total:</td>
              <td class="py-2"><?php echo $total; ?></td>
            </tr>
            <tr>
              <td class="font-bold py-2 text-center" colspan="2">Comments</td>
            </tr>
            <tr>
              <td colspan="2" class="py-4">
                <div class="bg-gray-100 p-4 rounded">
                  <?php
                  $cc = mysqli_query($al, "SELECT * FROM comments WHERE faculty_id = '".$faculty_id."' ORDER BY id DESC");
                  while ($pr = mysqli_fetch_array($cc)) {
                      echo "<p class='mb-2'>~" . $pr['comment'] . "~</p>";
                  }
                  ?>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="flex justify-center mt-6">
          <button onClick="window.print();" class="bg-blue-600 text-white py-2 px-4 rounded-lg shadow-lg mx-2">PRINT</button>
          <button onClick="window.location='feeds.php'" class="bg-gray-600 text-white py-2 px-4 rounded-lg shadow-lg mx-2">BACK</button>
        </div>
      </div>
    </div>
  </body>
</html>
