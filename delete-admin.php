<?php

    include('../config/constants.php');

    $id=$_GET['id'];

    $sql="delete from tble_admin where id=$id";

    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        //query executed successfully
        // echo "Delete successful";
        $_SESSION['delete']="<div class='success' style='color: brown'>Admin Deleted</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        //query not execute completely
        // echo "Failed to delete";
        $_SESSION['delete']="Failed to delete admin.Try again";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>