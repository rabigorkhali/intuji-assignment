<?php
session_start();
require_once 'helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['access_token'])) {
    $client = getClient();
    $service = new Google_Service_Calendar($client);

    $calendarId = 'primary'; // User's primary calendar

    $eventId = $_POST['event_id'];
    $service->events->delete($calendarId, $eventId);
}

header('Location: index.php');
