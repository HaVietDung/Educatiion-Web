<?php
    include('header.php');
?>
    <main>
        <h2 class="dash-title">Overiew</h2>
        <div class="dash-cards">
            <div class="card-single">
                <div class="card-body">
                    <span class="fas fa-user-graduate"></span>
                    <div>
                        <?php
                            $sql = "SELECT * FROM tb_student";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                        ?>
                        <h5>Student</h5>
                        <h4><?php echo $count; ?></h4>
                        <a href="student.php">
                            View all
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-single">
                <div class="card-body">
                    <span class="fas fa-book-open"></span>
                    <div>
                        <?php
                            $sql1 = "SELECT * FROM tb_subject";
                            $res1 = mysqli_query($conn, $sql1);
                            $count1 = mysqli_num_rows($res1);
                        ?>
                        <h5>Subject</h5>
                        <h4><?php echo $count1; ?></h4>
                        <a href="subject.php">
                            View all
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-single">
                <div class="card-body">
                    <span class="fas fa-user-tie"></span>
                    <div>
                        <h5>Homework</h5>
                        <?php
                            $sql2 = "SELECT * FROM tb_homework where home_level=0";
                            $res2 = mysqli_query($conn, $sql2);
                            $count2 = mysqli_num_rows($res2);
                        ?>
                        <h4><?php echo $count2;?></h4>
                        <a href="homework.php">
                            View all
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-single">
                <div class="card-body">
                    <span class="fas fa-folder"></span>
                    <div>
                        <?php
                            $sql3 = "SELECT * FROM tb_homework where home_level=1";
                            $res3 = mysqli_query($conn, $sql2);
                            $count3 = mysqli_num_rows($res3);
                        ?>
                        <h5>Projects</h5>
                        <h4><?php echo $count3;?></h4>
                        <a href="project.php">
                            View all
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Recent activity</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Team</th>
                                    <th>Project</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Finish date</th>
                                    <th>Student</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql4 = "SELECT * FROM tb_team, tb_homework, tb_mark, tb_student 
                                            WHERE tb_team.id_homework = tb_homework.id_homework and home_level = 1
                                            and tb_mark.id_student = tb_student.id_student and tb_homework.id_homework = tb_mark.id_homework";
                                    $res4 = mysqli_query($conn, $sql4);
                                    if($res4 == TRUE)
                                    {
                                        $count4 = mysqli_num_rows($res4);
                                        if($count4>0){
                                            while($row4 = mysqli_fetch_assoc($res4))
                                            {
                                                $id_team = $row4['id_team'];
                                                $name_project = $row4['name_homework'];
                                                $start_date = $row4['start_date'];
                                                $end_date = $row4['end_date'];
                                                $finish_date = $row4['finish_date'];
                                                $img_std = $row4['image_student'];
                                ?>
                                                <tr>
                                                    <td><?php echo $id_team;?></td>
                                                    <td><?php echo $name_project?></td>
                                                    <td><?php echo $start_date;?></td>
                                                    <td><?php echo $end_date;?></td>
                                                    <td><?php echo $finish_date;?></td>
                                                    <td class="td-team" style="margin-left: 2.5rem;">
                                                        <div class="img-1">
                                                            <img src="../image/<?php echo $img_std;?>" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $date1 = strtotime($end_date);
                                                            $date2 =  strtotime($finish_date);
                                                            $date3 = $date2 - $date1;
                                                            if($date3>0)
                                                            {
                                                                ?>
                                                                    <span class="badge warning">Processing</span>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <span class="badge success">Success</span>
                                                                <?php 
                                                            }
                                                        ?>
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
                                <!-- <tr>
                                    <td>3</td>
                                    <td>Logo Design</td>
                                    <td>15 Aug, 2020</td>
                                    <td>22 Aug, 2020</td>
                                
                                    <td>
                                        <span class="badge warning">Processing</span>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

<?php
    include('footer.php');
?>