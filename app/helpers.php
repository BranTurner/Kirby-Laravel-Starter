<?php

/*
 * This file is here to import Laravel's e() function
 * before Kirby's helpers are loaded...
 *
 * Yes it is hack-y, but it avoids having to modify Kirby's
 * source files. If you prefer, you can comment out Kirby's e()
 * function in cms/kirby/config/helpers.php.
 */

use Illuminate\Contracts\Support\DeferringDisplayableValue;
use Illuminate\Contracts\Support\Htmlable;

/**
 * Encode HTML special characters in a string.
 *
 * @param DeferringDisplayableValue|Htmlable|string|null  $value
 * @param bool $doubleEncode
 * @return string
 */
function e($value, bool $doubleEncode = true): string
{
    if ($value instanceof DeferringDisplayableValue) {
        $value = $value->resolveDisplayableValue();
    }

    if ($value instanceof Htmlable) {
        return $value->toHtml();
    }

    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8', $doubleEncode);
}