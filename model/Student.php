<?php
require_once 'config/Database.php';

class Student {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all students
    public function getAll() {
        $result = $this->conn->query("SELECT * FROM students ORDER BY id");
        return $result;
    }

    // Create a new student
    public function create($student_id, $name, $email) {

        $query = "INSERT INTO students (student_id, name, email) VALUES ('{$student_id}', '{$name}', '{$email}')";
        
        return $this->conn->query($query); 
    }

    // Delete a student
    public function delete($id) {

        $query = "DELETE FROM students WHERE id = " . $id;

        return $this->conn->query($query); 
    }
}
?>