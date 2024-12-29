<?php 

require_once __DIR__ . '/../utils/_session.php';
require_once __DIR__ . '/../models/User.php';

start_session();

$userController = new User();

$id = $_SESSION['user'];

if($id) {
	$result = $userController->delete($id);

    session_destroy();
    start_session();

	if ($result) {
		set_success_message("Your account has been deleted", "Success");
        header("location: ../../index.php");
        exit();
	} else {
		set_error_message("There has been an error in the database operation", "Error");
		header("location: ../../index.php");
		exit();
	}
} 

?>