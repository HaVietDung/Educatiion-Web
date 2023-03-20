<?php
    include('header.php');
?>
    <main>
        <!-- CODE PHP -->

        <form action="" method="POST" class="register">
            <?php
                if(isset($_GET['id_subject']))
                {
                    $id_sub = $_GET['id_subject'];
                }
                $sql = "SELECT * FROM tb_subject WHERE id_subject = '$id_sub'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $name_sub = $row['name_subject'];
                    $des = $row['description'];
                    $image = $row['img_subject'];
                }
                
            ?>
            <?php
                if(isset($_POST['submit']))
                {
                    $name1 = $_POST['name'];
                    $des1 = $_POST['des'];
                    $image1 = $_POST['image'];
                    if($name1 != "")
                    {
                        $sql1 = "UPDATE tb_subject SET name_subject = '$name1', description = '$des1', img_subject = '$image1'
                                    WHERE id_subject= '$id_sub'";
                        $res1 = mysqli_query($conn, $sql1);
                        if($res1 == TRUE)
                        {
                            header("Location:subject.php");
                        }
                        else
                        {
                            header("Location:update_student.php");
                        }
                    }
                }
            ?>
            <div class="form-group first-span">
                <span>ID subject</span>
                <input type="text" class="form-control read" readonly value="<?php echo $id_sub?>">
            </div>
            <div class="form-group">
                <span>Name</span>
                <input type="text" class="form-control" name="name" value="<?php echo $name_sub;?>">
            </div>
            <div class="form-group">
                <span>Description</span>
                <input type="text" class="form-control" name="des" value="<?php echo $des;?>">
            </div>
            <div class="gender">
                <span>Image</span>
                <br>
                <input type="file" name="image" class="file" value="<?php echo $image; ?>">
            </div>            
            <input type="submit" name="submit" value="Update subject" class="btn btn-add btn-add-connect">
            <a href="subject.php" class="btn btn-add btn-cancel">Cancel</a>
        </form>
<?php
    include('footer.php');
?>
