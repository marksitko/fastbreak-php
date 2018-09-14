<?php
namespace Fastbreak\controllers;

use FastbreakCore\libraries\Controller;
use Fastbreak\services\PageActions;

class Backend extends Controller
{

    protected $viewDirectory = 'backend/';
    private $pageActions;

    public function __construct()
    {
        $this->pagesModel = $this->model('Backend');
        $this->pageActions = new PageActions();
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