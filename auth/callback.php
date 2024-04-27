<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once '../helper/helper.php';

if (!isset($_GET['code']) || !trim($_GET['code'])) {
    require_once 'disconnect.php';
    exit;
}
$client = getClient();
$accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
$_SESSION['access_token'] = $accessToken;
header('Location: ../index.php');
