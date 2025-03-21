<?php
    // Functie: classdefinitie User 
    // Auteur: Wigmans

    class User{

        // Eigenschappen 
        public $username;
        public $email;
        private $password;
        
        function SetPassword($password){
            $this->password = $password;
        }
        function GetPassword(){
            return $this->password;
        }

        public function ShowUser() {
            echo "<br>Username: $this->username<br>";
            echo "<br>Password: $this->password<br>";
            echo "<br>Email: $this->email<br>";
        }

        public function RegisterUser(){
            $status = false;
            $errors=[];
            if($this->username != "" || $this->password != ""){

                // Check user exist
                if(true){
                    array_push($errors, "Username bestaat al.");
                } else {
                    // username opslaan in tabel login
                    $sql= "INSERT INTO `user` (`username`, `password`, `email`)
                           VALUES (:username, :password, :email);";
                    // Manier 1
                    
                    $status = true;
                }
                            
                
            }
            return $errors;
        }

        function ValidateUser(){
            $errors=[];

            if (empty($this->username)){
                array_push($errors, "Invalid username");
            } else if (empty($this->password)){
                array_push($errors, "Invalid password");
            }

            // Test username > 3 tekens en < 50 tekens
            if (strlen($username) >= 3 && strlen($username) <= 50) {
                echo "De gebruikersnaam is geldig.";
            } else {
                echo "De gebruikersnaam moet tussen de 3 en 50 tekens zijn.";
            }
            return $errors;
        }

        public function LoginUser(){

            // Connect database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "userlogin";


            try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully<br>";
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
            // Zoek user in de table user
           echo "Username:" . $this->username;


            // Indien gevonden dan sessie vullen


            return true;
        }

        // Check if the user is already logged in
        public function IsLoggedin() {
            // Check if user session has been set
            
            return false;
        }

        public function GetUser($username){
            
		    // Doe SELECT * from user WHERE username = $username
            if (false){
                //Indien gevonden eigenschappen vullen met waarden uit de SELECT
                $this->username = 'Waarde uit de database';
            } else {
                return NULL;
            }   
        }

        public function Logout(){
            session_start();
            // remove all session variables
           

            // destroy the session
            
            header('location: index.php');
        }


    }

    

?>