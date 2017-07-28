<?php 

namespace Config;

class Autoload {

	public static function run() {	
		spl_autoload_register(function($class){	
			$file = "/". str_replace("\\", "/", $class) . ".php";
		
			if (file_exists(dirname(__DIR__) . $file)) {
				include_once(dirname(__DIR__) . $file);
			}else{
				echo "<h2>Error en el auto cargado: ".dirname(__DIR__). $file."</h2>
					  <p>El archivo no se encuetra o no existe</p>";
			}
		});
	}
}

