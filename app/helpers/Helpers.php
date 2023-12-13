<?php

namespace Helpers;

class Helpers
{
    static function generateOTP(): String
    {
        $characters = '0123456789';

        // Tạo otp
        $otp = '';
        for ($i = 0; $i < 6; $i++) {
            $otp .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $otp;
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
