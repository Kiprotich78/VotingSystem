<?php

    include "connect.php";
    $candidateID = $_POST['candidateID'];

    $query = "SELECT * FROM candidates WHERE candidateID = '{$candidateID}'";
    $sql = mysqli_query($conn, $query);
    if($sql){
        $row = mysqli_fetch_assoc($sql);
        echo $row['votes'];
    }


?>