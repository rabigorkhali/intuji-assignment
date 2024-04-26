<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'functions.php';

class GoogleApiService
{

    function authorize()
    {
        $client = getClient();
        $authUrl = $client->createAuthUrl();
        return  filter_var($authUrl, FILTER_SANITIZE_URL);
    }

    function disconnect()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
    }
}