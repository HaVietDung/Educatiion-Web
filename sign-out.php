<?php
    include('teacher/connect_database/connect.php');
    //1. Destory the Session
    session_destroy(); //Unsets $_SESSION['user']

    //2. REdirect to Login Page
    header("Location:index.php");
?>