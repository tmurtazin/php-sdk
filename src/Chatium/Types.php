<?php namespace Chatium\Types;

use Exception;

use function Chatium\Blocks\Header;
use function Chatium\Blocks\Footer;
use function Chatium\Blocks\Search;

/**
 * @param $type - block type
 * @param $field - required property field
 * @param $props - provider props
 * @throws Exception
 */
function requiredField($type, $field, $props) {
    if (!isset($props[$field])) {
        throw new Exception("$field is required $type in block props.");
    }
}

/**
 * @param $props
 * @return string[]
 */
function Card($props)
{
    $block = [];

    if (isset($props['id'])) $block['id'] = $props['id'];
    if (isset($props['text'])) $block['text'] = $props['text'];
    if (isset($props['imageUrl'])) $block['imageUrl'] = $props['imageUrl'];
    if (isset($props['onClick'])) $block['onClick'] = $props['onClick'];
    if (isset($props['onContext'])) $block['onContext'] = $props['onContext'];
    if (isset($props['borderColor'])) $block['borderColor'] = $props['borderColor'];
    if (isset($props['bgColor'])) $block['bgColor'] = $props['bgColor'];
    if (isset($props['opacity'])) $block['opacity'] = $props['opacity'];

    return $block;
}

function ContextMenuItem($props) {
    requiredField('ContextMenuItem', 'title', $props);
    requiredField('ContextMenuItem', 'onClick', $props);

    return [
        'title' => $props['title'],
        'onClick' => $props['onClick'],
    ];
}

/**
 * @param $props
 * @return string[]
 */
function Icon($props)
{
    $block = [];

    if (isset($props['appIcon'])) $block['appIcon'] = $props['appIcon'];
    if (isset($props['iconCssClass'])) $block['iconCssClass'] = $props['iconCssClass'];
    if (isset($props['bgColor'])) $block['bgColor'] = $props['bgColor'];
    if (isset($props['color'])) $block['color'] = $props['color'];
    if (isset($props['image'])) $block['image'] = $props['image'];
    if (isset($props['imageSize'])) $block['imageSize'] = $props['imageSize'];
    if (isset($props['shape'])) $block['shape'] = $props['shape'];
    if (isset($props['text'])) $block['text'] = $props['text'];

    return $block;
}

/**
 * @param $props
 * @return string[]
 * @throws Exception
 */
function StatusIcon($props)
{
    $block = Icon($props);

    requiredField('StatusIcon', 'isAvailable', $props);

    $block['isAvailable'] = $props['isAvailable'];

    return $block;
}

/**
 * @param $props
 * @return array
 * @throws Exception
 */
function Author($props)
{
    $block = [];

    requiredField('Author', 'id', $props);
    requiredField('Author', 'name', $props);
    requiredField('Author', 'avatar', $props);

    $block['id'] = $props['id'];
    $block['name'] = $props['name'];
    $block['avatar'] = $props['avatar'];

    if (isset($props['onClick'])) $block['onClick'] = $props['onClick'];

    return $block;
}

/**
 * @param $props
 * @return array
 * @throws Exception
 */
function HeaderButton($props)
{
    $block = [];

    if (isset($props['icon'])) $block['icon'] = $props['icon'];
    if (isset($props['onClick'])) $block['onClick'] = $props['onClick'];

    return $block;
}

/**
 * @param $props
 * @return array
 * @throws Exception
 */
function Chat($props)
{
    $block = [];

    requiredField('Chat', 'messages_get_url', $props);
    requiredField('Chat', 'messages_edit_url', $props);
    requiredField('Chat', 'messages_delete_url', $props);
    requiredField('Chat', 'messages_changes_url', $props);
    requiredField('Chat', 'messages_react_url', $props);
    requiredField('Chat', 'last_message_id', $props);
    requiredField('Chat', 'last_read_message_id', $props);
    requiredField('Chat', 'support_paging', $props);
    requiredField('Chat', 'files_put_url', $props);
    requiredField('Chat', 'reply_quotes_enabled', $props);
    requiredField('Chat', 'current_author', $props);
    requiredField('Chat', 'group_author', $props);
    requiredField('Chat', 'messages_socket_id', $props);
    requiredField('Chat', 'reactions_socket_id', $props);
    requiredField('Chat', 'last_read_at', $props);
    requiredField('Chat', 'last_read_socket_id', $props);

    $block['messages_get_url'] = $props['messages_get_url'];
    $block['messages_edit_url'] = $props['messages_edit_url'];
    $block['messages_delete_url'] = $props['messages_delete_url'];
    $block['messages_changes_url'] = $props['messages_changes_url'];
    $block['messages_react_url'] = $props['messages_react_url'];
    $block['last_read_message_id'] = $props['last_read_message_id'];
    $block['support_paging'] = $props['support_paging'];
    $block['files_put_url'] = $props['files_put_url'];
    $block['reply_quotes_enabled'] = $props['reply_quotes_enabled'];
    $block['current_author'] = $props['current_author'] === null ?: Author($props['current_author']);
    $block['group_author'] = $props['group_author'] === null ?: Author($props['group_author']);
    $block['messages_socket_id'] = $props['messages_socket_id'];
    $block['reactions_socket_id'] = $props['reactions_socket_id'];
    $block['last_read_at'] = $props['last_read_at'];
    $block['last_read_socket_id'] = $props['last_read_socket_id'];

    if (isset($props['messages_add_url'])) $block['messages_add_url'] = $props['messages_add_url'];
    if (isset($props['mark_as_read_url'])) $block['mark_as_read_url'] = $props['mark_as_read_url'];
    if (isset($props['last_read_get_url'])) $block['last_read_get_url'] = $props['last_read_get_url'];
    if (isset($props['typing_socket_data'])) $block['typing_socket_data'] = $props['typing_socket_data'];
    if (isset($props['pinned'])) $block['pinned'] = $props['pinned'];
    if (isset($props['render_inverted'])) $block['render_inverted'] = $props['render_inverted'];
    if (isset($props['on_context_api_call_url'])) $block['on_context_api_call_url'] = $props['on_context_api_call_url'];

    return $block;
}

/**
 * @param $props
 * @param array $blocks
 * @return array|string[]
 * @throws Exception
 */
function Screen($props, array $blocks = [])
{
    $block = [];

    requiredField('Screen', 'title', $props);

    $block['title'] = $props['title'];
    if (count($blocks) > 0) $block['blocks'] = array_filter($blocks, function ($block) {
        return isset($block['type']) && $block['type'] !== 'header' && $block['type'] !== 'search' && $block['type'] !== 'footer';
    });

    if (isset($props['description'])) $block['description'] = $props['description'];
    if (isset($props['backUrl'])) $block['backUrl'] = $props['backUrl'];
    if (isset($props['header'])) $block['header'] = Header($props['header']);
    if (isset($props['headerButton'])) $block['headerButton'] = HeaderButton($props['headerButton']);
    if (isset($props['headerLeftButton'])) $block['headerLeftButton'] = HeaderButton($props['headerLeftButton']);
    if (isset($props['contextLinks'])) $block['contextLinks'] = $props['contextLinks'];
    if (isset($props['socketId'])) $block['socketId'] = $props['socketId'];
    if (isset($props['socketIds'])) $block['socketIds'] = $props['socketIds'];
    if (isset($props['dropdownMenuBlocks'])) $block['dropdownMenuBlocks'] = $props['dropdownMenuBlocks'];
    if (isset($props['dropdownMenuInitiallyVisible'])) $block['dropdownMenuInitiallyVisible'] = $props['dropdownMenuInitiallyVisible'];
    if (isset($props['pinnedBlocks'])) $block['pinnedBlocks'] = $props['pinnedBlocks'];
    if (isset($props['chat'])) $block['chat'] = Chat($props['chat']);
    if (isset($props['fullScreenGallery'])) $block['fullScreenGallery'] = $props['fullScreenGallery'];
    if (isset($props['footer'])) $block['footer'] = Footer($props['footer']);
    if (isset($props['search'])) $block['search'] = Search($props['search']);
    if (isset($props['needEmailCheck'])) $block['needEmailCheck'] = $props['needEmailCheck'];
    if (isset($props['needPhoneCheck'])) $block['needPhoneCheck'] = $props['needPhoneCheck'];
    if (isset($props['scrollTo'])) $block['scrollTo'] = $props['scrollTo'];
    if (isset($props['logo'])) $block['logo'] = Icon($props['logo']);
    if (isset($props['layout'])) $block['layout'] = $props['layout'];
    if (isset($props['bgColor'])) $block['bgColor'] = $props['bgColor'];

    $headerBlocks = array_filter($blocks, function ($block) {
        return isset($block['type']) && $block['type'] === 'header';
    });
    if (count($headerBlocks) === 1) $block['header'] = $headerBlocks[0];

    $searchBlocks = array_filter($blocks, function ($block) {
        return isset($block['type']) && $block['type'] === 'search';
    });
    if (count($searchBlocks) === 1) $block['search'] = $searchBlocks[0];

    $footerBlocks = array_filter($blocks, function ($block) {
        return isset($block['type']) && $block['type'] === 'footer';
    });
    if (count($footerBlocks) === 1) $block['footer'] = $footerBlocks[0];

    return $block;
}
