<?php
namespace Fastbreak\libraries;

class Controller {

	protected $viewDirectory = 'pages/';
	private $defaulModelsNamespace = 'Fastbreak\models\\';

	public function model($model) 
	{
		if (!strpos($model, '\\')) {
			$model = $this->defaulModelsNamespace . $model;
		} 

		if(class_exists($model)) {
			return new $model;
		}
	}

	public function view( $view, $data = array() ) {
		if( file_exists('../app/views/' . $this->viewDirectory . $view . '.php') ) {
			require '../app/views/' . $this->viewDirectory . $view . '.php';
		} else {
			die('View does not exist');
		}

	}

}

?>