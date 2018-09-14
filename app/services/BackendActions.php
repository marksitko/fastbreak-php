<?php
namespace Fastbreak\services;

use FastbreakCore\services\ActionService;
use Fastbreak\models\Backend;

class BackendActions extends ActionService
{

    public function __construct()
    {
        parent::__construct();
        $this->backendModel = new Backend();
    }

}

?>