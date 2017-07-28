<?php 
namespace Config;

class Router extends Config{
	
	public function __construct(Request $request) {
		
		$controller = $request->getController();
		$method = ($request->getMethod()) ? $request->getMethod() : "index" ;
		$argument = $request->getArgument();
		$route = __ROOT_CONTROLLER__ . $controller .".php";
		
		if(file_exists($route)){
			$view = explode('"',strstr(file_get_contents($route),"@view"));
			
			if($view[1] == $request->getView()){
				$class_controller = "Controllers\\" . $controller;

				$object = new $class_controller;

					if (method_exists($object, $method)) {
					    if(empty($argument)){
							$data = call_user_func(array($object, $method));
						}else{
							$data = call_user_func_array(array($object, $method), explode('&', $argument));
						}
					}else{
						$this->render("errors/error-404.twig");
					}
				
			}else{
				$this->render("errors/error-404.twig");
			}
		}else{
			$this->render("errors/error-404.twig");
		}
	
	}
}
