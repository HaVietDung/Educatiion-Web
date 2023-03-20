<?php
    include('header.php');
?>
    <main>
        <form action="" method="POST" class="register">
            <?php
                if(isset($_POST['submit'])){
                    $user_name = $_POST['user_name'];
                    $pass1 = $_POST['user_pass1'];
                    $pass2 = $_POST['user_pass2'];
                    $email = $_POST['user_email'];

                    // Kiểm tra email đã có chưa
                    $sql = "SELECT * FROM tb_user WHERE user_name ='$user_name' OR user_email = '$email'";
                    $res = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($res) == 0)
                    {
                        if($user_pass1 == $user_pass2)
                        {
                            // $code = md5(uniqid(rand(), true));
                            // $pass_hash = password_hash($user_pass1, PASSWORD_DEFAULT);
                            $sql2 = "INSERT INTO tb_user(user_name, user_pass, user_email)
                                VALUES('$user_name', '$pass1', '$email')";
                            $res2 = mysqli_query($conn, $sql2);
                            if($res2==TRUE){
                                header("Location:user.php");
                            }
                            else{
                                header("Location:add_user.php");
                            }
                        }
                        else{
                            header("Location:add_user.php");
                        }
                    }
                }
            ?>
            <div class="form-group first-span">
                <span>User name</span>
                <input type="text" class="form-control" name="user_name">
            </div>
            <div class="form-group">
                <span>Password</span>
                <input type="password" class="form-control" name="user_pass1">
            </div>
            <div class="form-group">
                <span>Confirm password</span>
                <input type="password" class="form-control" name="user_pass2">
            </div>
            <div class="form-group">
                <span>Email</span>
                <input type="email" class="form-control" name="user_email">
            </div>
            <input type="submit" name="submit" value="Add user" class="btn btn-add btn-add-connect">
            <a href="user.php" class="btn btn-add btn-cancel">Cancel</a>
        </form>      
<?php
    include('footer.php');
?>