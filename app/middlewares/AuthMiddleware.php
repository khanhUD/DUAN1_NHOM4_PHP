<?php

class AuthMiddleware extends Middlewares
{
    public function handle()
    {
        $response = new Response();
        // Kiểm tra xem user đã đăng nhập chưa
        if (Session::data('admin') == null) {
            $response->redirect('dang-nhap');
        }
    }
}
