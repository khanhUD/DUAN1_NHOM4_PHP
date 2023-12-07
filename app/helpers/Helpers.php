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
spl_autoload_register(function ($class) {
    // Xử lý autoload cho các class trong controllers, models, helpers, ...
    $directories = ['controllers', 'models', 'helpers'];

    foreach ($directories as $directory) {
        $file = __DIR__ . '/' . $directory . '/' . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
