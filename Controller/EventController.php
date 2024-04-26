<?php
require_once 'model/eventModel.php';
require_once 'view/eventView.php';

class eventController {
    private $eventModel;
    private $eventView;

    public function __construct() {
        $this->eventModel  = new EventModel();
        $this->eventView = new EventView();
    }

    public function listEvents() {
        $events = $this->eventModel->listEvents();
        $this->eventView->displayEvents($events);
    }

    public function createEvent($eventData) {
        $this->eventModel->createEvent($eventData);
        // Redirect back to index.php after event creation
        header('Location: index.php');
        exit();
    }
}
?>
