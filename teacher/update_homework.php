<?php
    include('header.php');
?>
    <main>
        <?php
            if(isset($_GET['id_home']))
            {
                $id_home = $_GET['id_home'];
                $id_sub = $_GET['id_sub'];
            }
                $sql = "SELECT * FROM tb_homework where id_homework = '$id_home'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $name_homework= $row['name_homework'];
                    $excer = $row['excercise'];
                    $end_date = $row['end_date'];
                    $level = $row['home_level'];
                }
            
        ?>

        <form action="" method="POST" class="register">
                    <!-- CODE PHP -->
            <?php
                if(isset($_POST['submit']))
                {
                    $name1 = $_POST['name_homework'];
                    $exer1 = $_POST['image'];
                    $end_date1 = $_POST['end_date'];
                    $levl1 = $_POST['level_homework'];
                    if($name1 != "")
                    {
                        $sql1 = "UPDATE tb_homework SET name_homework = '$name1', excercise = '$exer1', end_date = '$end_date1', home_level = '$level'
                                    WHERE id_homework = '$id_home'";
                        $res1 = mysqli_query($conn, $sql1);
                        if($res1 == TRUE)
                        {
                            header("Location:homework.php");
                        }
                        else
                        {
                            header("Location:update_homework.php");
                        }
                    }
                }
            ?>
            <div class="form-group first-span">
                <span>ID homework</span>
                <input type="text" class="form-control read" readonly value="<?php echo $id_home?>">
            </div>
            <div class="form-group first-span">
                <span>ID subject</span>
                <input type="text" class="form-control read" readonly value="<?php echo $id_sub;?>">
            </div>
            <div class="form-group">
                <span>Name homework</span>
                <input type="text" class="form-control" name="name_homework" value="<?php echo $name_homework;?>">
            </div>
            <div class="gender">
                <span>Image</span>
                <br>
                <input type="file" name="image" class="file" value="<?php echo $excer; ?>">
            </div>
            <div class="form-group">
                <span>End date</span>
                <input type="datetime-local" class="form-control" name="end_date" value="<?php echo $date = date("Y-m-d\TH:i:s", strtotime($end_date)); ?>">
            </div>
            <div class="form-group first-span">
                <span>Level homework</span>
                <select name="level_homework" style="display:block;">
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select>
            </div>           
            <input type="submit" name="submit" value="Update homework" class="btn btn-add btn-add-connect">
            <a href="homework.php" class="btn btn-add btn-cancel">Cancel</a>
            <div style="margin-bottom: 3rem;">
        </form>
<?php
    include('footer.php');
?>
