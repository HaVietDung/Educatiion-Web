<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_sub'])){
        $id_sub = $_GET['id_sub'];
        $id_std = $_GET['id_std'];
    }
    $sql = "DELETE FROM tb_register WHERE id_subject = '$id_sub' AND id_student = '$id_std'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        // Nếu dúng thì xóa 
        header("Location:contact.php");
    }
    else{
        // Không xóa được thì chịu
        header("Location:contact.php");
    }
?>