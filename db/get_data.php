<?php
include('connect.php');

    $sql="Select * from t_code";
    $result = mysqli_query($conn, $sql);
    $rtn_array = array();
    array_push($rtn_array, array('status' => 'load data fail'));

    if(!$result)
        return $rtn_array;
    $rtn_array[0]['status'] = 'success';

    //print_r($rtn_array);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          array_push($rtn_array, array('code'=>$row['random_code'], 'email'=>$row['email'], 'date_time'=>$row['date_time']));
      }
    } else {
        $rtn_array[0]['status'] = 'no codes';
    }
    echo json_encode($rtn_array);
?>