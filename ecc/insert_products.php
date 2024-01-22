<?php
// Include the database connection file
include('connection.php');

// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $price = $_POST["price"];
    $category = $_POST["category"];

    // Upload image
    $img = $_FILES["img"]["name"];
    $img_temp = $_FILES["img"]["tmp_name"];
    move_uploaded_file($img_temp, "img/products/$img");

    // Insert data into database
    $sql = "INSERT INTO products (title, price, img, category) VALUES ('$title', $price, '$img', '$category')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectraBay | Online Store for Tech Guy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <!-- <section row justify-content-md-center class="vh-100" style="background-color: #eee;"> -->
    <?php include('./inc/header.php'); ?>


    <div class="container" style="background-color: #eee;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="text-center border border-light p-4" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                    method="post" enctype="multipart/form-data">
                    <p class="h2 fw-bold mb-4 mt-4">Add Product</p>

                    <div class="mb-3">
                        <label class="fw-bold" for="title">Product Title</label>
                        <input class="form-control" type="text" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold" for="price">Product Price</label>
                        <input class="form-control" type="number" name="price" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold" for="img">Choose Image</label>
                        <input class="form-control" type="file" name="img" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold" for="category">Product Category</label>
                        <input class="form-control" type="text" name="category" required>
                    </div>

                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Add Product">
                    </div>
                </form>
            </div>
        </div>
    </div>











    <?php include('./inc/footer.php'); ?>
    <!-- </section> -->
</body>


</html>