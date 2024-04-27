<?php
session_start();
require_once 'helpers.php';

$client = getClient();
$authUrl = $client->createAuthUrl();

header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
exit;
