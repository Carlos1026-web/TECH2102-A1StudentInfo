<?php
require_once 'config/Database.php';

class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // User registration
    public function register($username, $email, $password) {

       $query = "INSERT INTO users (username, email, password) VALUES ('{$username}', '{$email}', '{$password}')";
        
        return $this->conn->query($query);    
    }

    // User login
    public function login($email, $password) {

        $query = "SELECT * FROM users WHERE email = '{$email}'";

        $result = $this->conn->query($query);
        $user = $result->fetch_assoc();

        if ($user && $password === $user['password']) {
            return $user;
        }

        return false;
    }
}

?>