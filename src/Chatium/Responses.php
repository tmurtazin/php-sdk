<?php namespace Chatium\Responses;

function ScreenResponse($data, $screens = null, $preloadMedia = null)
{
    $response = ['success' => true, 'data' => $data];

    if ($screens) $response['appScreens'] = $screens;
    if ($preloadMedia) $response['preloadMedia'] = $preloadMedia;

    return $response;
}

function ApiCallResponse($data, $screens = null)
{
    $response = ['success' => true];

    if ($data) $response['appAction'] = $data;
    if ($screens) $response['appScreens'] = $screens;

    return $response;
}
