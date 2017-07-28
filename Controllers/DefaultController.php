<?php 

namespace Controllers;

use Config\Config;
use Entity\Clases1;

/**
* @view "class1"
**/
class DefaultController extends Config {

	public function index() {
			$msj="";
			if($_POST){

				$View = new Clases1();
				$View->setUsuario($_POST['usuario']);
				$View->setPass($_POST['pass']);
				if ($View->save()){
					$msj='Los datos fueron guardados exitosamente.';
				}else{
					$msj='Los campos estan vacios';
				}
			}
			
			$this->render('homepage/index.twig', array(
				'resultado' => $msj
			));
	}
}
