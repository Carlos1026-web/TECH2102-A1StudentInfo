<?php
include 'controller/StudentController.php';
include 'controller/UserController.php';

$action = $_GET['action'] ?? 'login';

$userController = new UserController();
$studentController = new StudentController();

switch ($action) {
    case 'register':
        $userController->register();
        break;
    case 'login':
        $userController->login();
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'dashboard':
        $studentController->index();
        break;
    case 'create_student':
        $studentController->create();
        break;
    case 'delete_student':
        $studentController->delete();
        break;
    default:
        $userController->login();
}
?>