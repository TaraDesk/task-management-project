<?php 
require_once __DIR__ . '/../models/Task.php';
require_once __DIR__ . '/../models/User.php';

$taskController = new Task();
$userController = new User();

$taskDetail = $taskController->getTaskById($_GET['id']);
$ownerInfo = $userController->getById($taskDetail['user_id']);
$shareInfo = [];

if (!is_null($taskDetail['shared_with'])) {
    $shareInfo = $userController->getById($taskDetail["shared_with"]);
}
?>