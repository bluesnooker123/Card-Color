<?php
  session_start();
  if (isset($_SESSION['user_login_success'])) {
      if($_SESSION['user_login_success'] != "User Login Successed"){
        header("Location: index.php");
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Color Cards</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body id="body_back">

<div>
  <form class="mb-5">
    <div class='container'>
      <img id="final_page" class="mt-10" src="assets/image/final_page.jpg" alt="final page">
    </div>
    <div id="final_text" class="text-center">
      A report will be emailed to your coach<br>so you can discuss it at your next session!
    </div>
  </form>
</div>


<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/step_9.js"></script>

</body>
</html>
