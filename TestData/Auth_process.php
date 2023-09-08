<?php

include "client_auth.php";
$REDIRECT_URI = "http://localhost/TestData/process_form.php?auth_check";

if (isset($_GET['code'])) {
    session_start();
    $accessToken =$client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['google_token'] = $accessToken;
    header('Location:' . filter_var($REDIRECT_URI, FILTER_SANITIZE_URL));
    exit;
} else {
    $authUrl = $client->createAuthUrl();
    echo filter_var($authUrl, FILTER_SANITIZE_URL);
    exit;
}
