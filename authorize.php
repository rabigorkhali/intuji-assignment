<?php
require_once 'vendor/autoload.php';

$client = getClient();
$authUrl = $client->createAuthUrl();

echo "<a href='$authUrl'>Click here to authorize</a>";
?>
