<?php

namespace Realodix\Dessert\Support;

/**
 * @internal
 */
final class Str
{
    public static function normalizeLineEndings(string $value): string
    {
        return strtr($value, [
            "\r\n" => "\n",
            "\r"   => "\n",
        ]);
    }
}
