<?php
namespace FastbreakCore\services;

use FastbreakCore\services\NotificationService;

class ActionService
{
    public $notification;
    protected $model;

    public function __construct($model = null)
    {
        $this->notification = new NotificationService();
        if (!is_null($model)) $this->model = new $model;
    }

    public static function sanitizePost()
    {
        return filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    }
}

?>