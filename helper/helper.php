<?php

require_once __DIR__ . '/../vendor/autoload.php';

function getClient() {
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar Plugin');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfig(__DIR__ . '/../config/client_secret.json'); 
    $client->setAccessType('offline');

    if (isset($_SESSION['access_token']) && is_string($_SESSION['access_token'])) {
        $client->setAccessToken($_SESSION['access_token']);
    }

    if ($client->isAccessTokenExpired() && isset($_SESSION['refresh_token'])) {
        $client->fetchAccessTokenWithRefreshToken($_SESSION['refresh_token']);
        $_SESSION['access_token'] = $client->getAccessToken();
    } elseif (!$client->getAccessToken() && isset($_GET['code'])) {
        $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = json_encode($accessToken); 
        $_SESSION['refresh_token'] = $client->getRefreshToken(); 
    }
    return $client;
}


?>
