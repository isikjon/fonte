<?php

return [
    'temporary_file_upload' => [
        'disk' => 'local',
        'rules' => ['file', 'max:262144'],
        'directory' => 'livewire-tmp',
        'middleware' => null,
        'preview_mimes' => [
            'png', 'gif', 'bmp', 'svg', 'wav', 'mp4', 'webm',
            'mov', 'avi', 'wmv', 'mp3', 'm4a',
            'jpg', 'jpeg', 'mpga', 'webp', 'wma',
        ],
        'max_upload_time' => 300,
        'cleanup' => true,
    ],
];

