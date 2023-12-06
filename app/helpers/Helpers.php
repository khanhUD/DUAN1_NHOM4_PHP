<?php

namespace Helpers;

class Helpers
{
    static function generatePassword(): String
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        // Tạo một mật khẩu ngẫu nhiên có 8 ký tự
        $password = '';
        for ($i = 0; $i < 10; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }
}
