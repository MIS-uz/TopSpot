<?php

declare(strict_types=1);

/**
 * Vercel Serverless Function Bridge for Laravel
 *
 * Forwards requests to Laravel's public/index.php while preparing
 * the ephemeral writable /tmp filesystem for caches, sessions, and views.
 */

// Define writable storage path in /tmp
$tmpStorage = '/tmp/storage';

// Ensure required subdirectories exist in /tmp
$requiredDirectories = [
    $tmpStorage . '/app/public',
    $tmpStorage . '/framework/cache/data',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/framework/views',
    $tmpStorage . '/logs',
    '/tmp/bootstrap/cache',
];

foreach ($requiredDirectories as $directory) {
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }
}

// Preserve installation marker in /tmp if present
if (!file_exists($tmpStorage . '/installed') && file_exists(__DIR__ . '/../storage/installed')) {
    @copy(__DIR__ . '/../storage/installed', $tmpStorage . '/installed');
}

// Dynamically configure environment variables to write to /tmp if not already set
$envDefaults = [
    'VIEW_COMPILED_PATH' => $tmpStorage . '/framework/views',
    'APP_CONFIG_CACHE'   => '/tmp/bootstrap/cache/config.php',
    'APP_EVENTS_CACHE'   => '/tmp/bootstrap/cache/events.php',
    'APP_PACKAGES_CACHE' => '/tmp/bootstrap/cache/packages.php',
    'APP_ROUTES_CACHE'   => '/tmp/bootstrap/cache/routes.php',
    'APP_SERVICES_CACHE' => '/tmp/bootstrap/cache/services.php',
    'CACHE_STORE'        => 'array',
    'CACHE_DRIVER'       => 'array',
    'SESSION_DRIVER'     => 'cookie',
    'LOG_CHANNEL'        => 'stderr',
];

foreach ($envDefaults as $key => $value) {
    if (getenv($key) === false || getenv($key) === '') {
        putenv("{$key}={$value}");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

// Ensure working directory is the project root
chdir(dirname(__DIR__));

// Forward all requests to Laravel's standard public/index.php
require __DIR__ . '/../public/index.php';
