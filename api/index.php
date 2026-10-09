<?php

// Signal to Laravel bootstrap that we're running on Vercel
$_SERVER['VERCEL'] = '1';
$_ENV['VERCEL'] = '1';

// Vercel terminates SSL at the edge — force HTTPS so Laravel generates correct URLs
$_SERVER['HTTPS'] = 'on';
$_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';
$_SERVER['SERVER_PORT'] = 443;
$_SERVER['APP_DEBUG'] = 'true';
$_ENV['APP_DEBUG'] = 'true';
putenv('APP_DEBUG=true');

// Configure writable cache paths for serverless
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('APP_EVENTS_CACHE=/tmp/events.php');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

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

try {
    // Forward Vercel requests to the Laravel entrypoint in the subdirectory
    require __DIR__ . '/../ElnusaPuspitaPratama/public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo '<h1>Laravel Serverless Error</h1>';
    echo '<pre>' . htmlspecialchars($e->getMessage()) . "
" . htmlspecialchars($e->getTraceAsString()) . '</pre>';
}
