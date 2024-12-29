<?php

require_once __DIR__ . '/../config/dbConnection.php';

class Validator {
	// Check Duplicate Email
    public static function isDuplicateEmail($email) {
        global $conn;
        $result = mysqli_query($conn, "SELECT COUNT(*) AS count FROM tbl_users WHERE email = '$email'");
        $check_result = mysqli_fetch_assoc($result);
        if ($check_result['count'] > 0) {
        	return true;
        } else {
        	return false;
        }
    }

    // Check if the Email match the database
    public static function isMatchEmail($email) {
        global $conn;
        $result = mysqli_query($conn, "SELECT email FROM tbl_users");

        while ($check_result = mysqli_fetch_assoc($result)) {
            if ($check_result['email'] == $email) {
                return true;
            }
        }
        
        return false;    
    }

    // Check if the new email is a duplicate
    public static function isAvailEmail($email, $current_email) {
        global $conn;

        if($email === $current_email) {
            return true;
        }
        
        $result = mysqli_query($conn, "SELECT COUNT(*) AS count FROM tbl_users WHERE email = '$email'");
        $check_result = mysqli_fetch_assoc($result);
        if ($check_result['count'] > 0) {
            return false;
        } else {
            return true;
        }
    }
}
?>
