<?php
include('./dashboard.php')
?>
<?php
if (isset($_GET['id_homework']) && isset($_GET['id_subject']) && isset($_GET['id_student'])) {
    $id_homework = $_GET['id_homework'];
    $id_subject = $_GET['id_subject'];
    $sql = "SELECT * from tb_homework WHERE id_homework = '$id_homework'
    and id_subject = '$id_subject'";
    $res = mysqli_query($conn, $sql);
    if ($res == TRUE) {
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            $row = mysqli_fetch_assoc($res);
            $name_homework = $row['name_homework'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
        }
    }
    $id_student = $_GET['id_student'];
    $sql2 = "SELECT * from tb_student where id_student = '$id_student'";
    $res2 = mysqli_query($conn, $sql2);
    if ($res2 == TRUE) {
        $count2 = mysqli_num_rows($res2);
        if ($count2 > 0) {
            $row2 = mysqli_fetch_assoc($res2);
            $name_student = $row2['name_student'];
        }
    }
}
?>
<div class="main-mark">
    <h1><?php echo $name_homework ?></h1>
    <div class="box1">
        <div class="date-mark">
            <h3>Opened:</h3>
            <h3 class="date"><?php echo $start_date; ?></h3>
        </div>
        <div class="date-mark">
            <h3>Due:</h3>
            <h3 class="date"><?php echo $end_date; ?></h3>
        </div>
    </div>
    <?php
    $sql3 = "SELECT * from tb_mark where id_homework='$id_homework' 
        and id_student = '$id_student'";
    $res3 = mysqli_query($conn, $sql3);
    if ($res3 == TRUE) {
        $count3 = mysqli_num_rows($res3);
        if ($count3 > 0) {
            $row3 = mysqli_fetch_assoc($res3);
            $excercise = $row3['submit_homework'];
            $finish_date = $row3['finish_date'];
            $mark = $row3['mark'];
            $mark_status = $row3['status'];
        }
    }

    ?>
    <table class="table-mark">
        <tr>
            <th>Tên sinh viên</th>
            <td><?php echo $name_student; ?></td>
        </tr>
        <tr>
            <th>Bài nộp</th>
            <td>
                <?php
                if (isset($excercise)) { ?>
                    <a href="download.php?file=<?php echo $excercise; ?>"><?php echo $excercise; ?></a>
                <?php
                }

                ?>
            </td>
        </tr>
        <tr>
            <th>Trạng thái nộp bài</th>
            <td>
                <?php
                if (isset($excercise)) {
                    echo 'Đã nộp bài';
                } else {
                    echo 'Chưa nộp bài';
                }
                ?>
            </td>
        </tr>
        <tr>
            <th>Ngày nộp</th>
            <td><?php
                if (isset($excercise)) {
                    echo $finish_date;
                }
                ?></td>
        </tr>
        <tr>
            <th>Điểm</th>
            <td>
                <?php
                if (isset($excercise)) {
                    echo $mark;
                }
                ?>
            </td>
        </tr>
    </table>
    <div class="btn">
        <button><a href="<?php echo SITEURL?>/add-mark.php?id_homework=<?php echo $id_homework;?>&id_subject=<?php echo $id_subject;?>&id_student=<?php echo $id_student;?>">Nộp bài</a></button>
        <button><a href="<?php echo SITEURL?>/update-mark.php?id_homework=<?php echo $id_homework;?>&id_subject=<?php echo $id_subject;?>&id_student=<?php echo $id_student;?>">Sửa bài</a></button>
    </div>
</div>

<?php
include('./footer.php');
?>