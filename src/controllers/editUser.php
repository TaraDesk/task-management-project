<?php 
require_once __DIR__ . '/../utils/_session.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Validator.php';

$userController = new User();
$validator = new Validator();

if (isset($_POST['update'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $duplicateEmail = $validator->isAvailEmail($email, $userInfo['email']);

    if (!$duplicateEmail) {
        set_error_message("The email is already registered. Please use another email.", "Error");

        // Refresh the page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $result = $userController->update($userInfo['id'], $username, $email);

        if($result) {
            set_success_message("Your profile has been edit", "Success");
        } else {
            set_error_message("There has been an error in the database operation", "Error");
        }
    }  

    // Refresh the page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

?>