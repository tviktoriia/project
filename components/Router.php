<?php
//FRONT CONRTROLLER
class Router
 {
	//маршрути
	private $routes;
	
	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}
    
	//отримуємо строку запроса	
	private function getUri()
	{
		if (!empty($_SERVER['REQUEST_URI'])) 
		{
			return trim($_SERVER['REQUEST_URI'], '/');
	    }
	}
	
	//метод який підключає відповідний контроллер і метод.
	public function run()
	{
		$uri = $this->getUri();
		
		foreach ($this->routes as $uriPattern => $path) 
		{
			if (preg_match("~$uriPattern~", $uri))
			{
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				$segments = explode('/', $internalRoute);
				$cont= array_shift($segments);
				$contr= array_shift($segments);
				$controllerName= array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);
				$actionName = 'action'.ucfirst(array_shift($segments));
				$parameters = $segments;
				$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
				
				if (file_exists($controllerFile))
				{
					include_once($controllerFile);
				}
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				echo $result;
				if ($result!=null)
				{
						break;
				}
			}
		}
	}
 }

