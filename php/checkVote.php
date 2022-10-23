<?php

    session_start();
    include "connect.php";

    $unique_id = $_SESSION['unique_id'];

    $query = "SELECT * FROM users WHERE unique_id = '{$unique_id}'";
    $sql = mysqli_query($conn, $query);
    if($sql){
        $rows = mysqli_fetch_assoc($sql);
        $status = $rows['status'];
        echo $status;

    }else{
        echo "error";
    }

?>