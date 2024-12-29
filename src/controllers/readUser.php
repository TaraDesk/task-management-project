<?php 
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../utils/_session.php';

start_session();

$userController = new User();

$userInfo = $userController->getById($_SESSION['user']);

?>