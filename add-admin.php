<?php include('partials/menu.php')?>

<div class="main" >
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Full Name"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Enter Username"></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php')?>




<?php
    //process the value from Form and save it in Database
    //Caheck whether the submit button is clicked or not

    if(isset($_POST["submit"])){
        //button clicked
        // echo "Button clicked";

        //Get the data form
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        //Sql query to save data to the database
        $sql="insert into tble_admin set full_name='$full_name',username='$username',password='$password'";

        

        //Execute query save data in database
        $res=mysqli_query($conn,$sql) or die(mysqli_error());

        //check whether data is inserted or not
        if($res==TRUE){
            // echo "Data Inserted SUccess";
            //create session variable to display message
            $_SESSION['add']="Admin added successfully";
            //Redirect page
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            //create session variable to display message
            $_SESSION['add']="Failed to add admin";
            //Redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
    
?>