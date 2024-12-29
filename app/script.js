function toggleVisibility(event) {
    // Get the target ID from the button's `data-target` attribute
    const targetId = event.target.getAttribute('data-target');
    if (!targetId) return; // Exit if no target ID is found
    
    const targetElement = document.getElementById(targetId);
    if (!targetElement) return; // Exit if the target element does not exist

    if (targetElement.classList.contains("hidden")) {
        targetElement.classList.add('ease-out', 'duration-300');
        requestAnimationFrame(() => {
            targetElement.classList.remove('opacity-0');
            targetElement.classList.add('opacity-100');
            targetElement.classList.remove('hidden');
        });
    } else {
        targetElement.classList.add('ease-in', 'duration-200');
        requestAnimationFrame(() => {
           targetElement.classList.remove('opacity-100');
           targetElement.classList.add('opacity-0');
           targetElement.classList.add('hidden');
        });
    }
}

// Attach the event listener to buttons
document.querySelectorAll('[data-target]').forEach(button => {
    button.addEventListener('click', toggleVisibility);
});

function toggleHiddenElement(show) {
    const hiddenElement = document.getElementById('share_with');

    if (show) {
      hiddenElement.classList.remove('hidden');
    } else {
      hiddenElement.classList.add('hidden');
    }
}

function switchForms(currentFormId, nextFormId) {
    const currentForm = document.getElementById(currentFormId);
    const nextForm = document.getElementById(nextFormId);

    if (!currentForm || !nextForm) return; // Exit if forms are missing

    // Hide the current form
    currentForm.classList.add('opacity-0');
    setTimeout(() => {
        currentForm.classList.add('hidden');
        
        // Show the next form
        nextForm.classList.remove('hidden');
        requestAnimationFrame(() => {
            nextForm.classList.remove('opacity-0');
            nextForm.classList.add('opacity-100');
        });
    }, 100); // Adjust this to match your CSS transition duration
}