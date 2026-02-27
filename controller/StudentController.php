<?php
require_once 'config/Database.php';
require_once 'model/Student.php';

// session_start();

class StudentController {
     private $student;

    public function __construct() {
        $database = new Database();
        $db= $database->connect();
        $this->student = new Student($db);
    }

    // Check if user is logged in
    private function checkLogin() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit();
        }
    }

    // Display all students
    public function index() {
        $this->checkLogin();
        $students = $this->student->getAll();
        require "view/index.php";
    }

    // Create a new student
    public function create() {
        $this->checkLogin();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->student->create(
                $_POST['student_id'],
                $_POST['name'],
                $_POST['email']
            );

            header("Location: index.php?action=dashboard");
            exit();
        }
    }

    // Delete a student
    public function delete() {
        $this->checkLogin();

        if (isset($_GET['id'])) {
            $this->student->delete($_GET['id']);

            header("Location: index.php?action=dashboard");
            exit();
        }
    }
}
?>