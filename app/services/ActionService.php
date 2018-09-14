<?php
namespace Fastbreak\services;

use Fastbreak\models\Page;
use Fastbreak\services\NotificationService;

class ActionService
{
    
    public function __construct()
    {
        $this->pagesModel = new Page();
    }

    public function insertPost($data)
    {
        if ($this->pagesModel->insertPost($data)) {
            NotificationService::setStatus('success');
            NotificationService::setMsg('Your data was successfully saved');
        } else {
            NotificationService::setStatus('failed');
            NotificationService::setMsg('Oops, something went wrong');
        }
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