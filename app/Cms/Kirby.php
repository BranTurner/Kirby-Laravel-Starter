<?php

namespace App\Cms;

use Kirby\Cms\App;

class Kirby extends \Kirby\Cms\App {

    public static function instance(App $instance = null, bool $lazy = false)
    {
        return resolve(Kirby::class);
    }

}
