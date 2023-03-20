<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_home'])){
        $id = $_GET['id_home'];
    }
    $sql = "DELETE From tb_homework Where id_homework = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        // Nếu dúng thì xóa 
        header("Location:homework.php");
    }
    else{
        // Không xóa được thì chịu
        header("Location:homework.php");
    }
?>