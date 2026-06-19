<?php

// Signal to Laravel bootstrap that we're running on Vercel
$_SERVER['VERCEL'] = '1';
$_ENV['VERCEL'] = '1';

// Pre-create all writable dirs in /tmp before Laravel boots
$dirs = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap',
    '/tmp/bootstrap/cache',
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// Forward Vercel requests to the Laravel entrypoint in the subdirectory
require __DIR__ . '/../ElnusaPuspitaPratama/public/index.php';
