<?php
class eventView {
    public function displayEvents($events) {


        if (empty($events)) {
            echo 'No upcoming events found.';
        } else {
            echo '<h3>Upcoming Events:</h3>';
            foreach ($events as $event) {
                echo '<div>Event ID: ' . $event->getId() . '</div>';
                echo '<div>Event Summary: ' . $event->getSummary() . '</div>';
                echo '<br>';
            }
        }
    }
}
?>
