<?php
    include('header.php');
?>
    <main>
        <h2 class="dash-title">Overiew</h2>
        <div class="box-container">
            <!-- CODE PHP -->
            <?php
                $sql = "SELECT * FROM tb_subject";
                $res = mysqli_query($conn, $sql);
                if($res == TRUE)
                {
                    $count = mysqli_num_rows($res);
                    if($count>0)
                    {
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $id_subject = $row['id_subject'];
                            $name_subject = $row['name_subject'];
                            $desription = $row['description'];
                            $img_subject = $row['img_subject'];
            ?>
                            <div class="box">
                                <div class="box-image">
                                    <img src="../image/<?php echo $img_subject; ?>" alt="">
                                    <a href="register.php?id_subject=<?php echo $id_subject;?>">
                                        <?php echo $name_subject; ?>
                                    </a>
                                </div>
                            </div>
            <?php
                        }
                    }
                    else{

                    }
                }
            ?>
        </div>
<?php
include('footer.php');
?>