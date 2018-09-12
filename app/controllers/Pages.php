<?php
namespace Fastbreak\controllers;

use Fastbreak\libraries\Controller;

class Pages extends Controller
{

    protected $viewDirectory = 'pages/';
    protected $pagesModel;

    public function __construct()
    {
        $this->pagesModel = $this->model('Page');
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

}

?>