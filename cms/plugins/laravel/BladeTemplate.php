<?php

use Kirby\Cms\Template;

class BladeTemplate extends Template
{
    public function extension(): string
    {
        return 'blade.php';
    }

    public function render(array $data = []): string
    {
        return view("templates.$this->name")
            ->with([
                'kirby' => $data['kirby'],
                'site' => $data['site'],
                'pages' => $data['pages'],
                'page' => $data['page'],
            ])
            ->render();
    }
}