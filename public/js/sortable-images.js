document.addEventListener('DOMContentLoaded', function() {
    // Log all route-related elements to help debug
    const sortableContainer = document.getElementById('sortable-images');

    if (!sortableContainer) {
        return;
    }

    // Check if the reorder URL is present
    const reorderUrl = sortableContainer.getAttribute('data-reorder-url');
    if (!reorderUrl) {
        return;
    }

    // Check if CSRF token is available
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        return;
    }

    // Check for data-id attributes on rows
    const rows = sortableContainer.querySelectorAll('tr[data-id]');

    // Initialize Sortable
    new Sortable(sortableContainer, {
        handle: '.drag-handle',
        animation: 150,
        ghostClass: 'sortable-ghost',
        onEnd: function() {

            // Get all rows and their data-id values
            const updatedRows = sortableContainer.querySelectorAll('tr[data-id]');
            const itemIds = Array.from(updatedRows).map(row => row.getAttribute('data-id'));

            // Prepare the request
            const fetchOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                },
                body: JSON.stringify({ order: itemIds })
            };

            // Send the request
            fetch(reorderUrl, fetchOptions)
                .then(response => {
                    return response.json();
                })
        }
    });
});
