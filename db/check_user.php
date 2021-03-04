<?php
session_start();
include('connect.php');
if (isset($_POST['user'])){
    $user=$_POST['user'];
    $password=$_POST['password'];

    // print_r($user);
    // echo '<br/>';
    // print_r($password);
    // echo '<br/>';

    $sql_find="Select * from t_admin where Name='".$user."'";
    $sql_find_dup=mysqli_query($conn,$sql_find);
    if(mysqli_num_rows($sql_find_dup)>0){
        $sql_vals=mysqli_fetch_array($sql_find_dup);
        if($password == $sql_vals['PS']){
            $_SESSION['admin_login_success'] = "Admin Login Successed";
            echo json_encode(array("status"=> "Log In Success"));
        }
        else
            echo json_encode(array("status"=> "Wrong Password"));
        //print_r($sql_vals);
    }
    else{
        echo json_encode(array("status"=> "User does not exist"));
    }
}
else{
    echo json_encode(array("status"=> "fail"));
}
return;
?>