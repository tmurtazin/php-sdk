<?php namespace Chatium\Context;

use Firebase\JWT\JWT;

function contextFromToken($token, $secret)
{
    $payload = JWT::decode($token, $secret, array('HS256'));

    return [
        'account' => [
            'id' => $payload->acc,
            'host' => $payload->host,
        ],
        'uniqId' => $payload->uqid,
        'auth' => [
            'id' => $payload->aid,
            'type' => $payload->atp,
            'token' => $payload->tkn,
        ],
        'user' => [
            'id' => $payload->uid,
            'roles' => $payload->urs,
            'firstName' => $payload->ufn,
            'lastName' => $payload->uln,
        ]
    ];
}
