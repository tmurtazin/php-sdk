<?php

// Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

use function Chatium\Responses\ScreenResponse;
use function Chatium\Actions\showToast;
use function Chatium\Blocks\Button;
use function Chatium\Blocks\Screen;
use function Chatium\Blocks\Text;

echo json_encode(
    ScreenResponse(
        Screen(['title' => 'Hello!'], [
            Text(['text' => 'Hello World!']),
            Button([
                'title' => 'HelloWorld',
                'onClick' => showToast('Clicked!')
            ])
        ])
    )
);
