<?php 
require_once __DIR__ . '/../config/dbConnection.php';
require_once __DIR__ . '/../utils/_session.php';
require_once __DIR__ . '/../models/Task.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Validator.php';

$taskController = new Task();
$userController = new User();
$validator = new Validator();

function redirectToTask($taskId) {
    header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . urlencode($taskId));
    exit();
}

if (isset($_POST['edit'])) {
    $taskId = $_GET['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['desc']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $dueDate = mysqli_real_escape_string($conn, $_POST['due_date']);
    $isShared = mysqli_real_escape_string($conn, $_POST['shared_status']);
    $previousIsShared = (is_null($taskDetail['shared_with']) ? "No" : "Yes");

    $editResult = $taskController->updateTask($taskId, $title, $description, $status, $dueDate);

    if ($editResult) {
        $shareEmail = mysqli_real_escape_string($conn, $_POST['share_email']);
        $permission = mysqli_real_escape_string($conn, $_POST['permission']);

        if ($previousIsShared === "No" && $isShared === "yes") {
            
            $emailExists = $validator->isMatchEmail($shareEmail);
            if (!$emailExists) {
                set_error_message("The email doesn't exist in our database. Please use a valid email.", "Error");
                redirectToTask($taskId);
            }

            $shareProfile = $userController->getByEmail($shareEmail);
            $shareId = $shareProfile['id'];

            $shareResult = $taskController->shareTask($taskId, $shareId, $permission);

            if (!$shareResult) {
                set_error_message("Edit task succeeded, but sharing failed due to a database error.", "Error");
                redirectToTask($taskId);
            }
            
        } elseif ($previousIsShared === "Yes" && $isShared === "no") {

            $removeAccess = $taskController->removeShare($taskId);

            if (!$removeAccess) {
                set_error_message("Edit task succeeded, but remove sharing access failed due to a database error.", "Error");
                redirectToTask($taskId);
            }

        } elseif ($previousIsShared === "Yes" && $isShared === "no") {

            $sharedUserId = $taskDetail["shared_with"];

            if ($shareInfo["email"] !== $shareEmail) {
                $emailExists = $validator->isMatchEmail($shareEmail);
                
                if (!$emailExists) {
                    set_error_message("The email doesn't exist in our database. Please use a valid email.", "Error");
                    redirectToTask($taskId);
                }

                $shareProfile = $userController->getByEmail($shareEmail);
                $sharedUserId = $shareProfile['id'];
            } 

            $shareResult = $taskController->editPermissionTask($taskId, $sharedUserId, $permission);

            if (!$shareResult) {
                set_error_message("Edit task succeeded, but sharing failed due to a database error.", "Error");
                redirectToTask($taskId);                
            }
        }

        set_success_message("Edit task successfully!", "Congratulations!");
    } else {
        set_error_message("Task Edit failed due to a database error.", "Error");
    }

    // Refresh the page
    redirectToTask($taskId);
}

?>
