<?php
require_once __DIR__ . '/../utils/_session.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Validator.php';

$userController = new User();
$validator = new Validator();

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['reg_username']);
    $email = mysqli_real_escape_string($conn, $_POST['reg_email']);
    $password = $_POST['reg_password'];
    $confirmPass = $_POST['password_conf'];

    $duplicateEmail = $validator->isDuplicateEmail($email);

    if ($duplicateEmail) {
        set_error_message("The email is already registered. Please use another email.", "Error");

        // Refresh the page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if ($password === $confirmPass) {
        $result = $userController->create($username, $email, md5($password));
        if ($result) {
            set_success_message("Your account has been created", "Congratulations!");
        } else {
            set_error_message("There has been an error in the database operation", "Error");
        }
    } else {
        set_error_message("Your password does not match with your confirmation password", "Error");
    }

    // Refresh the page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $result = $userController->getByCredential($email, $password);

    if($result) {
        set_login_info($result["id"]);
        header("Location: dashboard.php");
        exit();
    } else {
        set_error_message("Your email and password does not match with the database", "Error");

        // Refresh the page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

?>
