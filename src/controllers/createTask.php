<?php 
require_once __DIR__ . '/../config/dbConnection.php';
require_once __DIR__ . '/../utils/_session.php';
require_once __DIR__ . '/../models/Task.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Validator.php';

start_session();

$taskController = new Task();
$userController = new User();
$validator = new Validator();

if (isset($_POST['create'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $date = mysqli_real_escape_string($conn, $_POST['due_date']);
    $isShare = mysqli_real_escape_string($conn, $_POST['shared_status']);

    $createResult = $taskController->createTask($_SESSION['user'], $title, $desc, $date);

    if ($createResult) {
        $taskId = mysqli_insert_id($conn);

        if ($isShare === "yes") {
            $shareEmail = mysqli_real_escape_string($conn, $_POST['share_email']);
            $permission = mysqli_real_escape_string($conn, $_POST['permission']);

            $availEmail = $validator->isMatchEmail($shareEmail);
            if (!$availEmail) {
                set_error_message("The email doesn't exist in our database. Please use a valid email.", "Error");

                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }

            $shareProfile = $userController->getByEmail($shareEmail);
            $shareId = $shareProfile['id'];

            $shareResult = $taskController->shareTask($taskId, $shareId, $permission);

            if (!$shareResult) {
                set_error_message("Task creation succeeded, but sharing failed due to a database error.", "Error");

                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        }

        set_success_message("Task created successfully!", "Congratulations!");
    } else {
        set_error_message("Task creation failed due to a database error.", "Error");
    }

    // Refresh the page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

?>