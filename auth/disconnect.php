<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once '../helper/helper.php';

$client= getClient();
$client->revokeToken($_SESSION['access_token']['access_token']);
session_unset();
session_destroy();
header('Location: ../index.php?logout=true');
exit;
