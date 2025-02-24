document.addEventListener('DOMContentLoaded', function() {
    // Log all route-related elements to help debug
    console.log('Looking for sortable container...');
    const sortableContainer = document.getElementById('sortable-images');

    if (!sortableContainer) {
        console.error('Sortable container #sortable-images not found on page');
        return;
    }

    console.log('Container found:', sortableContainer);

    // Check if the reorder URL is present
    const reorderUrl = sortableContainer.getAttribute('data-reorder-url');
    if (!reorderUrl) {
        console.error('data-reorder-url attribute missing on #sortable-images');
        return;
    }

    console.log('Reorder URL found:', reorderUrl);

    // Check if CSRF token is available
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        console.error('CSRF token meta tag missing. Add <meta name="csrf-token" content="{{ csrf_token() }}"> to your layout');
        return;
    }

    console.log('CSRF token found');

    // Check for data-id attributes on rows
    const rows = sortableContainer.querySelectorAll('tr[data-id]');
    console.log('Found ' + rows.length + ' rows with data-id attributes');

    // Initialize Sortable
    new Sortable(sortableContainer, {
        handle: '.drag-handle',
        animation: 150,
        ghostClass: 'sortable-ghost',
        onEnd: function() {
            console.log('Drag ended, starting reorder process...');

            // Get all rows and their data-id values
            const updatedRows = sortableContainer.querySelectorAll('tr[data-id]');
            const itemIds = Array.from(updatedRows).map(row => row.getAttribute('data-id'));

            console.log('New order:', itemIds);

            // Prepare the request
            const fetchOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                },
                body: JSON.stringify({ order: itemIds })
            };

            console.log('Sending request to:', reorderUrl);
            console.log('Request options:', fetchOptions);

            // Send the request
            fetch(reorderUrl, fetchOptions)
                .then(response => {
                    console.log('Response status:', response.status);
                    console.log('Response headers:', [...response.headers].map(h => h.join(': ')).join(', '));
                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data);
                    if (data.success) {
                        console.log('Reordering successful!');
                    } else {
                        console.error('Reordering failed:', data);
                    }
                })
                .catch(error => {
                    console.error('Error during fetch:', error);
                });
        }
    });

    console.log('Sortable initialized successfully');
});
