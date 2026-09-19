<?php

return [
    'name' => 'Example Provider',
    'version' => '1.0.0',
    'operations' => [
        'create',
        'suspend',
        'unsuspend',
        'terminate',
    ],
    'credentials' => [
        'api_key' => 'SET_VIA_ENVIRONMENT',
    ],
];
