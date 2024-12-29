<?php
require_once __DIR__ . '/../utils/_session.php';

start_session();
session_destroy();
set_success_message("You have been logged out successfully!", "Success");
header("Location: ../../index.php");
exit();

?>