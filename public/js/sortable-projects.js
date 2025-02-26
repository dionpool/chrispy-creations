document.addEventListener('DOMContentLoaded', function() {
    const sortableContainer = document.getElementById('sortable-projects');

    if (!sortableContainer) {
        return;
    }

    const reorderUrl = sortableContainer.getAttribute('data-reorder-url');
    if (!reorderUrl) {
        return;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        return;
    }

    new Sortable(sortableContainer, {
        handle: '.drag-handle',
        animation: 150,
        ghostClass: 'sortable-ghost',
        onEnd: function() {
            const updatedRows = sortableContainer.querySelectorAll('tr[data-id]');
            const itemIds = Array.from(updatedRows).map(row => row.getAttribute('data-id'));

            fetch(reorderUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                },
                body: JSON.stringify({ order: itemIds })
            })
                .then(response => response.json());
        }
    });
});
