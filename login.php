<?php include('../config/constants.php')?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1>Login</h1>
            <br>
            <!--Login form start here-->

                <form action="" method="POST">

                    <table>
                        <tr>
                            <td>Username:</td>
                            <td> <input type="text" name="username" placeholder="Enter username"></td>
                        </tr>

                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" placeholder="Enter password"></td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Login" name="submit" class="btn-secondary">
                            </td>
                            
                        </tr>
                    </table>
                    
                    
                </form>
            <!--Login form end here-->

            
        </div>
    </body>
</html>

<?php
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        $sql="select * from tble_admin where username='$username' and password='$password'";

        $res=mysqli_query($conn,$sql);

        if($res==TRUE){
            $count=mysqli_num_rows($res);
            echo $count;
            if($count==1){
                header('location:'.SITEURL.'admin');
                $_SESSION['user']=$username;//to check user is logged or not
            }
            else{
               
            }
        }

    }
?>

<?php include('partials/footer.php') ?>