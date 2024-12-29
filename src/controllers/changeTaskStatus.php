<?php 
require_once __DIR__ . '/../models/Task.php';
require_once __DIR__ . '/../utils/_session.php';

$id = $_GET['id'];

$taskController = new Task();

$result = $taskController->changeTaskStatus($id);

if (!$result) {
	set_error_message("Task status change failed due to a database error.", "Error");
}

header("Location: ../../dashboard.php");
exit();
?>