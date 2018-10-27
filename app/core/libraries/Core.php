<?php 
namespace FastbreakCore\libraries;

class Core 
{

	private $currentController;
	private $currentMethod = 'index';
	private $params = array();
	private $url;

	public function __construct() {
		$this->initWithUrl()
		->setController()
		->setMethod()
		->setParams();

		call_user_func_array( [$this->currentController, $this->currentMethod], $this->params );
	}

	private function initWithUrl()
	{
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			$this->setUrl($url);
		}
		return $this;
	}

	private function setUrl($url)
	{
		$this->url = $url;
		return $this;
	}

	private function setController()
	{
		$this->setEntryController();
		if (isset($this->getUrl()[0])) {
			$this->searchForExistingController(ucwords($this->getUrl()[0]));
		} 
		$this->setUrl(array_values($this->getUrl()));
		return $this;
	}

	private function setMethod()
	{
		if (isset($this->getUrl()[0]) && method_exists($this->currentController, $this->createMethodName($this->getUrl()[0])) ) {
			$this->currentMethod = $this->createMethodName($this->getUrl()[0]);
		}
		unset($this->url[0]);
		$this->setUrl(array_values($this->getUrl()));
		return $this;
	}

	private function setParams()
	{
		$this->params = $this->getUrl() ? $this->getUrl() : [];
		return $this;
	}

	private function createMethodName($method)
	{	
		$method = preg_split('/[-_]/', $method);
		$method = array_map(function ($m) {
			return ucwords($m);
		}, $method);
		$method[0] = strtolower($method[0]);
		return implode('', $method);
	}
	
	private function getUrl()
	{
		return (array) $this->url;
	}

	private function setEntryController()
	{
		$content = file_get_contents(APP_ROOT . '/controllers/' . ENTRY_CONTROLLER . '.php');
		$namespace = namespaceByContent($content);
		$entryController = $namespace . '\\' . ENTRY_CONTROLLER;
		$this->currentController = new $entryController;
		return $this;
	}

	private function searchForExistingController($controller)
	{
		if(file_exists(APP_ROOT . '/controllers/' . $controller . '.php')) {
			$content = file_get_contents(APP_ROOT . '/controllers/' . $controller . '.php');
			$namespace = namespaceByContent($content);
			$controller = $namespace . '\\' . $controller;
			if (class_exists($controller)) {
				$this->currentController = new $controller;
				unset($this->url[0]);
			}
		}
		return $this;
	}

}

?>