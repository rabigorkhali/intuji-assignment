<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php" method="post">
                <div class="modal-body">
                    <!-- Add your form or content for adding an event here -->
                    <div>
                        <label for="event_name" class="form-label">Event Name</label>
                        <input required type="text" id="event_name" name="event_name" class="form-control" required><br>
                    </div>
                    <div class="">
                        <label for="event_start" class="form-label">Event Start Date</label>
                        <input required type="datetime-local" id="event_start" name="start" class="form-control" required><br>
                    </div>
                    <div>
                        <label for="event_end" class="form-label">Event End Date</label>
                        <input required type="datetime-local" id="event_end" name="end" class="form-control" required><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- EVENT ADD  -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['access_token'])) {
    $form_values = array(
        'summary' => $_POST['event_name'],
        'start' => array(
            'dateTime' =>  date('Y-m-d\TH:i:s', strtotime($_POST['start'])),
            'timeZone' => 'Asia/Kathmandu',
        ),
        'end' => array(
            'dateTime' =>  date('Y-m-d\TH:i:s', strtotime($_POST['end'])),
            'timeZone' => 'Asia/Kathmandu',
        ),
    );
    $responseCreateEvent = $eventController->createEvent($form_values);
    if ($responseCreateEvent['success']) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{$responseCreateEvent['message']}'
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
                    text: '{$responseCreateEvent['message']}'
                });
            </script>";
    }    
    exit();
}
?>
<!--END  EVENT ADD  -->