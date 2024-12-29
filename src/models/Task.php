<?php

require_once __DIR__ . '/../config/dbConnection.php';

class Task {
    // Create task
    public static function createTask($user_id, $title, $desc, $due) {
        global $conn;
        $result = mysqli_query($conn, "INSERT INTO tbl_tasks (`user_id`, `title`, `description`, `status`, `due_date`, `updated_at`) VALUES ($user_id, '$title' ,'$desc', 'Ongoing' ,'$due', NOW())");
        return $result;
    }

    // Get all task
    public static function getAllTask($id) {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM tbl_tasks WHERE `user_id` = '$id' ORDER BY status DESC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Get all task that being shared with
    public static function getAllSharedTask($share_with) {
        global $conn;
        $result = mysqli_query($conn, "SELECT tbl_tasks.*, tbl_share_task.shared_with, tbl_share_task.permissions FROM tbl_share_task INNER JOIN tbl_tasks ON tbl_share_task.task_id = tbl_tasks.id WHERE tbl_share_task.shared_with = '$share_with' ORDER BY tbl_tasks.status DESC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Get Task by ID
    public static function getTaskById($id) {
        global $conn;
        $result = mysqli_query($conn, "SELECT tbl_tasks.*, tbl_share_task.shared_with, tbl_share_task.permissions FROM tbl_tasks LEFT JOIN tbl_share_task ON tbl_tasks.id = tbl_share_task.task_id WHERE tbl_tasks.id = '$id' LIMIT 1");
        return mysqli_fetch_assoc($result);
    }

    // Change Task Status by ID
    public static function changeTaskStatus($id) {
        global $conn;
        $result = mysqli_query($conn, "UPDATE tbl_tasks SET `status` = 'Finish', `updated_at` = NOW() WHERE `id` = '$id'");
        return $result;
    }

    // Update Task
    public static function updateTask($id, $title, $desc, $status, $due) {
        global $conn;
        $result = mysqli_query($conn, "UPDATE tbl_tasks SET `title` = '$title', `description` = '$desc', `status` = '$status', `due_date` = '$due', `updated_at` = NOW() WHERE `id` = '$id'");
        return $result;
    }

    // Delete task
    public static function deleteTask($id) {
        global $conn;
        $result = mysqli_query($conn, "DELETE FROM tbl_tasks WHERE `id` = '$id'");
        return $result;
    }

    // Share permission for the task
    public static function shareTask($id, $share_with, $permission) {
        global $conn;
        $result = mysqli_query($conn, "INSERT INTO tbl_share_task (`task_id`, `shared_with`, `permissions`) VALUES ($id, $share_with , '$permission')");
        return $result;
    }

    // Edit user permission for the task
    public static function editPermissionTask($task_id, $share_id, $permission) {
        global $conn;
        $result = mysqli_query($conn, "UPDATE tbl_share_task SET `shared_with` = '$share_id', `permissions` = '$permission' WHERE  `task_id` = '$task_id'");
        return $result;
    }

    // Delete task permission
    public static function removeShare($id) {
        global $conn;
        $result = mysqli_query($conn, "DELETE FROM tbl_share_task WHERE `task_id` = '$id'");
        return $result;
    }
}
?>