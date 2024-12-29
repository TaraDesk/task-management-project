<?php 

require_once __DIR__ . '/src/partials/head.php';
require_once __DIR__ . '/src/controllers/auth.php';
require_once __DIR__ . '/src/utils/_session.php';

$message = get_success_message();
$errMessage = get_error_message();

?>

<div class="w-screen h-screen flex justify-center items-center flex-col bg-slate-200">
    <div class="w-3/6 p-8 flex flex-col gap-y-6 border rounded-lg shadow-lg bg-white" id="login">
    	<div class="flex flex-col gap-y-2">
	        <h2 class="text-2xl font-bold">Welcome to Task Management System</h2>
	        <p>Login to Explore Your Dashboard</p>
    	</div>

    	<hr class="bg-slate-200">

        <form class="w-full flex flex-col gap-y-6" method="post">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">Email</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="text" name="email" placeholder="Your email here" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">Password</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" name="password" placeholder="Your password here" required>
                </div>
            </div>

            <hr class="bg-slate-200">

            <div class="flex flex-col justify-center items-center gap-y-1">
	           <button class="w-full flex-shrink-0 bg-teal-400 hover:bg-teal-600 text-sm text-white p-2 rounded" type="submit" name="login">Login</button>
	           <p class="flex-shrink-0 text-sm p-2">
				  Don't have an account? 
				  <button onclick="switchForms('login', 'register')" type="button" class="text-teal-400 hover:text-teal-700" aria-label="Create an account">Create now</button>
				</p>
            </div>
        </form>
	</div>

	<div class="w-3/6 py-4 px-8 flex flex-col gap-y-6 border rounded-lg shadow-lg bg-white hidden" id="register">
    	<div class="flex flex-col gap-y-2">
	        <h2 class="text-2xl font-bold">Create an Account</h2>
	        <p>Create Your Profile and Get Started</p>
    	</div>

    	<hr class="bg-slate-200">

        <form class="w-full flex flex-col gap-y-6" method="post">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">Email</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="text" name="reg_email" placeholder="Your email here" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-username">Username</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-username" type="text" name="reg_username" placeholder="Your username here" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
            	<div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">Password</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" name="reg_password" placeholder="Your password here" required>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">Confirm your Password</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" name="password_conf" placeholder="Your password here" required>
                </div>
            </div>

            <hr class="bg-slate-200">

            <div class="flex flex-col justify-center items-center gap-y-1">
	           <button class="w-full flex-shrink-0 bg-teal-400 hover:bg-teal-600 text-sm text-white p-2 rounded" type="submit" name="register">Create</button>
	           <p class="flex-shrink-0 text-sm p-2">Already have an account? <button onclick="switchForms('register', 'login')" type="button" class="text-teal-400 hover:text-teal-700">Log in</button></p>
            </div>
        </form>
	</div>

	<footer class="container-xl mt-3">
		<p class="text-center text-sm text-slate-400">Made by Perahim Tara</p>
	</footer>
</div>

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
