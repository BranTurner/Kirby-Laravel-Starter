<?php

include 'BladeTemplate.php';

\Kirby\Cms\App::plugin('laravel/blade', [
    'components' => [
        'template' => function(\Kirby\Cms\App $kirby, string $name, string $contentType = null) {
            return new BladeTemplate($name, $contentType);
        }
    ]
]);