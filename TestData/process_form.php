<?php
session_start();
// session_unset();
// session_destroy();

if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_GET['auth_check'])) {
    include "client_auth.php";
    if (!isset($_GET['auth_check'])) {
        include "template.php";
        $contentData = array();
        foreach ($_POST as $key => $value) {
            $contentData[$key] =  $value;
        }
        
        $template = template($contentData);
        $_SESSION['content'] = "<pre>".$template;
        $_SESSION['email'] = $contentData['email'];
    }
    
    if (isset($_SESSION['google_token'])) {
        $accessToken = $_SESSION['google_token'];
        $client->setAccessToken($accessToken);
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($_SESSION['google_token']['refresh_token']);
            $_SESSION['google_token'] = $client->getAccessToken();
        }
        // header('Location: http://localhost/TestData/frontEnd.html?auth_check');
        $docID = create_docs($client);
        $docLink = 'https://docs.google.com/document/d/'.$docID.'/edit';
        
        if (isset($_GET['auth_check'])) {
            MailSend($client, $docLink, 1);
        } else {
            MailSend($client, $docLink, 0);
        }
    } else {
        include "Auth_process.php";
    }
}


function create_docs($client)
{
    $driveService = new Google_Service_Drive($client);
    $service = new Google_Service_Docs($client);

    $document = new Google_Service_Docs_Document([
    'title' => 'My New Document',
    ]);

    $document = $service->documents->create($document);

    $driveService->permissions->create(
        $document->documentId,
        new Google_Service_Drive_Permission([
            'role' => 'reader',
            'type' => 'anyone',
        ])
    );

    $request = new Google_Service_Docs_Request([
        'insertText' => [
            'location' => [
                'index' => 1,
            ],
            'text' => strip_tags($_SESSION['content']),
        ],
    ]);

    unset($_SESSION['content']);

    $batchUpdateRequest = new Google_Service_Docs_BatchUpdateDocumentRequest([
        'requests' => [$request],
    ]);

    $service->documents->batchUpdate($document->documentId, $batchUpdateRequest);
    $documentId = $document->documentId;
    return $documentId;
}

function MailSend($client, $docLink, $flag)
{
    $service_one = new Google_Service_Gmail($client);
    $message = new Google_Service_Gmail_Message();

    $rawMessage = 'To: ' . $_SESSION['email'] .
    "\r\n" .
    'Subject: ' . "Statement of Purpose for studying in Canada" .
    "\r\n" .
    "Content-Type: text/html; charset=utf-8\r\n" .
    "\r\n".$docLink;

    $base64UrlMessage = rtrim(strtr(base64_encode($rawMessage), '+/', '-_'), '=');

    $message->setRaw($base64UrlMessage);

    $sentMessage = $service_one->users_messages->send('me', $message);

    
    if ($sentMessage) {
        if ($flag ==1) {
               header('Location: http://localhost/TestData/frontEnd.html?success');
        } else {
            echo "http://localhost/TestData/frontEnd.html?success";
        }
    }
}
