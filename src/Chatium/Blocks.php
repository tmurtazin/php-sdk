<?php namespace Chatium\Blocks;

use Exception;
use function Chatium\Types\requiredField;

/**
 * @param array $block - target block
 * @param array $props - common props
 */
function commonBlockProps(array &$block, array $props) {
    if (isset($props['containerStyle'])) $block['containerStyle'] = $props['containerStyle'];
    if (isset($props['fallback'])) $block['fallback'] = $props['fallback'];
    if (isset($props['onContext'])) $block['onContext'] = $props['onContext'];
}

/**
 * @param array $props
 * @param array $blocks
 * @return array
 * @throws Exception
 */
function Audio(array $props, array $blocks = [])
{
    $block = ['type' => 'audio'];

    requiredField($block['type'], 'downloadUrl', $props);

    $block['downloadUrl'] = $props['downloadUrl'];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['title'])) $block['title'] = $props['title'];
    if (isset($props['description'])) $block['description'] = $props['description'];
    if (isset($props['fileHash'])) $block['fileHash'] = $props['fileHash'];
    if (isset($props['durationSeconds'])) $block['durationSeconds'] = $props['durationSeconds'];

    return $block;
}

/**
 * @param array $props
 * @param array $blocks
 * @return string[]
 */
function Button(array $props, array $blocks = [])
{
    $block = ['type' => 'button'];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['bgColor'])) $block['bgColor'] = $props['bgColor'];
    if (isset($props['fontColor'])) $block['fontColor'] = $props['fontColor'];
    if (isset($props['fontSize'])) $block['fontSize'] = $props['fontSize'];
    if (isset($props['icon'])) $block['icon'] = $props['icon'];
    if (isset($props['iconPosition'])) $block['iconPosition'] = $props['iconPosition'];
    if (isset($props['onClick'])) $block['onClick'] = $props['onClick'];
    if (isset($props['title'])) $block['title'] = $props['title'];
    if (isset($props['buttonType'])) $block['buttonType'] = $props['buttonType'];

    return $block;
}

/**
 * @param array $props
 * @param array $blocks
 * @return array
 */
function Footer(array $props, array $blocks = [])
{
    $block = ['type' => 'footer', 'visibleAlways' => false];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['visibleAlways'])) $block['visibleAlways'] = $props['visibleAlways'];

    return $block;
}

/**
 * @param array $props
 * @param array $blocks
 * @return array
 */
function Gallery(array $props, array $blocks = [])
{
    $block = ['type' => 'gallery'];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['onClick'])) $block['onClick'] = $props['onClick'];
    if (isset($props['initialSlideIndex'])) $block['initialSlideIndex'] = $props['initialSlideIndex'];
    if (isset($props['slides'])) $block['slides'] = $props['slides'];

    return $block;
}

/**
 * @param array $props
 * @param array $blocks
 * @return string[]
 * @throws Exception
 */
function Header(array $props, array $blocks = [])
{
    $block = ['type' => 'header'];

    requiredField($block['type'], 'compact', $props);

    $block['compact'] = $props['compact'];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['title'])) $block['title'] = $props['title'];
    if (isset($props['description'])) $block['description'] = $props['description'];
    if (isset($props['logo'])) $block['logo'] = $props['logo'];
    if (isset($props['bottomGradientColors'])) $block['bottomGradientColors'] = $props['bottomGradientColors'];
    if (isset($props['topGradientColors'])) $block['topGradientColors'] = $props['topGradientColors'];
    if (isset($props['image'])) $block['image'] = $props['image'];

    return $block;
}

/**
 * @param array $props
 * @param array $blocks
 * @return string[]
 * @throws Exception
 */
function HorizontalCards(array $props, array $blocks = [])
{
    $block = ['type' => 'horizontalCards'];

    requiredField($block['type'], 'size', $props);
    requiredField($block['type'], 'shape', $props);
    requiredField($block['type'], 'textPosition', $props);
    requiredField($block['type'], 'cards', $props);

    $block['size'] = $props['size'];
    $block['shape'] = $props['shape'];
    $block['textPosition'] = $props['textPosition'];
    $block['cards'] = $props['cards'];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['initialCardId'])) $block['initialCardId'] = $props['initialCardId'];

    return $block;
}

/**
 * @param array $props
 * @param array $blocks
 * @return array
 * @throws Exception
 */
function Image(array $props, array $blocks = [])
{
    $block = ['type' => 'image'];

    requiredField($block['type'], 'downloadUrl', $props);

    $block['downloadUrl'] = $props['downloadUrl'];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['onClick'])) $block['onClick'] = $props['onClick'];
    if (isset($props['width'])) $block['width'] = $props['width'];
    if (isset($props['height'])) $block['height'] = $props['height'];
    if (isset($props['image'])) $block['image'] = $props['image'];
    if (isset($props['resizeMode'])) $block['resizeMode'] = $props['resizeMode'];
    if (isset($props['imageSize'])) $block['imageSize'] = $props['imageSize'];

    return $block;
}

/**
 * @param array $props
 * @param array $blocks
 * @return array
 * @throws Exception
 */
function ListItem(array $props, array $blocks = [])
{
    $block = ['type' => 'screen'];

    requiredField($block['type'], 'title', $props);

    $block['title'] = $props['title'];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['description'])) $block['description'] = $props['description'];
    if (isset($props['image'])) $block['image'] = $props['image'];
    if (isset($props['imageSize'])) $block['imageSize'] = $props['imageSize'];
    if (isset($props['logo'])) $block['logo'] = $props['logo'];
    if (isset($props['onClick'])) $block['onClick'] = $props['onClick'];
    if (isset($props['status'])) $block['status'] = $props['status'];
    if (isset($props['titleColor'])) $block['titleColor'] = $props['titleColor'];
    if (isset($props['updatedAtTimestamp'])) $block['updatedAtTimestamp'] = $props['updatedAtTimestamp'];
    if (isset($props['unreadBullet'])) $block['unreadBullet'] = $props['unreadBullet'];
    if (isset($props['active'])) $block['active'] = $props['active'];
    if (isset($props['upTitle'])) $block['upTitle'] = $props['upTitle'];
    if (isset($props['upTitleColor'])) $block['upTitleColor'] = $props['upTitleColor'];
    if (isset($props['url'])) $block['url'] = $props['url'];

    return $block;
}

/**
 * @param array $props
 * @param array $blocks
 * @return array
 * @throws Exception
 */
function Search(array $props, array $blocks = [])
{
    $block = [
        'type' => 'search',
        'bgColor' => '#ffffff',
        'borderColor' => '#9a9a9a',
        'delayMs' => 500,
        'fontColor' => '#000000',
        'minLength' => 3,
        'placeholderTextColor' => '#9a9a9a',
        'spinnerColor' => '#9a9a9a',
    ];

    requiredField($block['type'], 'queryParamKey', $props);

    $block['queryParamKey'] = $props['queryParamKey'];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['bgColor'])) $block['bgColor'] = $props['bgColor'];
    if (isset($props['borderColor'])) $block['borderColor'] = $props['borderColor'];
    if (isset($props['defaultValue'])) $block['defaultValue'] = $props['defaultValue'];
    if (isset($props['delayMs'])) $block['delayMs'] = $props['delayMs'];
    if (isset($props['fontColor'])) $block['fontColor'] = $props['fontColor'];
    if (isset($props['inputPlaceholder'])) $block['inputPlaceholder'] = $props['inputPlaceholder'];
    if (isset($props['leftIcon'])) $block['leftIcon'] = $props['leftIcon'];
    if (isset($props['minLength'])) $block['minLength'] = $props['minLength'];
    if (isset($props['placeholderTextColor'])) $block['placeholderTextColor'] = $props['placeholderTextColor'];
    if (isset($props['spinnerColor'])) $block['spinnerColor'] = $props['spinnerColor'];

    return $block;
}

/**
 * @param array $props
 * @param array $blocks
 * @return string[]
 * @throws Exception
 */
function Text(array $props, array $blocks = [])
{
    $block = ['type' => 'text'];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['text'])) $block['text'] = $props['text'];
    if (isset($props['tokens'])) $block['tokens'] = $props['tokens'];
    if (isset($props['onClick'])) $block['onClick'] = $props['onClick'];

    if (isset($props['color'])) $block['color'] = $props['color'];
    if (isset($props['fontSize'])) $block['fontSize'] = $props['fontSize'];
    if (isset($props['styles'])) $block['styles'] = $props['styles'];
    if (isset($props['isBold'])) $block['isBold'] = $props['isBold'];
    if (isset($props['lineHeight'])) $block['lineHeight'] = $props['lineHeight'];

    return $block;
}

/**
 * @param array $props
 * @param array $blocks
 * @return string[]
 * @throws Exception
 */
function Video(array $props, array $blocks = [])
{
    $block = ['type' => 'video'];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['hlsUrl'])) $block['hlsUrl'] = $props['hlsUrl'];
    if (isset($props['imageUrl'])) $block['imageUrl'] = $props['imageUrl'];
    if (isset($props['mp4Url'])) $block['mp4Url'] = $props['mp4Url'];
    if (isset($props['videoAspectRatio'])) $block['videoAspectRatio'] = $props['videoAspectRatio'];

    if (isset($props['url'])) $block['url'] = $props['url'];
    if (isset($props['file'])) $block['file'] = $props['file'];

    return $block;
}

/**
 * @param array $props
 * @param array $blocks
 * @return string[]
 * @throws Exception
 */
function InlineVideo(array $props, array $blocks = [])
{
    $block = ['type' => 'inlineVideo', 'ignoreSilentSwitch' => 'ignore'];

    if (isset($props['videoSize']) && $props['videoSize']['height'] > $props['videoSize']['width']) {
        $block['resizeMode'] = 'cover';
    }

    requiredField($block['type'], 'url', $props);

    $block['url'] = $props['url'];

    commonBlockProps($block, $props);

    if (count($blocks) > 0) $block['blocks'] = $blocks;
    if (isset($props['hlsUrl'])) $block['hlsUrl'] = $props['hlsUrl'];
    if (isset($props['imageUrl'])) $block['imageUrl'] = $props['imageUrl'];
    if (isset($props['mp4Url'])) $block['mp4Url'] = $props['mp4Url'];
    if (isset($props['videoAspectRatio'])) $block['videoAspectRatio'] = $props['videoAspectRatio'];
    if (isset($props['ignoreSilentSwitch'])) $block['ignoreSilentSwitch'] = $props['ignoreSilentSwitch'];
    if (isset($props['muted'])) $block['muted'] = $props['muted'];
    if (isset($props['onProgressChange'])) $block['onProgressChange'] = $props['onProgressChange'];
    if (isset($props['overlay'])) $block['overlay'] = $props['overlay'];
    if (isset($props['onVideoEnd'])) $block['onVideoEnd'] = $props['onVideoEnd'];
    if (isset($props['paused'])) $block['paused'] = $props['paused'];
    if (isset($props['playInBackground'])) $block['playInBackground'] = $props['playInBackground'];
    if (isset($props['playWhenInactive'])) $block['playWhenInactive'] = $props['playWhenInactive'];
    if (isset($props['repeat'])) $block['repeat'] = $props['repeat'];
    if (isset($props['resizeMode'])) $block['resizeMode'] = $props['resizeMode'];
    if (isset($props['showControls'])) $block['showControls'] = $props['showControls'];
    if (isset($props['showTimer'])) $block['showTimer'] = $props['showTimer'];
    if (isset($props['videoSize'])) $block['videoSize'] = $props['videoSize'];

    return $block;
}
