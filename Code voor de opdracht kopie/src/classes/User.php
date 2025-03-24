<?php
namespace login\Classes;
use PDO;
use PDOException;
require_once 'config.php';

class User
{
    public $username;
    public $email;
    private $password;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Wachtwoord instellen
    public function SetPassword($password)
    {
        $this->password = $password;
    }

    // Wachtwoord ophalen
    public function GetPassword()
    {
        return $this->password;
    }

    // Gebruikersvalidatie bij registratie
    public function ValidateUser()
    {
        $errors = [];

        if (empty($this->username) || strlen($this->username) < 3 || strlen($this->username) > 50) {
            $errors[] = "Gebruikersnaam moet tussen de 3 en 50 tekens zijn.";
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Ongeldig e-mailadres.";
        }

        if (empty($this->password) || strlen($this->password) < 6) {
            $errors[] = "Wachtwoord moet minimaal 6 tekens lang zijn.";
        }

        return $errors;
    }

    // Registreren van een nieuwe gebruiker
    public function RegisterUser()
    {
        $errors = [];

        // Controleren of de gebruiker al bestaat
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = :username OR email = :email");
        $stmt->execute(['username' => $this->username, 'email' => $this->email]);

        if ($stmt->rowCount() > 0) {
            $errors[] = "Gebruikersnaam of e-mail bestaat al.";
            return $errors;
        }

        // Gebruiker opslaan in database
        $stmt = $this->pdo->prepare("INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");
        if ($stmt->execute([
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password
        ])) {
            return true;
        } else {
            $errors[] = "Registratie mislukt.";
            return $errors;
        }
    }

    // Validatie van login gegevens
    public function ValidateLogin()
    {
        $errors = [];

        if (empty($this->username) || empty($this->password)) {
            $errors[] = "Gebruikersnaam en wachtwoord zijn verplicht.";
        }

        return $errors;
    }

    // Inloggen van een gebruiker
    public function LoginUser()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->execute(['username' => $this->username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['username'] = $user['username'];
            return true;
        } else {
            return false;
        }
    }

    // Controleren of een gebruiker is ingelogd
    public function IsLoggedIn()
    {
        return isset($_SESSION['username']);
    }

    // Gebruikersgegevens ophalen
    public function GetUser($username)
    {
        $stmt = $this->pdo->prepare("SELECT username, email FROM user WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Gebruiker tonen
    public function ShowUser()
    {
        echo "<br>Gebruikersnaam: " . htmlspecialchars($this->username);
        echo "<br>Email: " . htmlspecialchars($this->email);
    }

    // Uitloggen
    public function Logout()
    {
        session_destroy();
        header("Location: login_form.php");
        exit();
    }
}

?>
