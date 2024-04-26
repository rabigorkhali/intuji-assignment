<?php
session_start();
require_once __DIR__ . '/Controller/EventController.php';
$eventController = new EventController;
require_once 'view/partials/header.php'
?>

<body>
    <h1>Google Calendar Plugin</h1>
    <?php include 'view/partials/connect-disconnect.php' ?>
    <?php
    if (isset($_SESSION['access_token'])) {
        $eventController->listEvents();
    }
    ?>
</body>