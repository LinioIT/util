<?php

declare(strict_types=1);

namespace Linio\Component\Util;

use InvalidArgumentException;
use LogicException;

class Json
{
    /**
     * @param mixed $data
     *
     * @throws LogicException If encoding fails
     *
     * @return string
     */
    public static function encode($data): string
    {
        if (is_resource($data)) {
            throw new InvalidArgumentException('Resource types cannot be encoded');
        }

        $result = json_encode($data);

        if ($result === false || json_last_error() !== JSON_ERROR_NONE) {
            throw new LogicException(self::getLastJsonError());
        }

        return $result;
    }

    /**
     * @param mixed $data
     *
     * @throws LogicException If decoding fails
     *
     * @return mixed
     */
    public static function decode(mixed $data): mixed
    {
        if (empty($data)) {
            return null;
        }

        if (!is_string($data)) {
            return null;
        }

        $result = json_decode($data, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $lastError = self::getLastJsonError();
            $payload = substr($data, 0, 255);

            if (strlen($data) > 255) {
                $payload .= '... (truncated)';
            }

            throw new LogicException(sprintf('%s on \'%s\'', $lastError, $payload));
        }

        return $result;
    }

    public static function getLastJsonError(): string
    {
        return match (json_last_error()) {
            JSON_ERROR_DEPTH => 'Invalid JSON: Maximum stack depth exceeded',
            JSON_ERROR_STATE_MISMATCH => 'Invalid JSON: Underflow or modes mismatch',
            JSON_ERROR_CTRL_CHAR => 'Invalid JSON: Unexpected control character found',
            JSON_ERROR_SYNTAX => 'Invalid JSON: Syntax error',
            JSON_ERROR_UTF8 => 'Invalid JSON: Malformed UTF-8 characters, possibly incorrectly encoded',
            default => 'Invalid JSON: Unknown error',
        };
    }
}
