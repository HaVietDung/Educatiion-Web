<?php
    include('header.php');
?>
    <main>
        <a href="add_user.php" class="btn btn-add"><i class="fas fa-user-plus"></i> Add user</a>
        <div>
            <!-- <h2 style="font-weight: 400; color:green; margin-top: 2rem;">Thêm thành công!</h2> -->
        </div>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Recent activity</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Regisdate</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT * FROM tb_user";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $user_id = $row['user_id'];
                                                $user_name = $row['user_name'];
                                                $user_pass = $row['user_pass'];
                                                $email = $row['user_email'];
                                                $date = $row['regisdate'];
                                                $level = $row['user_level'];
                                                $status = $row['user_status'];
                                                
                                ?>
                                                <tr>
                                                    <td><?php echo $user_id; ?></td>
                                                    <td><?php echo $user_name; ?></td>                                                                
                                                    <td><?php echo $email; ?></td>                                 
                                                    <td><?php echo $date; ?></td> 
                                                    <td class="status"><?php echo $level ?></td>                                
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
                                                        <a href="update_user.php?user_id=<?php echo $user_id; ?>" class="update-icon">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                            <a href="delete_user.php?user_id=<?php echo $user_id; ?>" class="delete-icon">
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