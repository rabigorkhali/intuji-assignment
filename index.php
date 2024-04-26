<?php
session_start();
require_once __DIR__ . '/controller/eventController.php';
$eventController = new eventController;
require_once 'view/partials/header.php'
?>

<body>
    <div class="container">
        <?php
        require_once 'view/partials/navbar.php';
        if (!isset($_SESSION['access_token']) || !$_SESSION['access_token']) {
        ?>
            <div class="alert alert-danger" role="alert">
                <strong>Alert!!:</strong> You are not connected to google calendar. Please click 'Connect Calendar' in top right corner.
            </div>
        <?php
        } ?>
        <div class="row justify-content-between mt-4">
            <div class="col-md-6">
                <h4>Events</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="#" class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#addEventModal"> Add Event</a>
            </div>
        </div>
        <?php require_once 'view/events/list.php';
        ?>
    </div>
</body>

<?php
require_once 'view/partials/footer.php';
require_once 'view/events/add.php';
require_once 'view/events/delete.php';
