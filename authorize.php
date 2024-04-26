<?php
session_start();
require_once 'functions.php';

$client = getClient();
$authUrl = $client->createAuthUrl();

header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
