<?php
if (!isset($_SESSION['access_token']) || !$_SESSION['access_token']) {
?>
    <a href="authorize.php">Connect to Google Calendar</a>
<?php
} else { ?>
    <a href="disconnect.php">Disconnect from Google Calendar</a>
<?php }
?>