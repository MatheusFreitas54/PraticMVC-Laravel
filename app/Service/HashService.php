<?php

namespace App\Service;

final class HashService {

    public static function encrypt($value) {
        $hash = password_hash($value, PASSWORD_BCRYPT);
        return $hash;
    }

    public static function verify($value, $hash) {
        return password_verify($value, $hash);
    }
}
