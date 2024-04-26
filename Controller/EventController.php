<?php
require_once 'model/eventModel.php';

class eventController {
    private $eventModel;

    public function __construct() {
        $this->eventModel  = new EventModel();
    }

    public function listEvents() {
        $events = $this->eventModel->listEvents();
        return $events;
    }

    public function createEvent($eventData) {
        $this->eventModel->createEvent($eventData);
        header('Location: index.php');
        exit();
    }
}
?>
