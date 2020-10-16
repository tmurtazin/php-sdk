<?php namespace Chatium\Blocks;

function Screen($props, array $blocks)
{
    return [
        'title' => $props['title'],
        'blocks' => $blocks,
    ];
}

function Text($props, array $blocks = []) {
    return array_merge(
        ['type' => 'text'],
        $props,
        count($blocks) > 0 ? ['blocks' => $blocks] : []
    );
}

function Button($props, array $blocks = [])
{
    return array_merge(
        ['type' => 'button'],
        $props,
        count($blocks) > 0 ? ['blocks' => $blocks] : []
    );
}
