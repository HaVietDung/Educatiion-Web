<?php
include('dashboard.php');
?>
<div class="main-subject">
    <?php
    if (isset($_GET['id_subject']) && isset($_GET['id_student'])) {
        $id_student = $_GET['id_student'];
        $id_subject = $_GET['id_subject'];
        $sql = "SELECT * from tb_subject WHERE id_subject = '$id_subject'";
        $res = mysqli_query($conn, $sql);
        if ($res == TRUE) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $name_subject = $row['name_subject'];
            }
        }
    }
    ?>
    <h1 class="subject-name"><?php echo $name_subject; ?></h1>
    <?php
    // bảng homework
    $sql2 = "SELECT * from tb_homework where id_subject = '$id_subject'";
    $res2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($res2) > 0) {
        while ($row2 = mysqli_fetch_assoc($res2)) {
            $id_homework = $row2['id_homework'];
            $name_homework = $row2['name_homework'];
            $start_date = $row2['start_date'];
            $end_date = $row2['end_date'];
            $excer = $row2['excercise'];
            $home_level = $row2['home_level']
    ?>
            <div class="homework-name">
                <div class="body">
                    <a href="<?php echo SITEURL; ?>/mark.php?id_homework=<?php echo $id_homework; ?>&id_subject=<?php echo $id_subject; ?>&id_student=<?php echo $id_student; ?>">
                        <h2 id="title"><?php echo $name_homework ?></h2>
                    </a>
                    <div class="date">
                        <h3>Opened:</h3>
                        <h3><?php echo $start_date; ?></h3>
                    </div>
                    <div class="date">
                        <h3>Due:</h3>
                        <h3><?php echo $end_date; ?></h3>
                    </div>
                    <div class="work">
                        <h3>Excercise:</h3>
                        <a href="download_excercise.php?file=<?php echo $excer; ?>"><?php echo $excer; ?></a>
                    </div>
                    <?php
                        if($home_level==1){?>
                            <div class="team">
                                <a href="register-project.php?id_subject=<?php echo $id_subject; ?>&id_homework=<?php echo $id_homework; ?>&id_student=<?php echo $id_student ?>">Register Team</a>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>
<?php
include('footer.php');
?>