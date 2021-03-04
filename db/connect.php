<?php
    $conn=mysqli_connect('localhost','root','','cardcolor');    
     //$conn=mysqli_connect('localhost','adplczmy_admin','admin','adplczmy_cardcolor');    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
?>