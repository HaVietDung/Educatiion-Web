<?php
    include('header.php');
?>
    <main>
        <?php
            if(isset($_GET['id_student']))
            {
                $id_std = $_GET['id_student'];
            }
            $sql = "SELECT * FROM tb_student WHERE id_student = '$id_std'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $user_id = $row['user_id'];
                $name_std = $row['name_student'];
                $gender = $row['gender'];
                $image = $row['image_student'];
                $phone = $row['phone'];
            }
            
        ?>
        <!-- CODE PHP -->

        <form action="" method="POST" class="register">
            <?php
                if(isset($_POST['submit']))
                {
                    $name1 = $_POST['name'];
                    $gender1 = $_POST['gender'];
                    $image1 = $_POST['image'];
                    $phone1 = $_POST['phone'];
                    if($name1 != "")
                    {
                        $sql1 = "UPDATE tb_student SET name_student = '$name1', gender = '$gender1', image_student = '$image1', phone = '$phone1'
                                    WHERE id_student= '$id_std'";
                        $res1 = mysqli_query($conn, $sql1);
                        if($res1 == TRUE)
                        {
                            header("Location:student.php");
                        }
                        else
                        {
                            header("Location:update_student.php");
                        }
                    }
                }
            ?>
            <div class="form-group first-span">
                <span>ID Student</span>
                <input type="text" class="form-control read" readonly value="<?php echo $id_std?>">
            </div>
            <div class="form-group">
                <span>ID user</span>
                <input type="text" class="form-control read" readonly value="<?php echo $user_id?>">
            </div>
            <div class="form-group">
                <span>Name</span>
                <input type="text" class="form-control" name="name" value="<?php echo $name_std;?>">
            </div>
            <div class="gender">
                <span>Gender</span>
                <br>
                <div>
                    <input <?php if($gender==1) {echo "checked"; }?> type="radio" name = "gender" value="1"><span>Nam</span>
                    <input <?php if($gender==0) {echo "checked"; }?> type="radio" name = "gender" value="0"><span>Nữ</span>

                </div>
            </div>
            <div class="gender">
                <span>Image</span>
                <br>
                <input type="file" name="image" class="file" value="<?php echo $image; ?>">
            </div>
            <div class="form-group">
                <span>Phone</span>
                <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
            </div>            
            <input type="submit" name="submit" value="Update student" class="btn btn-add btn-add-connect" style="margin-bottom: 3rem;">
            <a href="student.php" class="btn btn-add btn-cancel" style="margin-bottom: 3rem;">Cancel</a>
        </form>
<?php
    include('footer.php');
?>
