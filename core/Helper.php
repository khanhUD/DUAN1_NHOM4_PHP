<?php
$sessionKey = Session::isInvalid();
$errors = Session::flash($sessionKey . '_errors');
$old = Session::flash($sessionKey . '_old');
$msg = Session::flash('msg');

if (!function_exists('form_error')) {
    function form_error($fieldName, $before = "", $after = "")
    {
        global $errors;
        if (!empty($errors) && array_key_exists($fieldName, $errors)) {
            return $before . $errors[$fieldName] . $after;
        }
        return false;
    }
}

if (!function_exists('old')) {
    function old($fieldName, $default = "")
    {
        global $old;
        if (!empty($old[$fieldName])) {
            return $old[$fieldName];
        }
        return $default;
    }
}

if (!function_exists('show_message')) {
    function show_message($before = "", $after = "")
    {
        global $msg;
        if (!empty($msg)) {
            return $before . $msg . $after;
        }
        return false;
    }
}
if (!function_exists('show_err')) {
    function show_err($before = "", $after = "")
    {
        global $err;
        if (!empty($err)) {
            return $before . $err . $after;
        }
        return false;
    }
}

if (!function_exists('mgs')) {
    function msg()
    {
        global $msg;
        return $msg;
    }
}