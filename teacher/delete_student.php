<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_student'])){
        $id = $_GET['id_student'];
    }
    $sql = "DELETE From tb_student Where id_student = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        // Nếu dúng thì xóa 
        header("Location:student.php");
        // Nếu xóa thì cập nhật user_id status = 0
        $sql2 = "UPDATE tb_user SET user_status = 0 WHERE user_id = (SELECT tb_student.user_id FROM tb_student, tb_user WHERE tb_student.user_id = tb_user.user_id AND tb_student.id_student = '$id')";
        $res2 = mysqli_query($conn, $sql2);
    }
    else{
        // Không xóa được thì chịu
        header("Location:student.php");
    }
?>