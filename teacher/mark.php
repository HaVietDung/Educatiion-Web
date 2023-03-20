<?php
    include('header.php');
    if(isset($_GET['id_sub'])){
        $id_sub = $_GET['id_sub'];
        $id_home = $_GET['id_home'];
    }
?>
    <main>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Recent activity</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Excercise</th>
                                    <th>End date</th>
                                    <th>Finish</th>
                                    <th>Mark</th>
                                    <th>Satus</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT tb_homework.id_homework, tb_student.id_student, 
                                                    name_student, id_subject, submit_homework, end_date, finish_date, mark, status
                                            FROM tb_homework, tb_mark, tb_student
                                            WHERE tb_homework.id_homework = tb_mark.id_homework 
                                            AND tb_student.id_student = tb_mark.id_student and home_level = 0 and tb_mark.id_homework = '$id_home'";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id_std = $row['id_student'];
                                                $name_std = $row['name_student'];
                                                $excer = $row['submit_homework'];
                                                $end_date = $row['end_date'];
                                                $finish = $row['finish_date'];
                                                $mark = $row['mark'];
                                                $status = $row['status'];
                                ?>
                                                <tr>
                                                    <td class="status"><?php echo $name_std; ?></td>                                
                                                    <td class="status"><?php echo $id_sub; ?></td>    
                                                    <td>
                                                        <a href="dowload_homework.php?file=<?php echo $row['submit_homework'] ?>">
                                                            <?php echo $excer;?>
                                                        </a>
                                                    </td>                                                                                 
                                                    <td><?php echo $end_date ?></td>                                 
                                                    <td><?php echo $finish; ?></td>                                 
                                                    <!-- <td class="td-team">
                                                        <div class="img-1 img_alone">
                                                            <img src="../image/" alt="">
                                                        </div>
                                                    </td>                                 -->
                                                    <td class="status"><?php echo $mark; ?></td>                                                                                              
                                                    <td>
                                                        <?php
                                                            if($status==1)
                                                            {
                                                                ?>
                                                                <span class="badge success">Success</span>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <span class="badge warning">Processing</span>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>                                                                                                                                 
                                                    <td>
                                                        <a href="update_mark.php?id_sub=<?php echo $id_sub;?>&&id_home=<?php echo $id_home;?>&&id_std=<?php echo $id_std; ?>" class="update-icon">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                <?php
                                            }
                                        }
                                        else
                                        {

                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php
include('footer.php');
?>