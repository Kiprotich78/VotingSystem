<?php

    session_start();
    include 'connect.php';

    $unique_id = $_SESSION['unique_id'];
    $candidateID = $_POST['candidateID'];
    $VoteStatus = "SELECT * FROM users WHERE unique_id = '{$unique_id}' AND status = 'notvoted'";
    $sql = mysqli_query($conn, $VoteStatus);

    if(mysqli_num_rows($sql)){
        $query = "SELECT * FROM candidates WHERE candidateID = '{$candidateID}'";
        $sql = mysqli_query($conn, $query);
        if($sql){
            $row = mysqli_fetch_assoc($sql);
            $votes = $row['votes'];
            $votes = (int)$votes;
            $votes = $votes + 1;
            $query2 = "UPDATE candidates SET votes = '{$votes}' WHERE candidateId = '{$candidateID}'";
            $sql2 = mysqli_query($conn, $query2);
            if($sql2){
                $query3 = "UPDATE users SET status = 'voted' WHERE unique_id = '".$_SESSION['unique_id']."'";
                $sql3 = mysqli_query($conn, $query3);
                if($sql3){
                    echo "you have voted successfully";
                }
            }
        }else{
            echo "error";
        }
    }else{
        echo "you had already voted!!";
    }




?>