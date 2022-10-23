<?php

    session_start();
    include "connect.php";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($username) && !empty($username)){
        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $sql = mysqli_query($conn, $query);
        if($sql){
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                if($password == $row['password']){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo 'success';
                }
                else{
                    echo 'wrong password';
                }
            }else{
                echo "username does not exist";
            }
        }else{
            echo "something went wrong";
        }
    }


?>