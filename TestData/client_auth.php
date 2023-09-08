<?php

require_once 'vendor/autoload.php';
$credentialsPath = 'credentials.json';

$SCOPES = array(
'https://www.googleapis.com/auth/gmail.compose',
'https://www.googleapis.com/auth/documents',
'https://www.googleapis.com/auth/drive'
);
$client = new Google_Client();
$client->setAuthConfig($credentialsPath);
$client->addScope($SCOPES);
$client->setAccessType('offline');
