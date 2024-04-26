<?php
session_start();
require_once __DIR__ . '/controller/eventController.php';
$eventController = new eventController;
require_once 'view/partials/header.php'
?>

<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Google Calendar Integration</a>
                <div class="row justify-content-end">
                    <div class="col-auto">
                    <?php include 'view/partials/connect-disconnect.php' ?>
                    </div>
                </div>
            </div>
        </nav>

        <div class="row">
        <?php
        if (isset($_SESSION['access_token'])) {
            $eventController->listEvents();
        }
        ?>
        </div>
    </div>
</body>

<?php
require_once 'view/partials/footer.php'
?>