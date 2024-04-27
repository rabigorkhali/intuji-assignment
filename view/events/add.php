<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php" method="post">
                <div class="modal-body">
                    <div>
                        <label for="event_name" class="form-label">Event Name<span class="text-danger">*</span></label>
                        <input required type="text" id="event_name" placeholder="Enter event name" max="100" name="event_name" class="form-control" required><br>
                    </div>
                    <div class="">
                        <label for="event_start" class="form-label">Start Date<span class="text-danger">*</span></label>
                        <input required type="datetime-local" id="event_start" name="start" class="form-control" value="<?php echo date('Y-m-d\TH:i'); ?>" required><br>
                    </div>
                    <div>
                        <label for="event_end" class="form-label">End Date<span class="text-danger">*</span></label>
                        <input required type="datetime-local" id="event_end" name="end" class="form-control" value="<?php echo date('Y-m-d\TH:i'); ?>" required><br>
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