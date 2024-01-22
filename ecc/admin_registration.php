<?php
// Include your database connection file
include('connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newAdminUsername = $_POST['username'];
    $newAdminPassword = $_POST['password'];

    // Insert a new admin user into the admins table
    $insertStmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
    $insertStmt->bind_param('ss', $newAdminUsername, $newAdminPassword);

    if ($insertStmt->execute()) {
        $registrationMessage = "Registration successful. New admin user created.";
    } else {
        $registrationMessage = "Error creating new admin user: " . $insertStmt->error;
    }

    // Close the statement
    $insertStmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <h2>Admin Registration</h2>

    <?php
    if (isset($registrationMessage)) {
        echo "<p>$registrationMessage</p>";
    }
    ?>
    <div class="row justify-content-md-center" style="background-color: #eee;">
        <div class="col-4">
            <form class="text-center border border-light p-5" action="" method="post">

                <p class="h4 mb-4">Admin Register</p>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control mb-4" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control mb-4" required>
                </div>

                <button class="btn btn-dark btn-block my-4" type="submit">Register</button>
            </form>
        </div>
    </div>



</body>

</html>