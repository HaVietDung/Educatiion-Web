<?php
    include('header.php');
    if(isset($_GET['id_subject'])){
        $id = $_GET['id_subject'];
    }
?>
    <main>
        <a href="add_register.php?id_subject=<?php echo $id;?>" class="btn btn-add" style="margin-right: 2rem;">
            <i class="fas fa-user-plus" style="margin-right: 0.5rem;"></i>Add student
        </a>
        <a href="homework_id.php?id_subject=<?php echo $id;?>" class="btn btn-add">Homework</a>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Recent activity</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID subject</th>
                                    <th>Subject</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Image</th>
                                    <th>Phone</th>
                                    <th>Delete</th>
                                    <th>Back</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT name_subject, tb_student.id_student, name_student, gender, image_student, phone
                                            FROM tb_student, tb_subject, tb_register
                                            WHERE tb_student.id_student=tb_register.id_student
                                                    AND tb_subject.id_subject = tb_register.id_subject
                                                    AND tb_subject.id_subject = '$id'";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $name_sub = $row['name_subject'];
                                                $id_std = $row['id_student'];
                                                $name = $row['name_student'];
                                                $gender = $row['gender'];
                                                $img = $row['image_student'];
                                                $phone = $row['phone'];
                                ?>
                                                <tr>
                                                    <td><?php echo $id; ?></td>
                                                    <td><?php echo $name_sub; ?></td>
                                                    <td><?php echo $id_std;?></td>
                                                    <td><?php echo $name; ?></td>
                                                    <td>
                                                        <?php 
                                                            if($gender == 1)
                                                            {
                                                                echo "Nam";
                                                            }
                                                            else
                                                            {
                                                                echo "Nữ";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="td-team">
                                                        <div class="img-1 img_alone">
                                                            <img src="../image/<?php echo $img?>" alt="">
                                                        </div>
                                                    </td>
                                                    <td><?php echo $phone;?></td>
                                                    <td>
                                                        <a href="delete_register.php?id_sub=<?php echo $id;?>&&id_std=<?php echo $id_std;?>" class="update-icon">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="contact.php" class="delete-icon">
                                                            <i class="fas fa-arrow-right"></i>
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