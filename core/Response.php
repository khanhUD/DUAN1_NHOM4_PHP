<?php

class Response
{
    public function redirect($uri = '')
    {
        if (preg_match('~^(http|https)~is', $uri)) {
            echo $url = $uri;
        } else {
            $url = _WEB_ROOT . '/' . $uri;
        }
        header('Location: ' . $url);
        exit();
    }

    function getCookie($name)
    {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
    }

    function setCookie($name, $value, $expires = 0, $path = '/', $domain = null, $secure = false, $httponly = false)
    {
        setcookie($name, $value, $expires, $path, $domain, $secure, $httponly);
    }
    // File: Response.php

    // ... (các phương thức khác)

    public function redirectBack($params = [])
    {
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : _WEB_ROOT;
        $url = parse_url($referer);
        $query = isset($url['query']) ? $url['query'] : '';
        parse_str($query, $query_params);

        // Thêm các tham số được truyền vào (nếu có)
        $query_params = array_merge($query_params, $params);

        // Xây dựng URL với tham số mới
        $new_query = http_build_query($query_params);
        $redirect_url = $url['path'] . '?' . $new_query;

        // Thực hiện chuyển hướng
        header('Location: ' . $redirect_url);
        exit();
    }
}
