<?php
namespace Fastbreak\controllers;

use FastbreakCore\libraries\Controller;
use Fastbreak\services\BackendActions;

class Backend extends Controller
{

    protected $viewDirectory = 'backend/';
    private $backendActions;

    public function __construct()
    {
        $this->backendModel = $this->model('Backend');
        $this->backendActions = new BackendActions($this->backendModel);
    }

    public function index()
    {
        $data = [
            'title' => 'Backend',
            'body' => 'Pleace check the Documentation to configurate all files',
        ];

        $this->view('index', $data);
    }

}

?>