<?php
if (!isset($_SESSION['access_token']) || !$_SESSION['access_token']) {
?>
    <a href="authorize.php" class="btn btn-outline-success">Connect Calendar</a>
<?php
} else { ?>
    <a href="disconnect.php" class="btn btn-outline-danger ">Disconnect Calendar</a>
<?php }
?>