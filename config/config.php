<?php

return [
    'db' => [
        'dsn' => 'mysql:host=db;dbname=honeyflow;charset=utf8mb4',
        'user' => 'honeyflow',
        'password' => 'Wildflower-Harvest-2026!',
    ],
    'jwt_secret' => 'acacia-linden-heather-secret',
    'mail' => [
        'host' => 'smtp.honeyflow.example',
        'from' => 'orders@honeyflow.example',
    ],
    'label_printer' => 'coop-zebra-01',
    'upload_dir' => __DIR__ . '/../public/uploads',
];
