<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_subject'])){
        $id = $_GET['id_subject'];
    }
    $sql = "DELETE From tb_subject Where id_subject = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        // Nếu dúng thì xóa 
        header("Location:subject.php");
    }
    else{
        // Không xóa được thì chịu
        header("Location:subject.php");
    }
?>