<?php

    session_start();
    if(isset($_SESSION['unique_id'])){
        echo "set";
    }else{
        echo "notset";
    }

?>