<?php
include('dashboard.php');
?>

<main>
    <h2>Overview</h2>
    <?php
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $sql1 = "SELECT id_student from tb_student where user_id = '$user_id'";
        $res1 = mysqli_query($conn, $sql1);
        if ($res1 == true) {
            $count1 = mysqli_num_rows($res1);
            if ($count1 > 0) {
                $row1 = mysqli_fetch_assoc($res1);
                $id_student = $row1['id_student'];
            }
        }
    }
    ?>
    <?php
    $sql2 = "SELECT * from tb_register where id_student = '$id_student'";
    $res2 = mysqli_query($conn, $sql2);
    if ($res2 == true) {
        $count2 = mysqli_num_rows($res2);
        if ($count2 > 0) {
            while ($row2 = mysqli_fetch_assoc($res2)) {
                $id_subject = $row2['id_subject']; ?>
                <?php
                $sql = "SELECT * from tb_subject where id_subject = '$id_subject'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name_subject'];
                        $img = $row['img_subject']
                ?>
                        <div class="dash-cards">
                            <div class="card-single">
                                <div class="card-body">
                                    <img src="../image/<?php echo $img ?>" alt="">
                                    <h3><?php echo $name ?></h3>
                                </div>
                                <div class="card-footer">
                                    <a href="<?php echo SITEURL; ?>/subject.php?id_subject=<?php echo $id_subject ?>&id_student=<?php echo $id_student ?>">View all</a>
                                </div>
                            </div>
        <?php
                    }
                }
            }
        }
    }
        ?>
        
</main>
</div>
<?php
include('footer.php');
?>