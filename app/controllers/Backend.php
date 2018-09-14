<?php
namespace Fastbreak\controllers;

use Fastbreak\libraries\Controller;
use Fastbreak\services\ActionService;
use Fastbreak\services\NotificationService;

class Backend extends Controller
{

    protected $viewDirectory = 'backend/';
    private $actionService;

    public function __construct()
    {
        $this->pagesModel = $this->model('Backend');
        $this->actionService = new ActionService();
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