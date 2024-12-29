<!-- Profile Modal -->
<div class="relative z-10 hidden opacity-0" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="profileInfo">
	<div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
	<div class="fixed inset-0 z-10 w-screen overflow-y-auto">
	    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
	    	<div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
	        	<div class="flex flex-col gap-y-6 p-6 sm:mt-0 sm:text-left bg-white rounded-lg shadow-lg">
				  	<!-- Header Section -->
				  	<div class="flex justify-between items-center">
				    	<h3 class="text-lg font-semibold text-gray-900" id="modal-title">Your Account Profile</h3>
				    	<button data-target="profileInfo" type="button" class="hover:text-gray-700">
				      		<svg width="20" height="20" viewBox="0 0 40 40" class="text-gray-600 pointer-events-none">
				        		<path d="M 10,10 L 30,30 M 30,10 L 10,30" stroke="currentColor" stroke-width="4" />
				      		</svg>
				    	</button>
				  	</div>

				  	<!-- Info Section -->
				  	<div class="flex flex-col gap-y-4">
				    	<p class="text-sm text-gray-700">Your username is <?php echo $userInfo["username"]; ?></p>
				    	<p class="text-sm text-gray-700">Your email for this account: <?php echo $userInfo["email"]; ?></p>
				  	</div>

				  	<!-- Action Buttons -->
				  	<div class="mt-4 flex flex-col gap-y-4 sm:flex-row sm:justify-end sm:gap-x-4">
				    	<a href="edit_profile.php" class="inline-flex justify-center rounded-md bg-gray-400 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-gray-500 sm:w-auto">
				      	Edit Profile
				    	</a>
				    	<a href="src/controllers/deleteUser.php" class="inline-flex justify-center rounded-md bg-red-400 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-red-500 sm:w-auto">
				      	Delete Your Account
				    	</a>
				  	</div>
				</div>
	      	</div>
	    </div>
	</div>
</div>