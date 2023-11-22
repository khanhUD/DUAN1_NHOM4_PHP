<?php

class Connection
{
    private static $instance = null;
    private static $connect = null;

    public function __construct($config)
    {
        // Kết nối database
        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['db']};charset=utf8mb4";
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            $con = new PDO($dsn, $config['user'], $config['pass'], $options);

            // Kiểm tra xem kết nối đã được thiết lập thành công không
            if ($con) {
                self::$connect = $con;
                echo 'kết nối database connection thành công';
            } else {
                // Xử lý khi kết nối không thành công
            }
        } catch (Exception $ex) {
            $mess = $ex->getMessage();
            $data['message'] = $mess;
         
            die();
        }
    }

    public static function getInstance($config)
    {
        if (self::$instance == null) {
            $connection = new Connection($config);

            // Kiểm tra và gán giá trị cho $connect
            if (self::$connect) {
                self::$instance = self::$connect;
               
            } else {
                // Xử lý khi kết nối không thành công
            }
        }
        return self::$instance;
    }
}
