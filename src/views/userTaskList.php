<?php
require_once __DIR__ . '/../utils/_session.php';
require_once __DIR__ . '/../models/Task.php';

start_session();

$taskController = new Task();

$taskList = $taskController->getAllTask($_SESSION['user']);

if (empty($taskList)) {

    echo "<div class='flex items-center justify-center mt-5'>
            <p class='text-gray-700 italic text-sm'>No task yet</p>
          </div>";
} else {

    echo "<div class='flex flex-col gap-y-4 mt-5'>";

    foreach ($taskList as $task) {
        $currentDate = date('Y-m-d');

        $dueDateClass = (strtotime($task["due_date"]) < strtotime($currentDate)) ? 'text-red-500' : 'text-gray-500';

        echo "<div class='flex items-center justify-between p-4 bg-gray-100 shadow-md rounded-lg hover:bg-gray-50 transition duration-300'>";
        
        echo "<div class='flex flex-col space-y-2'>";
        echo "<p class='text-md font-semibold text-gray-800'>" . htmlspecialchars($task["title"]) . "</p>";

        if ($task['status'] === "Ongoing") { 
            echo "<p class='text-sm text-gray-600 italic'>" . htmlspecialchars($task["description"]) . "</p>";
            echo "<p class='text-sm " . $dueDateClass ." italic'>Due date: " . htmlspecialchars($task["due_date"]) . "</p>";
        }

        echo "</div>";
        
        echo "<div class='flex items-center'>";

        if ($task['status'] === "Ongoing") {

            echo "<div class='bg-yellow-300 px-4 py-2 rounded-lg flex items-center'>
                    <a href='src/controllers/changeTaskStatus.php?id=" . urlencode($task['id']) . "'> 
                        <i class='bi bi-check'></i> 
                    </a>
                    <div class='border-l border-black h-6 mx-4'></div> 
                    <a href='detail_task.php?id=" . urlencode($task['id']) . "'> 
                        <i class='bi bi-eye'></i> 
                    </a>
                  </div>";
        } else {

            echo "<div class='bg-green-300 text-white px-4 py-2 rounded-lg flex items-center'>
                    <a href='detail_task.php?id=" . urlencode($task['id']) . "'> 
                        <i class='bi bi-eye'></i> 
                    </a>
                  </div>";
        }

        echo "</div>"; 
        echo "</div>"; 
    }

    echo "</div>"; 
}
?>
