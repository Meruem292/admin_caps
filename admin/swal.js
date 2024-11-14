// Confirm Deletion
        // Confirm Deletion with SweetAlert
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'delete_event.php?id=' + id + '&status=success&action=deleted';
                }
            });
        }


        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            const action = urlParams.get('action');

            if (status === 'success' && action === 'created') {
                Swal.fire({
                    icon: 'success',
                    title: 'Event Created!',
                    text: 'The event has been created successfully.'
                });
            } else if (status === 'success' && action === 'updated') {
                Swal.fire({
                    icon: 'success',
                    title: 'Event Updated!',
                    text: 'The event has been updated successfully.'
                });
            } else if (status === 'success' && action === 'deleted') {
                Swal.fire({
                    icon: 'success',
                    title: 'Event Deleted!',
                    text: 'The event has been deleted successfully.'
                });
            } else if (status === 'error') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Something went wrong. Please try again.'
                });
            }
        });