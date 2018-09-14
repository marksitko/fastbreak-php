<?php
namespace Fastbreak\controllers;

use Fastbreak\libraries\Controller;
use Fastbreak\services\ActionService;
use Fastbreak\services\NotificationService;

class Pages extends Controller
{
    
    protected $viewDirectory = 'pages/';
    protected $pagesModel;
    private $actionService;

    public function __construct()
    {
        $this->pagesModel = $this->model('Page');
        $this->actionService = new ActionService();
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
        if(ActionService::isPostRequest()) {
            $_POST = ActionService::sanitizePost();
            $this->actionService->insertPost($_POST);
        }
        
        $notification = NotificationService::getNotification();
        $data = array(
            'title' => 'Posts',
            'notification' => $notification
        );

        $this->view('posts', $data);
    }

}

?>