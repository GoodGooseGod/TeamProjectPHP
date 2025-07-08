<?php

function get_messages($token) {
    return file_get_contents("https://api.teletype.app/public/api/v1/messages?token=$token");
}

function get_dialogues($token)
{
    return file_get_contents("https://api.teletype.app/public/api/v1/clients?token=$token");
}

function get_client_data($token, $clientid)
{
    $postData = http_build_query([
        'clientId' => $clientid
    ]);

    $headers = [
        'X-Auth-Token: ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
    ];

    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => $headers,
            'content' => $postData
        ]
    ]);
    return file_get_contents("https://api.teletype.app/public/api/v1/client/details/$clientid", false, $context);
}

function get_client_custom_data($token, $clientid)
{
    $postData = http_build_query([
        'clientId' => $clientid
    ]);

    $headers = [
        'X-Auth-Token: ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
    ];

    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => $headers,
            'content' => $postData
        ]
    ]);
    return file_get_contents("https://api.teletype.app/public/api/v1/client/get-custom-fields/$clientid", false, $context);
}
function send_message($token, $dialogueid, $text) {
    $postData = http_build_query([
        'dialogId' => $dialogueid,
        'text' => $text
    ]);

    $headers = [
        'X-Auth-Token: ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
    ];

    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => $headers,
            'content' => $postData
        ]
    ]);

    $response = file_get_contents("https://api.teletype.app/public/api/v1/message/send", false, $context);
}

$URL = '';
$TOKEN = 'Ex1U8cNI3Rer7biCLMTH-XB8D1B2B19rgWfdg_EqpY2DFRY5ce5UZSuRjImxtnWZ';
$DIALOGID = 'QXl4wDx7E2p3hgaRM8Ra3qeMp3uZBe4utd44wRNwlJxqiqOyhEZJ-PD-rsYJfRKr';
$clientid = "7ceG6Kd1o0QmiGFUrGM0Vn0smvTQMn9AhRmHZjagoS52Y59r6my23otAGtNrI_L2";

// Аналог print(req['data']['items'][0])
/*print_r(json_decode(get_messages($TOKEN), true)['data']['items'][0]);
print_r(send_message($TOKEN, $DIALOGID, 'СПАМ'), true);*/
print_r(json_decode(get_client_custom_data($TOKEN, $clientid), true));
?>
<?php

function get_messages($token) {
    return file_get_contents("https://api.teletype.app/public/api/v1/messages?token=$token");
}

function get_dialogues($token)
{
    return file_get_contents("https://api.teletype.app/public/api/v1/clients?token=$token");
}

function get_client_data($token, $clientid)
{
    $postData = http_build_query([
        'clientId' => $clientid
    ]);

    $headers = [
        'X-Auth-Token: ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
    ];

    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => $headers,
            'content' => $postData
        ]
    ]);
    return file_get_contents("https://api.teletype.app/public/api/v1/client/details/$clientid", false, $context);
}

function get_client_custom_data($token, $clientid)
{
    $postData = http_build_query([
        'clientId' => $clientid
    ]);

    $headers = [
        'X-Auth-Token: ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
    ];

    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => $headers,
            'content' => $postData
        ]
    ]);
    return file_get_contents("https://api.teletype.app/public/api/v1/client/get-custom-fields/$clientid", false, $context);
}
function send_message($token, $dialogueid, $text) {
    $postData = http_build_query([
        'dialogId' => $dialogueid,
        'text' => $text
    ]);

    $headers = [
        'X-Auth-Token: ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
    ];

    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => $headers,
            'content' => $postData
        ]
    ]);

    $response = file_get_contents("https://api.teletype.app/public/api/v1/message/send", false, $context);
}

$URL = '';
$TOKEN = 'Ex1U8cNI3Rer7biCLMTH-XB8D1B2B19rgWfdg_EqpY2DFRY5ce5UZSuRjImxtnWZ';
$DIALOGID = 'QXl4wDx7E2p3hgaRM8Ra3qeMp3uZBe4utd44wRNwlJxqiqOyhEZJ-PD-rsYJfRKr';
$clientid = "7ceG6Kd1o0QmiGFUrGM0Vn0smvTQMn9AhRmHZjagoS52Y59r6my23otAGtNrI_L2";

// Аналог print(req['data']['items'][0])
/*print_r(json_decode(get_messages($TOKEN), true)['data']['items'][0]);
print_r(send_message($TOKEN, $DIALOGID, 'СПАМ'), true);*/
print_r(json_decode(get_client_custom_data($TOKEN, $clientid), true));
?>
