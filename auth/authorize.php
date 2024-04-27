<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once '../helper/helper.php';
$client = getClient();
$authUrl = $client->createAuthUrl();
header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
// exit;
