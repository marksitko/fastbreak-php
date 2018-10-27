<?php
namespace FastbreakCore\libraries;

class Controller 
{

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
		if( file_exists( APP_ROOT  . '/views/' . $this->viewDirectory . $view . '.php') ) {
			require APP_ROOT . '/views/' . $this->viewDirectory . $view . '.php';
		} else {
			die('View does not exist');
		}
	}

	public function component($view, $data = array() )
	{
		if (file_exists( APP_ROOT . '/views/components/' . $view . '.php')) {
			include APP_ROOT . '/views/components/' . $view . '.php';
		} else {
			die('Component does not exist');
		}
	}

}

?>