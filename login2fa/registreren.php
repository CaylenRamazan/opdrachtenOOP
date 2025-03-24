<?php
session_start();

// Database verbinding
$dsn = 'mysql:host=localhost;dbname=2fa_demo;charset=utf8';
$user = 'root';
$pass = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $user, $pass, $options);

// Google Authenticator library includen
require_once 'GoogleAuthenticator.php';

use PHPGangsta\GoogleAuthenticator;

$ga = new GoogleAuthenticator();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $secret = $ga->createSecret();

    // Opslaan in de database
    $stmt = $pdo->prepare("INSERT INTO users (username, password, 2fa_secret) VALUES (?, ?, ?)");
    $stmt->execute([$username, $password, $secret]);

    // QR-code genereren
    $qrCodeUrl = $ga->getQRCodeGoogleUrl('TCRHELDEN', $secret);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registreren met 2FA</title>
</head>
<body>
<h1>Registreren</h1>
<form method="POST">
    <label>Username:</label>
    <input type="text" name="username" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Registreren</button>
</form>

<?php if (isset($qrCodeUrl)): ?>
    <h3>Registratie succesvol! Scan deze QR code met Google Authenticator:</h3>
    <img src="<?php echo $qrCodeUrl; ?>" alt="QR Code"><br>
    <p>Sla de geheime sleutel op: <?php echo $secret; ?></p>
    <a href="login.php">Login</a>
<?php endif; ?>
</body>
</html>



