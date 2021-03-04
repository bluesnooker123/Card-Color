<?php
session_start();
include('connect.php');
if (isset($_POST['data'])){
    $data=$_POST['data'];
    $code = $data;

    // $sql_find="Select count(*) as count from t_code where random_code='".$code."'";
    // $sql_find_dup=mysqli_query($conn,$sql_find);
    // $sql_vals=mysqli_fetch_array($sql_find_dup);

    // $sql="DELETE FROM t_code WHERE random_code='".$code."'";
    // $result=mysqli_query($conn,$sql);

    // // print_r($sql_vals['count']);
    // if($sql_vals['count'] > 0 ){
    //     echo json_encode(array("identify_info"=> "success"));
    //     $_SESSION['user_login_success'] = "User Login Successed";
    // }
    // else
    //     echo json_encode(array("identify_info"=> "doesn't exist code"));
    // // echo $val;    
    
    $sql="SELECT * FROM t_code WHERE random_code='".$code."'";
    
    $result = mysqli_query($conn, $sql);
    $rtn_array = array("identify_info"=> "load data fail");
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $row = mysqli_fetch_assoc($result);
      $rtn_array['identify_info'] = $row['email'];
      $_SESSION['user_login_success'] = "User Login Successed";
      $sql="DELETE FROM t_code WHERE random_code='".$code."'";
      $result=mysqli_query($conn,$sql);

    } else {
        $rtn_array['identify_info'] = "doesn't exist code";
    }

    echo json_encode($rtn_array);
}
?>