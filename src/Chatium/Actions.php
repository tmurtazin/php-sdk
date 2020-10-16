<?php namespace Chatium\Actions;

function apiCall($url, $apiParams = [], $options = [])
{
    return array_merge(
        ['type' => 'apiCall', 'url' => $url, 'apiParams' => $apiParams],
        isset($options['confirm']) ? ['confirm' => $options['confirm']] : [],
        isset($options['sendPlayerState']) ? ['sendPlayerState' => $options['sendPlayerState']] : [],
    );
}

function showToast($toast)
{
    return [
        'type' => 'showToast',
        'toast' => $toast,
    ];
}

function copyToClipboard($value)
{
    return [
        'type' => 'copyToClipboard',
        'value' => $value,
    ];
}

function updateCurrentScreenBlock($blockId, $data, $merge = true)
{
    return [
        'type' => 'updateCurrentScreenBlock',
        'blockId' => $blockId,
        'data' => $data,
        'merge' => $merge,
    ];
}
