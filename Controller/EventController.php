<?php
require_once 'model/eventModel.php';

class eventController
{
    private $eventModel;

    public function __construct()
    {
        $this->eventModel  = new EventModel();
    }

    public function listEvents()
    {
        $events = $this->eventModel->listEvents();
        return $events;
    }

    public function createEvent($eventData)
    {
        $data = [];
        $data['success'] = true;
        try {
            $this->eventModel->createEvent($eventData);
            $data['message'] = 'Event create successful.';
        } catch (Google\Service\Exception $e) {
            $errorResponse = json_decode($e->getMessage(), true);
            if (isset($errorResponse['error']['errors'])) {
                $errors = $errorResponse['error']['errors'];
                foreach ($errors as $error) {
                    $domain = $error['domain'];
                    $reason = $error['reason'];
                    $message = $error['message'];
                    $locationType = $error['locationType'];
                    $location = $error['location'];
                    $error = "Error: Event create failed. $domain - $reason: $message (Location: $locationType - $location)";
                    $data['success'] = false;
                    $data['message'] = $error;
                }
            } else {
                $error = 'An error occurred while processing your request.';
                $data['success'] = false;
                $data['message'] = $error;
            }
        }
        return $data;
        exit();
    }

    public function deleteEvent($eventId)
    {
        $data = [];
        $data['success'] = true;
        try {
            $this->eventModel->deleteEvent($eventId);
            $data['message'] = 'Event deleted successful.';
        } catch (Google\Service\Exception $e) {
            $errorResponse = json_decode($e->getMessage(), true);
            if (isset($errorResponse['error']['errors'])) {
                $errors = $errorResponse['error']['errors'];
                foreach ($errors as $error) {
                    $domain = $error['domain'];
                    $reason = $error['reason'];
                    $message = $error['message'];
                    $locationType = $error['locationType'];
                    $location = $error['location'];
                    $error = "Error: Event delete failed. $domain - $reason: $message (Location: $locationType - $location)";
                    $data['success'] = false;
                    $data['message'] = $error;
                }
            } else {
                $error = 'An error occurred while processing your request.';
                $data['success'] = false;
                $data['message'] = $error;
            }
        }
        return $data;
        exit();
    }
}
