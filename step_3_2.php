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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body id="body_back">

<div>
  <form class="mb-5">
    <div class='container'>
      <div class="row mt-3">
        <div class="col-md-2 col-sm-2">
        </div>
        <div id="div_guide_text" class="col-md-8 col-sm-8 text-center guide-text"> 
          <span>Next you will be </span><b class="font-blue">choosing colors to go with your cards.</b><br><br>
          <span>When you click on each card, you will see a color palette pop up.</span><br><span>It takes
            a little bit of time to generate the colors, so give it a second or two after
            you click for the colors to show up.</span><br><br>
          <b>Important note: </b><span>Don't choose colors just because you like them or
            because they match one another. Just look at the symbol and then
            select a color that </span><b class="font-blue">feels like it should go with that symbol right now.</b>
        </div>
        <div class="col-md-1 col-sm-1">
        </div>
        <div class="col-md-1 col-sm-1">
          <!-- <button id='btn_goto_firstpage' name = 'btn_goto_firstpage' type="button" class="btn mt-3"></button> -->
        </div>
      </div>

      <div id="div_next_btn">
        <button id='btn_next' name = 'btn_next' type="button" class="btn"></button>
      </div>
      </div>
  </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="assets/js/step_3_2.js"></script>

</body>
</html>
