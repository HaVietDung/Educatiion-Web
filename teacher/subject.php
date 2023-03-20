<?php
    include('header.php');
?>
    <main>
        <a href="add_subject.php" class="btn btn-add"><i class="fas fa-plus"></i> Add subject</a>
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
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                                <tr>
                                                    <td><?php echo $id_subject; ?></td>
                                                    <td><?php echo $name_subject; ?></td>                                 
                                                    <td><?php echo $desription ?></td>                                 
                                                    <td>
                                                        <img src="../image/<?php echo $img_subject; ?>" alt="" width="100px">
                                                    </td>                                 
                                                    <td>
                                                        <a href="update_subject.php?id_subject=<?php echo $id_subject;?>" class="update-icon">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="delete_subject.php?id_subject=<?php echo $id_subject; ?>" class="delete-icon">
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