<?php

/*
 * This sets the $_SERVER['server_name'] and
 * $_SERVER['script_name'] to the correct values.
 *
 * If this is not set, Kirby fails to determine the
 * correct path names.
 *
 * This is only necessary for Laravel Valet.
 *
 * https://laravel.com/docs/8.x/valet#site-specific-environment-variables
 */

// @todo: replace the following with your site info.

return [
    'your-site-key' => [
        'SERVER_NAME' => 'your-site-domain.test',
        'SCRIPT_NAME' => '/'
    ]
];