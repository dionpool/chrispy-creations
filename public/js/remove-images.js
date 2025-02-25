document.addEventListener('DOMContentLoaded', function() {
    // Get CSRF token from meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const deleteButtons = document.querySelectorAll('.delete-image-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (confirm('Weet je zeker dat je deze afbeelding wilt verwijderen?')) {
                const projectId = this.getAttribute('data-project-id');
                const imageId = this.getAttribute('data-image-id');

                fetch(`/projecten/${projectId}/images/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            // Remove the table row
                            this.closest('tr').remove();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Er is een fout opgetreden bij het verwijderen van de afbeelding.');
                    });
            }
        });
    });
});
