<?php
    include('header.php');
    if(isset($_GET['id_subject'])){
        $id = $_GET['id_subject'];
    }
?>
<!-- CODE THÊM -->
    <main>
        <form action="" method="POST" class="register">
            <?php
                
                if(isset($_POST['submit'])){
                    $id_std = $_POST['id_student'];
                    $sql1 = "INSERT INTO tb_register(id_student, id_subject)
                    VALUES ('$id_std', '$id')";
                    $res1 = mysqli_query($conn, $sql1);
                    if($res1 > 0)
                    {
                        header("Location:contact.php");
                    }
                    else
                    {
                        
                    }
                }
            ?>
            <div class="form-group first-span">
                <span>ID subject</span>
                <input type="text" class="form-control read" readonly value="<?php echo $id;?>">                
            </div>                    
            <div class="form-group first-span">
                <span>Name</span>
                <?php 
                    $sql2 = "SELECT * FROM tb_subject WHERE id_subject = '$id'";
                    $res2 = mysqli_query($conn, $sql2);
                    if($res2 == TRUE)
                    {
                        $count = mysqli_num_rows($res2);
                        if($count>0)
                        {
                            while($row2 = mysqli_fetch_assoc($res2))
                            {
                                $name_subject = $row2['name_subject'];
                            }
                        }
                    }
                ?>
                <input type="text" class="form-control read" readonly value="<?php echo $name_subject;?>">                
            </div>                    
            <div class="form-group">
                <!-- Chọn ra những sinh viên chưa đăng kí học -->
                <span>ID student</span>
                <select name="id_student" style="display:block;">
                    <?php
                    $sql = "SELECT tb_student.id_student FROM tb_student, tb_register 
                    WHERE tb_register.id_student = tb_register.id_student 
                    AND tb_student.id_student NOT IN (SELECT tb_student.id_student FROM tb_student, tb_register, tb_subject 
                    WHERE tb_student.id_student =tb_register.id_student and tb_subject.id_subject = tb_register.id_subject
                    AND tb_register.id_subject = '$id')
                    AND tb_student.id_student != 1
                    GROUP BY tb_student.id_student";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res)) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo '<option value="' . $row['id_student'] . '">' . $row['id_student'] . '</option>';
                        }
                    }
                    ?>
                </select>                
            </div>
            <input type="submit" name="submit" value="Add student" class="btn btn-add btn-add-connect">
            <a href="contact.php" class="btn btn-add btn-cancel">Cancel</a>            
        </form>      
<?php
    include('footer.php');
?>