<?php

namespace Linio\Component\Util;

class String
{
    /**
     * @param string $string
     *
     * @return string
     */
    public static function pascalize($string)
    {
        return ucfirst(str_replace(' ', '', ucwords(strtr($string, '_-', '  '))));
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public static function camelize($string)
    {
        return lcfirst(self::pascalize($string));
    }
}
