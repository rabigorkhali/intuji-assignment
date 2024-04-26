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

        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <h4>Events</h4>
                <table id="eventTable" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
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
                                echo "<tr><td colspan='3'>No events found</td> </tr>";
                            } else {
                                foreach ($events as $event) {

                                    $startDateTime = null;
                                    $endDateTime = null;

                                    // Check if start date/time is set
                                    if ($event->getStart() && $event->getStart()->getDateTime()) {
                                        $startDateTime = $event->getStart()->getDateTime()?? 'Not specified';
                                    }

                                    // Check if end date/time is set
                                    if ($event->getEnd() && $event->getEnd()->getDateTime()) {
                                        $endDateTime = $event->getEnd()->getDateTime()?? 'Not specified';
                                    }

                                    echo "<tr>
                                    <td>234</td>
                                    <td>{$event->getSummary()}</td>
                                    <td>{$startDateTime}</td>
                                    <td>{$endDateTime}</td>
                                    <td>" . substr($event->getId(), 0, 40) . "</td>
                                    </tr>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<?php
require_once 'view/partials/footer.php'
?>