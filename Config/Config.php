<?php 

namespace Config;

class Config {
	
	private $loader;
	private $twig;

	public function render($twig, $vars = array()){
		
		$this->loader = new \Twig_Loader_Filesystem(
			array (
			   __ROOT__ . "web" . __DS__ . "views",
			   __ROOT__ . "web"
				)
		);
		// set up environment
		$params = array(
			'auto_reload' => true, // disable cache
			'autoescape' => true
		);

		$this->twig = new \Twig_Environment($this->loader, $params);
		$assets = array('assets' => __URL__ .'/web/assets');
		$array = array_merge($vars, $assets);
		
		echo $this->twig->render($twig, $array);

	}
}