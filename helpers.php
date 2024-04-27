<?php

require_once __DIR__ . '/vendor/autoload.php';

function getClient() {
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar Plugin');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfig('client_secret.json'); // Path to your client secret file
    $client->setAccessType('offline');

    if (isset($_SESSION['access_token']) && is_string($_SESSION['access_token'])) {
        $client->setAccessToken($_SESSION['access_token']);
    }

    // Check if the access token is expired or if it's a new session
    if ($client->isAccessTokenExpired() && isset($_SESSION['refresh_token'])) {
        // If access token is expired, refresh it using the refresh token
        $client->fetchAccessTokenWithRefreshToken($_SESSION['refresh_token']);
        $_SESSION['access_token'] = $client->getAccessToken();
    } elseif (!$client->getAccessToken() && isset($_GET['code'])) {
        // If no access token is set but authorization code is present, exchange it for access token
        $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = json_encode($accessToken); // Store the JSON-encoded access token
        $_SESSION['refresh_token'] = $client->getRefreshToken(); // Save the refresh token
    }
    return $client;
}


?>
