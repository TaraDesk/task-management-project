<?php

$currentScript = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$isDetailsPage = $currentScript == 'detail_task.php';
$modalTitle = $isDetailsPage ? 'Edit your Task' : 'Create a Task';
$submitName = $isDetailsPage ? 'edit' : 'create';
$submitLabel = $isDetailsPage ? 'Edit' : 'Create';

$is_shared = (is_null($taskDetail['shared_with']) ? "No" : "Yes");
?>

<!-- Create Task Form -->
<div class="relative z-10 hidden opacity-0" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="taskForm">
	<div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
	<div class="fixed inset-0 z-10 w-screen overflow-y-auto">
	    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
	    	<div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
	        	<form class="flex flex-col gap-y-6 p-6 sm:mt-0 sm:text-left bg-white rounded-lg shadow-lg" method="post">
					<h3 class="text-lg font-semibold text-gray-900" id="modal-title"><?php echo $modalTitle; ?></h3>

				  	<div class="flex flex-col gap-y-8">
				  		<div>
					  		<label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">Title</label>
	                    	<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" type="text" name="title" placeholder="Task Title" value="<?php echo isset($taskDetail['title']) ? $taskDetail['title'] : ''; ?>" required>
				  		</div>
				  		<div>
					    	<label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">Description</label>
	                   		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" type="text" name="desc" placeholder="Task Description" value="<?php echo isset($taskDetail['description']) ? $taskDetail['description'] : ''; ?>" required>
				  		</div>
                   		<div>
	                   		<label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="due_date">Date due</label>
	                   		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="due_date" type="date" name="due_date" value="<?php echo isset($taskDetail['due_date']) ? $taskDetail['due_date'] : ''; ?>" required>
                   		</div>
                   		<?php if ($isDetailsPage): ?>
					    <div>
					        <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">Status</label>
					        <select name="status" class="block w-full bg-gray-200 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
								<option value="Ongoing" <?php echo $taskDetail['status'] == "Ongoing" ? 'selected' : ''; ?>>Ongoing</option>
								<option value="Finish" <?php echo $taskDetail['status'] == "Finish" ? 'selected' : ''; ?>>Finish</option>
							</select>
					    </div>
						<?php endif; ?>
                   		<div>
	                   		<label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="is_shared">Is Shared?</label>
	                   		<div class="flex items-center space-x-4">
							    <label class="inline-flex items-center">
							      <input class="peer hidden" type="radio" name="shared_status" value="yes" id="shared-yes" onclick="toggleHiddenElement(true)" <?php echo $is_shared == "Yes" ? 'checked' : '';?>/>
							      <div class="cursor-pointer rounded-xl border border-gray-300 px-4 py-2 text-gray-700 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 transition duration-200">
							        Yes
							      </div>
							    </label>

							    <label class="inline-flex items-center">
							      <input class="peer hidden" type="radio" name="shared_status" value="no" id="shared-no" onclick="toggleHiddenElement(false)" <?php echo $is_shared == "No" ? 'checked' : '';?>/>
							      <div class="cursor-pointer rounded-xl border border-gray-300 px-4 py-2 text-gray-700 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 transition duration-200">
							        No
							      </div>
							    </label>
							</div>
                   		</div>
                   		<div class="<?php echo $is_shared == 'No' ? 'hidden' : ''; ?>" id="share_with">
					  		<label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="share_email">
							  Share Task With (Email)
							</label>
							<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 mb-8" id="share_email" type="email" name="share_email" placeholder="Enter your friend's or colleague's email" value="<?php echo isset($taskDetail['shared_with']) ? $shareInfo["email"] : ''; ?>"/>

							<label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="permission">
							  Permission
							</label>
							<select name="permission" class="block w-full bg-gray-200 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
								<option value="View" <?php echo $taskDetail['permissions'] == "View" ? 'selected' : ''; ?>>View</option>
								<option value="Edit" <?php echo $taskDetail['permissions'] == "Edit" ? 'selected' : ''; ?>>Edit</option>
							</select>
				  		</div>
				  	</div>

				  	<div class="mt-4 flex flex-col gap-y-4 sm:flex-row sm:justify-end sm:gap-x-4">
				    	<button class="inline-flex justify-center rounded-md bg-gray-400 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-gray-500 sm:w-auto" data-target="taskForm" type="button">Cancel</button>
				    	<button class="inline-flex justify-center rounded-md bg-indigo-400 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-indigo-500 sm:w-auto" type="submit" name="<?php echo $submitName; ?>"><?php echo $submitLabel; ?></button>
				  	</div>
				</form>
	      	</div>
	    </div>
	</div>
</div>