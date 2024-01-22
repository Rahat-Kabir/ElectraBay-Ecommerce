<?php
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles -->
<style>
body {
    background-color: #f8f9fa;
    /* You can change this color */
}
</style>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>



    <?php include('./inc/header_admin.php'); ?>

    <br><br>
    <div style="background-color: #eee;" class="container">
        <!--  <button class="btn btn-primary my-5"><a href="login.php" class="text-light"> CREATE A NEW ACCOUNT</a>
        </button> -->

        <div class="mx-auto" style="width: 600px;">
            <p><mark>Displaying user all information</mark> </p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>


                <!-- php code for showing result -->

                <?php
               

$sql = "SELECT * FROM `users`";
$result = $db->query($sql);

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $password = $row['password'];

        echo '
        <tr>
            <th scope="row">' . $id . '</th>
            <td>' . $name . '</td>
            <td>' . $email . '</td>
            <td>' . $mobile . '</td>
            <td>' . $password . '</td>
            <td>
                <button class="btn btn-primary">
                    <a href="update.php?updateid=' . $id . '" class="text-light">Update</a>
                </button>
                <button class="btn btn-danger">
                    <a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a>
                </button>
            </td>
        </tr>';
    }
} else {
    // Handle the case where the query fails
    print_r($db->errorInfo()); // You can use this for debugging
}
?>



            </tbody>
        </table>



    </div>



    <!-- Search -->


    <br><br>
    <br><br>

    <br><br>
    <br><br>


    <div class="container">


        <!-- Search html code   -->
        <nav class="navbar navbar-light bg-light ">
            <a class="navbar-brand">Search all data using name</a>
            <form method="post">
                <input class=" mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
            </form>
        </nav>



        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SI NO</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>


                </tr>
            </thead>
            <tbody>


                <!-- This code here for searching based on name -->

                <?php



            if (isset($_POST['submit'])) {
                $search = $_POST['search'];

    
             $sql = "SELECT * FROM `users` WHERE name = :search";
             $stmt = $db->prepare($sql);
                $stmt->bindParam(':search', $search, PDO::PARAM_STR);
                $stmt->execute();
                $resultsearch = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($resultsearch) {
                    foreach ($resultsearch as $row) {
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $mobile = $row['mobile'];
                $password = $row['password'];

                            echo '
                            <tr>
                            <th scope="row">'.$id.'</th>
                            <td>'.$name.'</td>
                            <td>'.$email.'</td>
                            <td>'.$mobile.'</td>
                            <td>'.$password.'</td>
                            <td>
                            <button class="btn btn-primary"><a href="update.php?
                            updateid='.$id.'" 
                            class="text-light">Update</a></button>
                            <button class="btn btn-danger">
                            <a href="delete.php?
                            deleteid='.$id.'" class="text-light">Delete</a></button>
                            </td>
       
    
                        </tr>';
    
                        }
                    }
                }
                

            ?>


                <br><br>
                <br>





            </tbody>
        </table>




    </div>


    <br><br>
    <br><br>


    <div class="container">


        <!-- Search html code   -->
        <nav class=" navbar navbar-light bg-light ">
            <a class=" navbar-brand">Search all data using id</a>
            <form method="post">
                <input class=" mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
            </form>
        </nav>



        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SI NO</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>

                </tr>
            </thead>
            <tbody>



                <!-- This code here for searching based on id -->

                <?php



if (isset($_POST['submit'])) {
    $search = $_POST['search'];


 $sql = "SELECT * FROM `users` WHERE id = :id";
 $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $search, PDO::PARAM_STR);
    $stmt->execute();
    $resultsearch = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($resultsearch) {
        foreach ($resultsearch as $row) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $password = $row['password'];

                echo '
                <tr>
                <th scope="row">'.$id.'</th>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$mobile.'</td>
                <td>'.$password.'</td>
                <td>
                <button class="btn btn-primary"><a href="update.php?
                updateid='.$id.'" 
                class="text-light">Update</a></button>
                <button class="btn btn-danger">
                <a href="delete.php?
                deleteid='.$id.'" class="text-light">Delete</a></button>
                </td>


            </tr>';

            }
        }
    }
    

?>




            </tbody>
        </table>

        <br><br><br>

        <button class="btn btn-info btn-block"><a href="login.php" class="text-light"> CREATE A NEW USER ACCOUNT</a>
        </button><br>
        <button class="btn btn-primary btn-block"><a href="insert_products.php" class="text-light"> ADD NEW PRODUCTS</a>
        </button>
        <br>

        <br><br>

        <button class="btn btn-danger btn-block"><a href="admin_logout.php" class="text-light"> LOGOUT ADMIN</a>
        </button>
        <br>

    </div>


    <?php include('./inc/footer.php'); ?>


</body>

</html>