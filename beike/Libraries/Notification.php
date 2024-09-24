<?php

namespace Beike\Libraries;

class Notification
{
    /**
     * @param string $code
     * @param string $message
     * @param string $type    email|telephone
     * @return bool
     */
    public static function verifyCode(string $code, string $message, string $type): bool
    {

        return true;
    }
}
