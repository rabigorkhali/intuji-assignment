<?php
require_once __DIR__ . '/../vendor/autoload.php';

class GoogleApiService
{

    function authorize()
    {
        $client = getClient();
        $authUrl = $client->createAuthUrl();
        echo $authUrl;
    }
}
