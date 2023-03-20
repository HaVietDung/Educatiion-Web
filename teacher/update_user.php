<?php
    include('header.php');
?>
    <main>
        <?php
            if(isset($_GET['user_id']))
            {
                $id_user = $_GET['user_id'];
            }
            $sql = "SELECT * FROM tb_user WHERE user_id = '$id_user'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $user_name = $row['user_name'];
                $user_pass = $row['user_pass'];
                $user_email = $row['user_email'];
                $regis = $row['regisdate'];
                $level = $row['user_level'];
            }
            
        ?>
        <!-- CODE PHP -->

        <form action="" method="POST" class="register">
            <?php
                if(isset($_POST['submit']))
                {
                    $pass = $_POST['pass'];
                    $level = $_POST['level'];
                    if($pass != "")
                    {
                        $sql1 = "UPDATE tb_user SET user_pass = '$pass', user_level = '$level'
                                    WHERE user_id = '$id_user'";
                        $res1 = mysqli_query($conn, $sql1);
                        if($res1 == TRUE)
                        {
                            header("Location:user.php");
                        }
                        else
                        {
                            header("Location:update_user.php");
                        }
                    }
                }
            ?>
            <div class="form-group first-span">
                <span>User ID</span>
                <input type="text" class="form-control read" readonly value="<?php echo $id_user;?>">
            </div>
            <div class="form-group">
                <span>User name</span>
                <input type="text" class="form-control read" readonly value="<?php echo $user_name;?>">
            </div>
            <div class="form-group">
                <span>User pass</span>
                <input type="text" class="form-control" name="pass" value="<?php echo $user_pass;?>">
            </div>
            
            <div class="form-group">
                <span>Email</span>
                <input type="text" class="form-control read" readonly value="<?php echo $user_email;?>">
            </div>
            <div class="form-group">
                <span>Regisdate</span>
                <input type="datetime-local" class="form-control read" readonly value="<?php echo $date = date("Y-m-d\TH:i:s", strtotime($regis)); ?>">
            </div>
            <div class="form-group">
                <span>Level</span>
                <input type="text" class="form-control" name="level" value="<?php echo $level; ?>">
            </div>            
            <input type="submit" name="submit" value="Update user" class="btn btn-add btn-add-connect">
            <a href="user.php" class="btn btn-add btn-cancel">Cancel</a>
            <div style="margin-bottom: 5rem;">
            </div>
        </form>
<?php
    include('footer.php');
?>
