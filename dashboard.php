<?php

require_once __DIR__ . '/src/partials/head.php';
require_once __DIR__ . '/src/utils/_session.php';
require_once __DIR__ . '/src/controllers/readUser.php';
require_once __DIR__ . '/src/controllers/createTask.php';

check_login();

$message = get_success_message();
$errMessage = get_error_message();

?>

<header class="bg-white">
	<div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
		<div class="flex flex-col items-start gap-4 md:flex-row md:items-center md:justify-between">
			<div>
				<h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Task Dashboard</h1>
				<p class="mt-1.5 text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure, recusandae.</p>
			</div>

			<div class="flex items-center gap-4">
				<button class="inline-block rounded border border-gray-200 bg-white px-5 py-3 text-gray-900 transition text-sm font-medium hover:text-gray-700 focus:outline-none focus:ring" type="button" data-target="profileInfo"><i class="bi bi-person-circle mr-2"></i> View Profile</button>
				<a href="src/controllers/logout.php" class="inline-block rounded border border-gray-200 bg-white px-5 py-3 text-gray-900 transition text-sm font-medium hover:text-gray-700 focus:outline-none focus:ring"><i class="bi bi-box-arrow-right mr-2"></i> Sign Out</a>
			</div>
		</div>
	</div>
</header>

<main class="bg-white">
	<div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
		<div class="flex flex-col items-start gap-4 md:flex-row md:items-stretch md:justify-between">
			<section class="p-6 border shadow-lg rounded-lg w-full">
				<div class="flex justify-between items-center">
					<h2 class="text-xl font-bold">Your task</h2>
					<button class="rounded border border-gray-200 bg-white px-5 py-2 text-gray-900 transition text-sm font-medium hover:text-gray-700 focus:outline-none focus:ring" type="button" data-target="taskForm">Create a task</button>
				</div>
				<?php
				require_once __DIR__ . '/src/views/userTaskList.php';
				?>
			</section>
			<section class="p-6 border shadow-lg rounded-lg w-full">
				<div class="flex justify-between items-center py-2">
					<h2 class="text-xl font-bold">Shared task with you</h2>
				</div>
				<?php
				require_once __DIR__ . '/src/views/sharedTaskList.php';
				?>
			</section>
		</div>
	</div>
</main>

<?php
require_once __DIR__ . '/src/views/showProfile.php';
require_once __DIR__ . '/src/views/taskForm.php';
?>

<footer class="container-xl">
	<p class="text-center text-sm text-slate-400">Made by Perahim Tara</p>
</footer>

<?php 
require_once __DIR__ . '/src/utils/_message.php';

if ($message) {
    display_success($message['message'], $message['title']);
}

if ($errMessage) {
    display_errors($errMessage['message'], $errMessage['title']);
}

require_once __DIR__ . '/src/partials/script.php';
?>