<?php
namespace Fastbreak\services;

use FastbreakCore\services\ActionService;

class PageActions extends ActionService 
{

    public function __construct($model)
    {
        parent::__construct($model);
    }

    public function insertPost($data)
    {
        $data = self::sanitizePost($data);
        if ($this->model->insertPost($data)) {
            $this->notification->setStatus('success');
            $this->notification->setMsg('Your data was successfully saved');
        } else {
            $this->notification->setStatus('failed');
            $this->notification->setMsg('Oops, something went wrong');
        }
    }

}

?>