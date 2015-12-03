<?php
declare(strict_types=1);

namespace Linio\Component\Util;

class Inflector
{
    public static function pascalize(string $string): string
    {
        return ucfirst(str_replace(' ', '', ucwords(strtr($string, '_-', '  '))));
    }

    public static function camelize(string $string): string
    {
        return lcfirst(self::pascalize($string));
    }
}
