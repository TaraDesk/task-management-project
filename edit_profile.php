<?php

require_once __DIR__ . '/src/partials/head.php';
require_once __DIR__ . '/src/utils/_session.php';
require_once __DIR__ . '/src/controllers/readUser.php';
require_once __DIR__ . '/src/controllers/editUser.php';

check_login();

$message = get_success_message();
$errMessage = get_error_message();

?>

<header class="bg-white">
		<div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
		<div class="flex flex-col items-start gap-4 md:flex-row md:items-center md:justify-between">
  			<div>
    			<h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Profile Account</h1>
				<p class="mt-1.5 text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure, recusandae.</p>
  			</div>
		</div>
		</div>
</header>

<main class="bg-white">
	<div class="mx-10 px-4 py-8 sm:px-6 lg:px-8">
		<div class="flex flex-col items-start md:flex-row md:items-stretch md:justify-between">
			<section class="p-6 border shadow-lg rounded-lg w-3/6">
				<div class="flex justify-between items-center">
					<h2 class="text-xl font-bold">Edit Your Profile</h2>
				</div>
				<div class="flex items-center justify-center mt-8">
					<form class="w-full flex flex-col gap-y-8" method="post">
			            <div class="flex flex-wrap -mx-3">
			                <div class="w-full px-3">
			                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">Email</label>
			                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="text" name="email" placeholder="Your email here" required value="<?php echo $userInfo['email']; ?>">
			                </div>
			            </div>
			            <div class="flex flex-wrap -mx-3">
			                <div class="w-full px-3">
			                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-username">Username</label>
			                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-username" type="text" name="username" placeholder="Your username here" required value="<?php echo $userInfo['username']; ?>">
			                </div>
			            </div>
			            <hr class="bg-slate-200">
			            <div class="flex items-center gap-x-6">
				           <a href="dashboard.php" class="w-1/6 text-center border border-gray-400 bg-white text-sm text-gray-900 hover:text-gray-700 p-2 rounded">Cancel</a>
				           <button class="w-1/6 text-center bg-teal-400 hover:bg-teal-600 text-sm text-white p-2 rounded" type="submit" name="update">Update</button>
			            </div>
			        </form>
				</div>
			</section>
		</div>
	</div>
</main>

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