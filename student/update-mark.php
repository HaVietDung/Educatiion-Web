<?php
include('dashboard.php');
?>
<?php
if (isset($_GET['id_homework']) && isset($_GET['id_subject']) && isset($_GET['id_student'])) {
    $id_homework = $_GET['id_homework'];
    $id_subject = $_GET['id_subject'];
    $sql = "SELECT * from tb_homework WHERE id_homework = '$id_homework'
    and id_subject = '$id_subject'";
    $res = mysqli_query($conn, $sql);
    if ($res == TRUE) {
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            $row = mysqli_fetch_assoc($res);
            $name_homework = $row['name_homework'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
        }
    }
    $id_student = $_GET['id_student'];
    $sql2 = "SELECT * from tb_student where id_student = '$id_student'";
    $res2 = mysqli_query($conn, $sql2);
    if ($res2 == TRUE) {
        $count2 = mysqli_num_rows($res2);
        if ($count2 > 0) {
            $row2 = mysqli_fetch_assoc($res2);
            $name_student = $row2['name_student'];
        }
    }
}
?>

<div class="add-mark">
    <h1><?php echo $name_homework ?></h1>
    <div class="box">
        <div class="date-mark">
            <h3>Opened:</h3>
            <h3 class="date"><?php echo $start_date; ?></h3>
        </div>
        <div class="date-mark">
            <h3>Due:</h3>
            <h3 class="date"><?php echo $end_date; ?></h3>
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="upload">
            <p>Chọn file:</p>
            <input type="file" name="file" id="fileToUpload">
        </div>
        <div class="btn-add">
            <button type="submit" name="submit">Sửa bài</button>
            <button><a href="<?php echo SITEURL;?>/mark.php?id_homework=<?php echo $id_homework;?>&id_subject=<?php echo $id_subject;?>&id_student=<?php echo $id_student;?>">Quay lại</a></button>
        </div>
    </form>

    <?php
        if(isset($_POST['submit'])){
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $path = "../image/".$fileName;

            $sql3 = "UPDATE tb_mark set 
                excercise = '$fileName',
                finish_date = now()
                where id_homework = '$id_homework'
                and id_student = '$id_student'
            ";
            $res3= mysqli_query($conn, $sql3);

            if($res3==true){
                move_uploaded_file($fileTmpName,$path);
                echo "sucess";
            }
            else{
                echo 'fail';
            }
        }
        
    ?>
</div>
<?php
include('footer.php');
?>