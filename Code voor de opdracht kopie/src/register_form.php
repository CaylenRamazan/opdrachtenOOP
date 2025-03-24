<?php

require_once "../vendor/autoload.php";
use login\classes\User;

//require_once 'config.php';
//require_once 'classes/User.php';

$errors = [];

if (isset($_POST['register-btn'])) {
    $user = new User($PDO);
    $user->username = $_POST['username'];
    $user->email = $_POST['email'];
    $user->SetPassword($_POST['password']);

    $errors = $user->ValidateUser();

    if (empty($errors)) {
        $result = $user->RegisterUser();
        if ($result === true) {
            echo "<script>alert('Registratie geslaagd!'); window.location='login_form.php';</script>";
        } else {
            $errors = $result;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Registreren</title>
</head>
<body>
    <h3>Registreren</h3>
    <form method="POST">
        <label>Gebruikersnaam</label>
        <input type="text" name="username" required>
        <br>
        <label>Email</label>
        <input type="email" name="email" required>
        <br>
        <label>Wachtwoord</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="register-btn">Registreer</button>
    </form>
    <a href="login_form.php">Terug naar inloggen</a>

    <?php if (!empty($errors)): ?>
        <script>
            alert("<?php echo implode("\\n", $errors); ?>");
        </script>
    <?php endif; ?>
</body>
</html>
