<?php

$devMode = TRUE;

$hostName = 'localhost';
$database = $devMode? 'vagasporemail' : '';
$username = $devMode? 'shadowbot' : '';
$password = $devMode? 'shadowNet@28raJ.' : '';

return [
    'settings' => [
        'displayErrorDetails' => true, //$devMode, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Database settings
        "db" => [
            "driver"    => "mysql",
            "host"      => $hostName,
            "database"  => $database,
            "username"  => $username,
            "password"  => $password,
            "charset"   => "utf8",
            "collation" => "utf8_unicode_ci",
            "prefix"    => "",
        ],
    ],
];
