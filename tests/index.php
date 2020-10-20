<?php

// Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

use function Chatium\Responses\ScreenResponse;
use function Chatium\Types\Screen;
use function Chatium\Types\ContextMenuItem;
use function Chatium\Actions\apiCall;
use function Chatium\Actions\refresh;
use function Chatium\Actions\showContextMenu;
use function Chatium\Actions\showToast;
use function Chatium\Blocks\Button;
use function Chatium\Blocks\Text;
use function Chatium\Blocks\Image;

function AweText(string $text, array $props = []) { return Text(array_merge(['text' => $text], $props)); }
function AweImage(string $url, array $props = []) { return Image(array_merge(['downloadUrl' => $url], $props)); }
function AweButton(string $title, array $onClick, array $props = []) { return Button(array_merge(['title' => $title, 'onClick' => $onClick], $props)); }
function AweContextMenu(string $title, array $onClick) { return ContextMenuItem(['title' => $title, 'onClick' => $onClick]); }

echo json_encode(
    ScreenResponse(
        Screen(['title' => 'Hello!'], [
            AweImage('http://yandex.ru'),
            AweText('Hello World!'),
            AweButton('Press to showToast', [showToast('showToast!')]),
            AweButton('Press to apiCall', [apiCall('showToast!')]),
            AweButton('Press to refresh', [refresh()]),
            AweButton('Press to showContext', [
                showContextMenu([
                    AweContextMenu('Title 1', [showToast('Click 1!')]),
                    AweContextMenu('Title 2', [showToast('Click 2!')]),
                    AweContextMenu('Title 3', [showToast('Click 3!')]),
                ]),
            ]),
        ])
    )
);
