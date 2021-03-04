<?php
// start a session
  session_start();
  $_SESSION['user_login_success'] = "Fail";
  $_SESSION['admin_login_success'] = "Fail";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Color Cards</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="assets/css/index.css">
</head>
<body id="body_back">
  <div class="row">
    <div class="col-md-10 col-sm-10">
    </div>
    <div class="col-md-2 col-sm-2" style="text-align: center;">
      <button id='btn_Index_LogIn' name='btn_Index_LogIn' type="button" class="btn btn-primary mt-3">Admin</button>
    </div>
  </div>

<div class='container'>
  <form>
    <div id="div_welcome" class="text-center">
      <span>Welcome!<span>
    </div>
    <div id="div_main" >
      <h3 class = "pb-3">Please enter the code you were given<h3>
      <input type="text" class="form-control mt-2" id="input_code" placeholder="Please type code here" required>
      <h6 class = "mt-2 pt-3">Each code can only be used one time so if it doesn't work,<br>please contact: support@coreology.com to request a new one.</h6>
    </div>
    <div class="text-center">
      <button id='btn_submit' name = 'btn_submit' type="button" class="btn btn-primary mt-5 btn_submit">SUBMIT</button>
    </div>
  </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
