<?php
namespace Fastbreak\services;

use FastbreakCore\services\ActionService;
use Fastbreak\models\Page;

class PageActions extends ActionService 
{

    public function __construct()
    {
        parent::__construct();
        $this->pagesModel = new Page();
    }

    public function insertPost($data)
    {
        $data = self::sanitizePost($data);
        if ($this->pagesModel->insertPost($data)) {
            $this->notification->setStatus('success');
            $this->notification->setMsg('Your data was successfully saved');
        } else {
            $this->notification->setStatus('failed');
            $this->notification->setMsg('Oops, something went wrong');
        }
    }

}

?>