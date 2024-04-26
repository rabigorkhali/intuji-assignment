<?php
session_start();
require_once 'vendor/autoload.php';

$client = getClient();
$client->authenticate($_GET['code']);
$_SESSION['access_token'] = $client->getAccessToken();

// Redirect to index.php after successful authentication
header('Location: index.php');
exit();
?>
