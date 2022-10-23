<?php

    session_start();
    include "connect.php";

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($password) && !empty($username)){
        $unique_id = time().$username;
        $status = "notvoted";
        $query = "SELECT * FROM users WHERE username ='{$username}'";
        $sql = mysqli_query($conn, $query);
        if(mysqli_num_rows($sql) > 0){
            echo "username already exist";
        }else{
            $query = "INSERT INTO users (unique_id, username, password, status) VALUES ('$unique_id', '$username', '$password', '$status')";
            $sql = mysqli_query($conn, $query);
            if($sql){
                $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");
                if($sql1){
                    $row = mysqli_fetch_assoc($sql1);
                    $_SESSION['unique_id'] = $row['unique_id'];
                    //header("Location: ../vote");
                    echo "Success";
                }
            }else{
                echo "something went wrong";
            }
        }

    }
    else{
        echo "All Fields are Required";
    }


?>