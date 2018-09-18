<?php
namespace FastbreakCore\services;

class RequestService
{
    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
}

?>