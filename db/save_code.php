<?php
    include('connect.php');
	$email=$_POST['email'];
	$code=$_POST['rString'];
	$cur_datetime=$_POST['cur_datetime'];

    $customer_insert="Insert into t_code (`random_code`, `email`, `date_time`) values ('".$code."','".$email."','".$cur_datetime."')";
    $customer_insert_run=mysqli_query($conn,$customer_insert);
    if(mysqli_affected_rows($conn)==1){
        echo "saved code successfully";
    }
    else{
        echo "failed";
    }
?>