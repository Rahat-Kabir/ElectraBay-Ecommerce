<?php
    include 'connection.php';

    $id=$_GET['updateid'];

    $sql = "Select * from `users` where id=$id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $email=$row['email'];
    $mobile=$row['mobile'];
    $password=$row['password'];
    

    if(isset($_POST['submit'])){
        $name    =$_POST['name'];                                                                                                                    
        $email   =$_POST['email']; 
        $mobile  =$_POST['mobile']; 
        $password=$_POST['password']; 


        $sql="update `users` set id=$id,name='$name',
        email='$email',mobile='$mobile',password='$password'
        where id=$id";

        $result=mysqli_query($conn,$sql);

        if($result){
            // echo "data updated successfully";
           header('location:display.php');
        }
        else{
            die(mysqli_error($conn));
        }
        
    }


?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php include('./inc/header.php'); ?>
    <div class="container mt-5">
        <p class="alert alert-info">Update your information</p>

        <form method="POST">



            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value=<?php
                echo $name;
                ?>>
            </div>



            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value=<?php
                echo $email;
                ?>>
            </div>

            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value=<?php
                echo $mobile;
                ?>>
            </div>


            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value=<?php
                echo $password;
                ?>>
            </div>


            <!-- <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="1234">
            </div>
 -->




            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>


    </div>





    <?php include('./inc/footer.php'); ?>


</body>

</html>