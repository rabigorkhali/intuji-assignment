<?php
 session_start(); 
 require_once 'Controller/EventController.php';
 require_once 'Service/GoogleApiService.php';
 $eventController = new EventController();
 $googleApiService = new GoogleApiService();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Calendar Plugin</title>
</head>

<body>
    <h1>Google Calendar Plugin</h1>

    <?php
    if (!isset($_SESSION['access_token']) || !$_SESSION['access_token']) {
    ?>
        <a href="<?php $googleApiService->authorize() ?>">Connect to Google Calendar</a>
    <?php
    } else { ?>
        <a href="disconnect.php">Disconnect from Google Calendar</a>
    <?php }
    ?>

</body>