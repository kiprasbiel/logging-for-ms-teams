<?php

return [
    'teams' => [
        'driver' => 'custom',
        'via' => \Kiprasbiel\LoggingForMsTeams\LoggingForMsTeams::class,
        'url' => env('TEAMS_WEBHOOK'),
        'design' => [
            'avatars' => [
                'EMERGENCY' => 'https://www.kantar.lt/media-intelligence/public/img/adorable-icons/emergency.png',
                'ALERT' => 'https://www.kantar.lt/media-intelligence/public/img/adorable-icons/alert.png',
                'CRITICAL' => 'https://www.kantar.lt/media-intelligence/public/img/adorable-icons/critical.png',
                'ERROR' => 'https://www.kantar.lt/media-intelligence/public/img/adorable-icons/error.png',
                'WARNING' => 'https://www.kantar.lt/media-intelligence/public/img/adorable-icons/warning.png',
                'NOTICE' => 'https://www.kantar.lt/media-intelligence/public/img/adorable-icons/notice.png',
                'INFO' => 'https://www.kantar.lt/media-intelligence/public/img/adorable-icons/sup.png',
                'DEBUG' => 'https://www.kantar.lt/media-intelligence/public/img/adorable-icons/sup.png',
            ],

            'colours' => [
                'EMERGENCY' => 'D10000',
                'ALERT' => 'AD8BF2',
                'CRITICAL' => 'FF0000',
                'ERROR' => 'FF8000',
                'WARNING' => 'E6DE09',
                'NOTICE' => 'B8DAFF',
                'INFO' => 'BEE5EB',
                'DEBUG' => 'C3E6CB',
            ],
        ],
    ],
];
