<?php
session_start();
require_once 'helpers.php';

$client = getClient();
$accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);

// Store access token in session
$_SESSION['access_token'] = $accessToken;

header('Location: index.php');
