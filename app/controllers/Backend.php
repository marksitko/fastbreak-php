<?php
namespace Fastbreak\controllers;

use Fastbreak\libraries\Controller;

class Backend extends Controller
{

    protected $viewDirectory = 'backend/';

    public function __construct()
    {

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