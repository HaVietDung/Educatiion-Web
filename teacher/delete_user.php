<?php
    include('connect_database/connect.php');
    if(isset($_GET['user_id'])){
        $id = $_GET['user_id'];
    }
    $sql = "DELETE From tb_user Where user_id = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        // Nếu dúng thì xóa 
        header("Location:user.php");
    }
    else{
        // Không xóa được thì chịu
        header("Location:index.php");
    }
?>