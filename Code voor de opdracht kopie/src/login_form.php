<?php

require_once "../vendor/autoload.php";
use login\classes\User;

session_start(); // Start the session to manage user sessions

// Is the login button clicked?
if (isset($_POST['login-btn'])) {

    require_once('classes/User.php');
    $user = new User($PDO); // Passing the $pdo connection to the User class

    // Set the username and password from POST data
    $user->username = $_POST['username'];
    $password = $_POST['password']; // This will be checked against the hashed password in the database

    // Validating the user inputs
    $errors = $user->ValidateLogin();

    // If no validation errors, attempt login
    if (count($errors) == 0) {
        if ($user->LoginUser()) {
            echo "Login goed";
            // Redirect the user to the dashboard or homepage
            header("Location: index.php");
            exit(); // Ensure the script stops executing after the redirect
        } else {
            // Login failed (invalid username/password)
            $errors[] = "Login fout: ongeldige username of password.";
            echo "Login failed!";
        }
    }

    // If there are validation errors, display them
    if (count($errors) > 0) {
        $message = "";
        foreach ($errors as $error) {
            $message .= $error . "\\n"; // Collect all errors to display in the alert
        }

        // Show the errors in an alert box and redirect back to the login form
        echo "
        <script>alert('" . $message . "')</script>
        <script>window.location = 'login_form.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h3>PHP - PDO Login and Registration</h3>
    <hr/>

    <form action="" method="POST">
        <h4>Login here...</h4>
        <hr>

        <label>Username</label>
        <input type="text" name="username" required />
        <br>

        <label>Password</label>
        <input type="password" name="password" required />
        <br>

        <button type="submit" name="login-btn">Login</button>
        <br>

        <a href="register_form.php">Register</a>
    </form>

</body>
</html>
