<?php

require_once __DIR__ . '/../config/dbConnection.php';

class User {
    // Create User
    public static function create($username, $email, $password) {
        global $conn;
        $result = mysqli_query($conn, "INSERT INTO tbl_users (`username`, `email`, `password`, `updated_at`) VALUES ('$username', '$email', '$password', NOW())");
        return $result;
    }

    // Get all users
    public static function getAll() {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM tbl_users");
        return mysqli_fetch_assoc($result);
    }

    // Get user by Email and Password
    public static function getByCredential($email, $password) {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE `email` = '$email' AND `password` = '$password' LIMIT 1");
        return mysqli_fetch_assoc($result);
    }

    // Get user by Email
    public static function getByEmail($email) {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE `email` = '$email' LIMIT 1");
        return mysqli_fetch_assoc($result);
    }

    // Get user by ID
    public static function getById($id) {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE `id` = '$id' LIMIT 1");
        return mysqli_fetch_assoc($result);
    }

    // Update user
    public static function update($id, $username, $email) {
        global $conn;
        $result = mysqli_query($conn, "UPDATE tbl_users SET `username` = '$username', `email` = '$email', `updated_at` = NOW() WHERE `id` = '$id'");
        return $result;
    }

    // Delete user
    public static function delete($id) {
        global $conn;
        $result = mysqli_query($conn, "DELETE FROM tbl_users WHERE `id` = '$id'");
        return $result;
    }
}
?>
