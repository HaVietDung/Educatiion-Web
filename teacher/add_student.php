<?php
    include('header.php');
?>
<!-- CODE THÊM -->
    <main>
        <form action="" method="POST" class="register" enctype="multipart/form-data">
            <?php
                // CODE PHP
                if(isset($_POST['submit'])){
                    $id_std = $_POST['id'];
                    $user_id = $_POST['user_id'];
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $gender = $_POST['gender'];
                    if(isset($_FILES['image']['name']))
                    {
                        $image_name = $_FILES['image']['name'];
                        if($image_name!="")
                        {
                            $source_path = $_FILES['image']['tmp_name'];

                            $dess_path = "../image/image_database/".$image_name;

                            $upload = move_uploaded_file($source_path, $dess_path);
                            if($upload== FALSE)
                            {
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = "user_default.jpg";
                    }
                    
                    $sql1 = "INSERT INTO tb_student(id_student, user_id, name_student, gender, image_student, phone) 
                    VALUES ('$id_std', '$user_id','$name', '$gender', '$image_name', '$phone')";
                    $res1 = mysqli_query($conn, $sql1);
                    if($res1 > 0)
                    {
                        header("Location:student.php");
                        $sql2 = "UPDATE tb_user SET user_status = 1 WHERE user_id = (SELECT tb_student.user_id FROM tb_student, tb_user WHERE tb_student.user_id = tb_user.user_id AND tb_student.id_student = '$id_std')";
                        $res2 = mysqli_query($conn, $sql2);
                    }
                    else
                    {
                        header("Location:add_student.php");   
                    }
                }
            ?>
            <div class="form-group  first-span">
                <span>ID student</span>
                <input type="text" class="form-control" name="id">
            </div>
            <div class="form-group">
                <span>User ID</span>
                <select name="user_id" style="display:block;">
                    <?php
                    $sql = "SELECT * FROM tb_user WHERE user_status = 0";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res)) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo '<option value="' . $row['user_id'] . '">' . $row['user_id'] . '</option>';
                        }
                    }
                    ?>
                </select>                
            </div>
            <div class="form-group">
                <span>Name</span>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <span>Phone</span>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="gender">
                <span>Gender</span>
                <br>
                <div>
                    <input type="radio" name = "gender" value="1"><span>Nam</span>
                    <input type="radio" name = "gender" value="0"><span>Nữ</span>
                </div>
            </div>
            <div class="gender">
                <span>Image</span>
                <br>
                <input type="file" name="image" class="file">
            </div>
            <input type="submit" name="submit" value="Add student" class="btn btn-add btn-add-connect">
            <a href="student.php" class="btn btn-add btn-cancel">Cancel</a>
            <div style="margin-bottom: 5rem;">
            </div>
        </form>      
<?php
    include('footer.php');
?>