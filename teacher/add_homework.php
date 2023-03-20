<?php
    include('header.php');
    if(isset($_GET['id_subject'])){
        $id = $_GET['id_subject'];
    }
?>
<!-- CODE THÊM -->
    <main>
        <form action="" method="POST" class="register" enctype="multipart/form-data">
            <?php
                
                if(isset($_POST['submit'])){
                    $name_home = $_POST['name_homework'];
                    $endate= $_POST['end_date'];
                    $level = $_POST['level'];
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
                    $sql3 = "INSERT INTO tb_homework(id_subject, name_homework, excercise, end_date, home_level) 
                    VALUES ('$id', '$name_home','$image_name','$endate', '$level')";
                    $res3 = mysqli_query($conn, $sql3);
                    if($res3 > 0)
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
            <div class="form-group">
                <span>Name homework</span>
                <input type="text" class="form-control" name="name_homework">
            </div>
            <div class="gender">
                <span>Excercise</span>
                <br>
                <input type="file" name="image" class="file">
            </div>
            <div class="form-group">
                <span>End date</span>
                <input type="datetime-local" class="form-control" name="end_date">
            </div>
            <div class="form-group first-span">
                <span>Level homework</span>
                <select name="level" style="display:block;">
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select>
            </div>    
            <input type="submit" name="submit" value="Add homework" class="btn btn-add btn-add-connect">
            <a href="contact.php" class="btn btn-add btn-cancel">Cancel</a>            
        </form>      
<?php
    include('footer.php');
?>