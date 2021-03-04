<?php
    include('connect.php');
	$del_code=$_POST['del_code'];

    $sql="DELETE FROM t_code WHERE random_code='".$del_code."'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn)==1){
        echo "Delete code successfully";
    }
    else{
        echo "failed";
    }
?>