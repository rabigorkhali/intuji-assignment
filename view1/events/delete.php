<script>
    function confirmDelete(eventId) {
        Swal.fire({
            title: 'Confirm Delete',
            text: 'Are you sure you want to delete this event?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + eventId).submit();
            }
        });
    }
</script>
<?php 
if ($_GET['_method'] ?? null == '_Delete' && isset($_SESSION['access_token'])) {
    $eventId = $_GET['event_id'];
    $deleteResponse = $eventController->deleteEvent($eventId);
    if ($deleteResponse['success']) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{$deleteResponse['message']}'
                }).then((result) => {
                    if (result.isConfirmed) {
                        removeParametersFromUrl();
                        window.location.href = 'index.php';
                    }
                });
            </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{$deleteResponse['message']}'
                });
            </script>";
    }
    exit();
}

?>
