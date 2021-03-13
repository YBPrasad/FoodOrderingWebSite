<?php include('partials/menu.php') ?>

<div class="main">
    <div class="wrapper">
        <h1>Change password</h1>
        <br><br>
            
        <br>
        <?php
            if(isset($_GET['id'])){
                $id=$_GET['id'];

            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Old Password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Enter old password">
                    </td>
                </tr>

                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="Enter new password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Enter confirm password">
                    </td>
                </tr>

                <tr>
                    <td class="colspan-2">
                        <input type="submit" name="submit" value="Change">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $cpassword=md5($_POST['current_password']);
        $npassword=md5($_POST['new_password']);
        $conpassword=md5($_POST['confirm_password']);

        $sql="select * from tble_admin where id=$id and password='$cpassword'";
        $res=mysqli_query($conn,$sql);
        if($res==TRUE){
            $count=mysqli_num_rows($res);
            if($count==1){
                if($npassword==$conpassword){
                    $sql2="update tble_admin set password='$conpassword' where id=$id";
                    $res2=mysqli_query($conn,$sql2);
                    if($res2==TRUE){
                        $_SESSION['update-password']="Change password success";
                        header('location:'.SITEURL.'admin/manage-admin.php');

                    }
                    else{
                        $_SESSION['update-password']="Change password not success";
                        header('location:'.SITEURL.'admin/manage-admin.php');

                    }
                    // echo "user found";
                    
                }
                else{
                    $_SESSION['pwd_not_fount']="Password Not Matched";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else{
                $_SESSION['user_not_fount']="Incorrect password";
                header('location:'.SITEURL.'admin/manage-admin.php');

            }
        }


    }

?>

<?php include('partials/footer.php') ?>