<?php
    include('header.php');
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
                                    <th>ID</th>
                                    <th>Subject</th>
                                    <th>Name</th>
                                    <th>Excercise</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody><tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT * FROM tb_homework WHERE home_level = 1 ORDER BY id_subject";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id_home = $row['id_homework'];
                                                $id_sub = $row['id_subject'];
                                                $name = $row['name_homework'];
                                                $excer= $row['excercise'];
                                                $sdate = $row['start_date'];
                                                $edate = $row['end_date'];
                                                $home_level = $row['home_level'];
                                ?>
                                                <tr>
                                                    <td><?php echo $id_home; ?></td>                                
                                                    <td><?php echo $id_sub; ?></td>                                                                
                                                    <td><?php echo $name ?></td>                                 
                                                    <td>
                                                        <a href="dowload_homework.php?file=<?php echo $row['excercise'] ?>">
                                                            <?php echo $excer;?>
                                                        </a>
                                                    </td>                                 
                                                    <td><?php echo $sdate; ?></td>                                 
                                                    <td><?php echo $edate; ?></td>
                                                    <td>
                                                        <a href="update_homework.php?id_home=<?php echo $id_home;?>&&id_sub=<?php echo $id_sub; ?>" class="update-icon">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="delete_homework.php?id_home=<?php echo $id_home;?>&&id_sub=<?php echo $id_sub; ?>" class="delete-icon">
                                                            <i class="fas fa-trash-alt"></i>
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