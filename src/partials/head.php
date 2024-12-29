<?php
$currentScript = basename($_SERVER['SCRIPT_NAME']);

$titleList = [
  "index.php" => "Authentication | Task Management System",
  "dashboard.php" => "Dashboard | Task Management System",
  "detail_task.php" => "Task Details | Task Management System",
  "edit_profile.php" => "Edit Profile | Task Management System",
];

$title = isset($titleList[$currentScript]) ? $titleList[$currentScript] : "Default Title | Task Management System";

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>

	<!-- Tailwind CDN -->
	<script src="https://cdn.tailwindcss.com"></script>
	<!-- Sweet Alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- Bootstrap Icon -->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  	
</head>
<body>