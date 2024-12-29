<?php
function start_session() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

// Set success message
function set_success_message($message, $title) {
    start_session();
    $_SESSION['success_message'] = [
        "message" => $message,
        "title" => $title,
    ];
}

function get_success_message() {
    start_session();
    if (isset($_SESSION['success_message'])) {
        $message = $_SESSION['success_message'];
        unset($_SESSION['success_message']);
        return $message;
    }
    return null;
}

// Set error message
function set_error_message($message, $title) {
    start_session();
    $_SESSION['error_message'] = [
        "message" => $message,
        "title" => $title,
    ];
}

function get_error_message() {
    start_session();
    if (isset($_SESSION['error_message'])) {
        $message = $_SESSION['error_message'];
        unset($_SESSION['error_message']);
        return $message;
    }
    return null;
}

function set_login_info($id) {
    start_session();
    $_SESSION['is_login'] = true;
    $_SESSION['user'] = $id;
}

function check_login() {
    start_session();
    if(!$_SESSION["is_login"]) {
        set_error_message("Please login first", "Login!");
        header("Location: index.php");
        exit();
    }
}
?>
