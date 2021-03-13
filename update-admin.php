<?php include('partials/menu.php') ?>

<?php
    $id=$_GET['id'];
    $sql="select * from tble_admin where id=$id";
    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        $count=mysqli_num_rows($res);
        if($count==1){
            // echo "Admin available";
            $row=mysqli_fetch_assoc($res);

            $full_name=$row['full_name'];
            $username=$row['username'];
        }
        else{
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<div class="main">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        
        <form action="" method="POST">
        <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Full Name" value="<?php echo $full_name?>"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Enter Username" value="<?php echo $username?>"></td>
                </tr>

                <!-- <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr> -->

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $fullname=$_POST['full_name'];
        $user_name=$_POST['username'];

        $sql="update tble_admin set full_name='$fullname' ,username='$user_name' where id=$id";
        $res=mysqli_query($conn,$sql) or die(mysqli_error());

        if($res==TRUE){
            $_SESSION['update']="$id update success";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['update']="$id update not success";
            header("location:".SITEURL.'admin/update-admin.php');
        }
    }
?>

<?php include('partials/footer.php') ?>