<?php namespace Chatium\Actions;

/**
 * @param string $url
 * @param array $apiParams
 * @param array $props
 * @return array
 */
function apiCall(string $url, array $apiParams = [], array $props = [])
{
    $action = ['type' => 'apiCall', 'url' => $url, 'apiParams' => $apiParams];

    if (isset($props['confirm'])) $action['confirm'] = $props['confirm'];
    if (isset($props['sendPlayerState'])) $action['sendPlayerState'] = $props['sendPlayerState'];

    return $action;
}

/**
 * @param string $filePutUrl
 * @param array $props
 * @return array
 */
function attachMedia(string $filePutUrl, array $props = [])
{
    $action = ['type' => 'attachMedia', 'filePutUrl' => $filePutUrl];

    if (isset($props['menuTitle'])) $action['menuTitle'] = $props['menuTitle'];
    if (isset($props['progressTitle'])) $action['progressTitle'] = $props['progressTitle'];
    if (isset($props['multiple'])) $action['multiple'] = $props['multiple'];
    if (isset($props['mediaType'])) $action['mediaType'] = $props['mediaType'];
    if (isset($props['submitUrl'])) $action['submitUrl'] = $props['submitUrl'];
    if (isset($props['file'])) $action['file'] = $props['file'];

    return $action;
}

/**
 * @return array
 */
function confirmEmail()
{
    return ['type' => 'confirmEmail'];
}

/**
 * @return array
 */
function confirmPhone()
{
    return ['type' => 'confirmPhone'];
}

/**
 * @param string $value
 * @return array
 */
function copyToClipboard(string $value)
{
    return [
        'type' => 'copyToClipboard',
        'value' => $value,
    ];
}

/**
 * @return array
 */
function goBack()
{
    return ['type' => 'goBack'];
}

/**
 * @param string $url
 * @param array $props
 * @return array
 */
function navigate(string $url, array $props = [])
{
    $action = ['type' => 'navigate', 'url' => $url];

    if (isset($props['replace'])) $action['replace'] = $props['replace'];
    if (isset($props['openInExternalApp'])) $action['openInExternalApp'] = $props['openInExternalApp'];
    if (isset($props['openInModalScreen'])) $action['openInModalScreen'] = $props['openInModalScreen'];
    if (isset($props['fullScreenModal'])) $action['fullScreenModal'] = $props['fullScreenModal'];
    if (isset($props['openInCurrentScreen'])) $action['openInCurrentScreen'] = $props['openInCurrentScreen'];
    if (isset($props['openInBrowser'])) $action['openInBrowser'] = $props['openInBrowser'];
    if (isset($props['resetStack'])) $action['resetStack'] = $props['resetStack'];

    return $action;
}

/**
 * @param string $galleryId
 * @return array
 */
function nextSlide(string $galleryId)
{
    return [
        'type' => 'gallery:nextSlide',
        'galleryId' => $galleryId,
    ];
}

/**
 * @return array
 */
function noop()
{
    return ['type' => 'noop'];
}

/**
 * @param array $media
 * @return array
 */
function preloadMedia(array $media)
{
    return [
        'type' => 'preloadMedia',
        'media' => $media,
    ];
}

/**
 * @return array
 */
function refresh()
{
    return ['type' => 'refresh'];
}

/**
 * @param string $token
 * @param int $amount
 * @param string $description
 * @param string $integration
 * @param array $payload
 * @return array
 */
function requestPayment(string $token, int $amount, string $description, string $integration, array $payload = [])
{
    return [
        'type' => 'requestPayment',
        'token' => $token,
        'amount' => $amount,
        'description' => $description,
        'integration' => $integration,
        'payload' => $payload,
    ];
}

/**
 * @return array
 */
function resetSearch()
{
    return ['type' => 'resetSearch'];
}

/**
 * @param string $url
 * @return array
 */
function selectContacts(string $url)
{
    return ['type' => 'selectContacts', 'url' => $url];
}

/**
 * @param array $menu
 * @return array
 */
function showContextMenu(array $menu)
{
    return ['type' => 'showContextMenu', 'menu' => $menu];
}

/**
 * @param string $submitUrl
 * @param array $props
 * @return array
 */
function showTextDialog(string $submitUrl, array $props)
{
    $type = [
        'type' => 'showTextDialog',
        'inputType' => 'text',
        'submitUrl' => $submitUrl
    ];

    if (isset($props['title'])) $type['title'] = $props['title'];
    if (isset($props['description'])) $type['description'] = $props['description'];
    if (isset($props['submitButtonTitle'])) $type['submitButtonTitle'] = $props['submitButtonTitle'];
    if (isset($props['cancelButtonTitle'])) $type['cancelButtonTitle'] = $props['cancelButtonTitle'];

    return $type;
}

/**
 * @param string $toast
 * @return array
 */
function showToast(string $toast)
{
    return [
        'type' => 'showToast',
        'toast' => $toast,
    ];
}

/**
 * @param string $blockId
 * @param array $update
 * @param bool $merge
 * @return array
 */
function updateCurrentScreenBlock(string $blockId, array $update, bool $merge = true)
{
    return [
        'type' => 'updateCurrentScreenBlock',
        'blockId' => $blockId,
        'update' => $update,
        'merge' => $merge,
    ];
}
