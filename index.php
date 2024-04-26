<?php
session_start();
require_once __DIR__ . '/controller/eventController.php';
$eventController = new eventController;
require_once 'view/partials/header.php'
?>

<body>
    <div class="container">
        <nav class="navbar bg-body-tertiary justify-content-center">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Google Calendar Integration</a>
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <?php include 'view/partials/connect-disconnect.php' ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row justify-content-between mt-4">
            <div class="col-md-6">
                <h4>Events</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="#" class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#addEventModal"> Add Event</a>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <table id="eventTable" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Action</th>
                            <th>Event Name</th>
                            <th>StartDate</th>
                            <th>End Date</th>
                            <th>Event ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['access_token'])) {
                            $events = $eventController->listEvents();
                            if (empty($events)) {
                                echo "<tr><td colspan='5'>No events found. Please create new event.</td> </tr>";
                            } else {
                                foreach ($events as $event) {

                                    $startDateTime = null;
                                    $endDateTime = null;
                                    if ($event->getStart() && $event->getStart()->getDateTime()) {
                                        $startDateTime = $event->getStart()->getDateTime() ?? 'Not specified';
                                    }
                                    if ($event->getEnd() && $event->getEnd()->getDateTime()) {
                                        $endDateTime = $event->getEnd()->getDateTime() ?? 'Not specified';
                                    }

                                    echo "<tr>
                                    <td>234</td>
                                    <td>
                <form id='deleteForm{$event->getId()}' action='delete_event.php' method='POST'>
                    <input type='hidden' name='event_id' value='{$event->getId()}'>
                    <button type='button' class='btn btn-sm btn-danger' onclick='confirmDelete(\"{$event->getId()}\")'>Delete</button>
                </form>
            </td>                                    
                                    <td>{$event->getSummary()}</td>
                                    <td>{$startDateTime}</td>
                                    <td>{$endDateTime}</td>
                                    <td>" . substr($event->getId(), 0, 40) . "</td>
                                    </tr>";
                                }
                            }
                        } else {
                            echo "<tr><td colspan='5'>Calendar disconnected. Please click top right button 'Connect Calendar'.</td> </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<?php
require_once 'view/events/add.php';
require_once 'view/partials/footer.php';
?>
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