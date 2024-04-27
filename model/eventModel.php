<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../helper/helper.php';


class eventModel
{
    private $client;
    private $googleServiceCalendar;

    public function __construct()
    {
        $this->client =   getClient();
        $this->googleServiceCalendar = new Google_Service_Calendar($this->client);
    }

    public function listEvents($calendarId = 'primary')
    {
        $events = $this->googleServiceCalendar->events->listEvents($calendarId);
        return $events->getItems();
    }

    public function createEvent($eventData, $calendarId = 'primary')
    {
        $event = new Google_Service_Calendar_Event($eventData);
        $createdEvent = $this->googleServiceCalendar->events->insert($calendarId, $event);
        if ($createdEvent) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteEvent($eventId, $calendarId = 'primary')
    {
        $client = getClient();
        $service = new Google_Service_Calendar($client);
        $deleteEvent = $service->events->delete($calendarId, $eventId);
        if ($deleteEvent) {
            return true;
        } else {
            return false;
        }
    }
}
