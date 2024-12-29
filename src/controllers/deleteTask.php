<?php 

require_once __DIR__ . '/../utils/_session.php';
require_once __DIR__ . '/../models/Task.php';

$taskController = new Task();

$id = $_GET['id'];

if($id) {
	$result = $taskController->deleteTask($id);

	if ($result) {

		$removeShare = $taskController->removeShare($id);

		if ($removeShare) {
			set_success_message("Your Task has been deleted", "Success");
		} else {
			set_error_message("There has been an error in the database operation", "Error");
		}
	} else {
		set_error_message("There has been an error in the database operation", "Error");
	}

	header("location: ../../dashboard.php");
	exit();
} 

?>