<?php
namespace Fastbreak\controllers;

use FastbreakCore\libraries\Controller;
use FastbreakCore\services\RequestService;
use Fastbreak\services\PageActions;

class Pages extends Controller
{
    
    protected $viewDirectory = 'pages/';
    protected $pagesModel;
    private $pageActions;

    public function __construct()
    {
        $this->pagesModel = $this->model('Page');
        $this->pageActions = new PageActions($this->pagesModel);
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome to the FastbreakPHP',
            'body' => 'Pleace check the Documentation to configurate all files',
        ];

        $this->view('index', $data);
    }

    public function contact()
    {   
        $data = [
            'title' => 'Contact',
            'header' => array(
                'description' => '',
            ),
            'body' => 'Pleace check the Documentation to configurate all files',
        ];
        $this->view('contact', $data);
    }

    public function posts()
    {   
        if(RequestService::isPost()) {
            $this->pageActions->insertPost($_POST);
        }
        
        $notification = $this->pageActions->notification->getNotification();
        $data = array(
            'title' => 'Posts',
            'notification' => $notification
        );

        $this->view('posts', $data);
    }

}

?>