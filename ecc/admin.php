<?php
// Include your database connection file
include('connection.php');

session_start();

// Check if the admin is already logged in, redirect to display.php if true
if (isset($_SESSION['admin_id'])) {
     header("Location: display.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate admin credentials
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        // Verify the password (in a real-world scenario, use password_hash and password_verify)
        if ($password == $admin['password']) {
            // Admin authentication successful, set session variable and redirect to display.php
            $_SESSION['admin_id'] = $admin['id'];
             header("Location: display.php");
            exit();
        }
    }

    $error_message = "Invalid username or password";

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<body>



    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>

    <div class="form-group">

        <form class="text-center border border-light p-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Admin Login</p>

            <div class="mb-4">
                <label for="username" class="text-center fw-bold">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="password" class="text-center fw-bold">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button><br><br>

            <a href="admin_registration.php" class="btn btn-secondary">Create a new admin account</a>


        </form>
    </div>


</body>

</html>