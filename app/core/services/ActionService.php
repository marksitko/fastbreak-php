<?php
namespace FastbreakCore\services;

use FastbreakCore\services\NotificationService;

class ActionService
{
    public $notification;

    public function __construct()
    {
        $this->notification = new NotificationService();
    }

    public static function isPostRequest()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public static function sanitizePost()
    {
        return filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    }
}

?>