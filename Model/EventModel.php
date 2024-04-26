<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../helpers.php';


class EventModel
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
        return $this->googleServiceCalendar->events->insert($calendarId, $event);
    }
}
