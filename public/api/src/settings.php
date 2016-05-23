<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        // // Renderer settings
        // 'renderer' => [
        //     'template_path' => __DIR__ . '/../templates/',
        // ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],

        // PDO settings
        'db' => [
            'host' => 'localhost',
            'dbname' => 'redbook',
            'user' => 'root',
            'pass' => 'root'
        ]
    ],
];
