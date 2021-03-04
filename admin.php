<?php
  session_start();
  if (isset($_SESSION['admin_login_success'])) {
      if($_SESSION['admin_login_success'] != "Admin Login Successed"){
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
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body id="body_back">
<div class="container main_container">
  <div class="mb-1">
    <div class="row">
      <div class="col-md-10">
      </div>
      <div class="col-md-2">
        <button id='btn_Index_LogOut' name='btn_Index_LogOut' type="button" class="btn btn-Index-LogOut"></button>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4 form-group">
          <label id="label_input_email" for="input_email">Identification information</label>
          <input type="email" class="form-control" id="input_email" name="input_email" required placeholder="Pleae type identification information here" title="Please input Email address"/>
        </div>
      <div class="col-md-4">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
        <button id="btn_generate_code" type="button" class="btn btn-primary btn-block btn-large">Generate Code.</button>
      </div>
      <div class="col-md-4">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4 form-group">
        <input type="text" class="form-control" id="generated_code" name="generated_code" readonly />
      </div>
      <div class="col-md-4">
      </div>
    </div>
  </div>
  <div id="div_table">
    <table id="main_table" class="table table-hover table-striped table-sm table-bordered table-fixed" > 
      <thead class="mythead">
        <tr>
          <th class="th-id">ID</th>
          <th class="th-email">Email</th>
          <th class="th-code">Code</th>
          <th class="th-time">Generated Time</th>
          <th class="th-space">&nbsp</th>
        </tr>
      </thead>
      <tbody id="table_tbody">
      </tbody>
    </table>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/admin.js"></script>
</body>
</html>
