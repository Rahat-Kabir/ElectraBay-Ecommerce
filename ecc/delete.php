<?php
include 'connection.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql ="delete from `users` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
    // echo "Delete success";
    header('location:display.php');
    }
    else{
        die(mysqli_error($conn));
    }

}

?>