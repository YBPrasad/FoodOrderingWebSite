<?php include('partials/menu.php')?>

    <!--Main content section starts-->
    <div class="main" >
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br>
            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['user_not_fount'])){
                    echo $_SESSION['user_not_fount'];
                    unset($_SESSION['user_not_fount']);
                }
                if(isset($_SESSION['pwd_not_fount'])){
                    echo $_SESSION['pws_not_fount'];
                    unset($_SESSION['pwd_not_fount']);
                }
                if(isset($_SESSION['update-password'])){
                    echo $_SESSION['update-password'];
                    unset($_SESSION['update-password']);
                }
            ?>

            <br><br><br>
            <!--Button to add admin-->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br><br>

            <table class="tbl-full">
                <tr>
                    <th>Serial No</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                    $sql="select * from tble_admin";
                    $res=mysqli_query($conn,$sql) or die(mysqli_error());

                    if($res==TRUE){
                        //count rows to check wheter we have dat in database
                        $count=mysqli_num_rows($res);//function to get all rows

                        //check num of rows
                        if($count>0){
                            $sv=1;
                            //we have data in database
                            while($rows=mysqli_fetch_assoc($res)){
                                //using while loop to get all the data from database
                                //And while loop will execute as long as we have data in database

                                //get individual data
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //display the valu in database
                                ?>
                                <tr>
                                    <td><?php echo $sv ?></td>
                                    <td><?php echo $full_name ?></td>
                                    <td><?php echo $username ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                                        <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-secondary">Change Password</a>

                        
                                    </td>
                                </tr>
                                


                                <?php
                                $sv=$sv+1;
                            }
                        }
                        else{
                            //We do not have data in database
                        }
                    }
                ?>

                

                
            </table>

            
        </div>
    </div>
    <!--Main content section ends-->

    <?php include('partials/footer.php')?>