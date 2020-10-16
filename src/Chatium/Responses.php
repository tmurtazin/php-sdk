<?php namespace Chatium\Responses;

function ScreenResponse($data)
{
    return [
        'data' => $data,
        'success' => true,
    ];
}

function ApiCallResponse($data)
{
    return [
        'appAction' => $data,
        'success' => true,
    ];
}
