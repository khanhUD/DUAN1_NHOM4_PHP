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
}
