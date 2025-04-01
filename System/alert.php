<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('registered') === 'true') {
                alert('You have successfully registered. Please login to access your account.');
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <?php
    // Include database connection file
    $servername = "localhost";  // Change as needed
    $username = "root";         // Change as needed
    $password = "";             // Change as needed
    $database = "test";         // Change as needed

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve and sanitize form input
        $form_username = htmlspecialchars($_POST['username']);
        $form_email = htmlspecialchars($_POST['email']);
        $form_password = htmlspecialchars($_POST['password']);

        // Simple validation
        if (!empty($form_username) && !empty($form_email) && !empty($form_password)) {
            // Hash password for security
            $hashed_password = password_hash($form_password, PASSWORD_DEFAULT);

            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $form_username, $form_email, $hashed_password);

            if ($stmt->execute()) {
                // Redirect with query parameter
                header('Location: register.php?registered=true');
                exit;
            } else {
                echo '<div class="alert alert-danger">Registration failed. Please try again.</div>';
            }

            $stmt->close();
        } else {
            echo '<div class="alert alert-danger">Please fill all fields.</div>';
        }
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
