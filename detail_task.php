<?php

require_once __DIR__ . '/src/partials/head.php';
require_once __DIR__ . '/src/utils/_session.php';
require_once __DIR__ . '/src/controllers/readTask.php';

start_session();
check_login();

$message = get_success_message();
$errMessage = get_error_message();

$is_shared = (is_null($taskDetail['shared_with']) ? "No" : "Yes");

$currentDate = date('Y-m-d');
$dueDateClass = (strtotime($taskDetail["due_date"]) < strtotime($currentDate)) ? 'text-red-400' : 'text-gray-700';

require_once __DIR__ . '/src/controllers/editTask.php';
?>

<header class="bg-white">
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
      <div class="flex flex-col items-start gap-4 md:flex-row md:items-center md:justify-between">
          <div>
            <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Task Management</h1>
          </div>
          <a href="dashboard.php" class="inline-block rounded border border-gray-200 bg-white px-5 py-3 text-gray-900 transition text-sm font-medium hover:text-gray-700 focus:outline-none focus:ring"><i class="bi bi-arrow-left mr-2"></i> Go Back</a>
      </div>
    </div>
</header>

<main class="bg-white">
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="flex flex-col items-start md:flex-row md:items-stretch md:justify-between">
      <section class="p-6 border shadow-lg rounded-lg w-full">
        <div class="flex justify-between items-center">
          <div class="flex gap-x-4 items-end">
            <h2 class="text-xl font-bold">Task Details</h2>
          </div>
          <?php if ($taskDetail['user_id'] == $_SESSION['user'] || $taskDetail['permissions'] == "Edit") : ?>
          <div class="flex items-center gap-4">
            <button class="inline-block rounded border border-gray-200 bg-white px-5 py-3 text-gray-900 transition text-sm font-medium hover:text-gray-700 focus:outline-none focus:ring" type="button" data-target="taskForm"><i class="bi bi-pencil mr-2"></i> Edit Task</button>
            <a href="src/controllers/deleteTask.php?id=<?php echo urlencode($taskDetail['id']); ?>" class="inline-block rounded border border-gray-200 bg-white px-5 py-3 text-gray-900 transition text-sm font-medium hover:text-gray-700 focus:outline-none focus:ring"><i class="bi bi-trash mr-2"></i> Delete Task</a>
          </div>
          <?php endif; ?>
        </div>
        <div class="flex justify-center mt-8">
          <div class="w-3/6 flex flex-col gap-y-6">
            <div>
              <h3 class="text-md mb-1">Owner</h3>
              <p class="text-sm text-gray-700"><?php echo $ownerInfo['username']; ?></p>
            </div>

            <div>
              <h3 class="text-md mb-1">Task Title</h3>
              <p class="text-sm text-gray-700"><?php echo $taskDetail["title"]; ?></p>
            </div>

            <div>
              <h3 class="text-md mb-1">Task Description</h3>
              <p class="text-sm text-gray-700"><?php echo $taskDetail["description"]; ?></p>
            </div>

            <div>
              <h3 class="text-md mb-1">Task Status</h3>
              <p class="text-sm text-gray-700"><?php echo $taskDetail["status"]; ?></p>
            </div>
          </div>
          <div class="w-3/6 flex flex-col gap-y-6">
            <div>
              <h3 class="text-md mb-1">Due Date</h3>
              <p class="text-sm <?php echo $dueDateClass; ?>"><?php echo $taskDetail["due_date"]; ?></p>
            </div>

            <div>
              <h3 class="text-md mb-1">Is Shared?</h3>
              <p class="text-sm text-gray-700"><?php echo $is_shared; ?></p>
            </div>

            <?php if ($is_shared == "Yes"): ?>
            <div>
                <h3 class="text-md mb-1">Shared with</h3>
                <p class="text-sm text-gray-700"><?php echo $shareInfo["email"]; ?></p>
            </div>

            <div>
                <h3 class="text-md mb-1">Permissions</h3>
                <p class="text-sm text-gray-700"><?php echo $taskDetail["permissions"]; ?></p>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </section>
    </div>
  </div>
</main>

<footer class="container-xl">
  <p class="text-center text-sm text-slate-400">Made by Perahim Tara</p>
</footer>

<?php 
require_once __DIR__ . '/src/views/taskForm.php';
require_once __DIR__ . '/src/utils/_message.php';

if ($message) {
    display_success($message['message'], $message['title']);
}

if ($errMessage) {
    display_errors($errMessage['message'], $errMessage['title']);
}

require_once __DIR__ . '/src/partials/script.php';
?>