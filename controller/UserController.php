<?php
require_once 'config/Database.php';
require_once 'model/User.php';

session_start();

class UserController {
    private $user;

    public function __construct() {
        $database = new Database();
        $db= $database->connect();
        $this->user = new User($db);
    }

    // User registration
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->user->register(
                $_POST['username'],
                $_POST['email'],
                $_POST['password']
            );

            header("Location: index.php?action=login");
            exit();
        }

        require "view/Register.php";
    }

    // User login
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $user = $this->user->login(
                $_POST['email'],
                $_POST['password']
            );

            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php?action=dashboard");
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        }

        require "view/Login.php";
    }

    // User logout
    public function logout() {
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}
?>