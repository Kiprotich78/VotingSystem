<?php

    include "../config/config.inc.php";
    $connect = new mysqli($_VOTE['db_server'], $_VOTE['db_username'], $_VOTE['db_password'], "", $_VOTE['db_port']);

    if($connect){

        $dropDB = "DROP DATABASE IF EXISTS {$_VOTE['db_name']}";
        mysqli_query($connect, $dropDB);

        $createDB = "CREATE DATABASE ".$_VOTE['db_name'];
        if(mysqli_query($connect, $createDB)){
            $createUsers = "CREATE TABLE {$_VOTE['db_name']}.users (id INT NOT NULL AUTO_INCREMENT , unique_id VARCHAR(255) NOT NULL , username VARCHAR(255), password VARCHAR(255), status VARCHAR(255), PRIMARY KEY (id))";

            mysqli_query($connect, $createUsers);

            $createCandindates = "CREATE TABLE {$_VOTE['db_name']}.candidates (candidateID INT NOT NULL, candidate_name VARCHAR(255) , votes INT NOT NULL, PRIMARY KEY (candidateId))";

            mysqli_query($connect, $createCandindates);

            $insertData = "INSERT INTO {$_VOTE['db_name']}.candidates VALUES 
                            (0, 'William Ruto', 0), 
                            (1, 'Wahiga Mwaure', 0), 
                            (2, 'George Wajakoya', 0)";

            if(mysqli_query($connect, $insertData)){
                echo "db created successfully";
            }
        }else{
            echo "Error Creating Database";
        }
    }else{
        echo "Error connecting to the database";
    }


?>