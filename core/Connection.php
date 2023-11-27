<?php

class Connection
{
    private static $instance =  null,  $connect =  null;
    public function __construct($config)
    {
        // ket noi database
        try {
                // Cấu hình dns
            $dsn = "mysql:host={$config['host']};dbname={$config['db']};charset=utf8mb4";
            

            //------------ Thang nao sai xampp thì đổi lại $config['pass'] thanh ''
            $con = new PDO($dsn, $config['user'], $config['pass']);
            self::$connect = $con;
            
        } catch (Exception $ex) {
            $mess = $ex->getMessage();
            $data['message'] = $mess;
            App::$app->loadError($data, 'database');
            die();
        }
    }

    public static function getInstance($config)
    {
        if (self::$instance == null) {
            new Connection($config);
            self::$instance = self::$connect;
        }
        return self::$instance;
    }
}