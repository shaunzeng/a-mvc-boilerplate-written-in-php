<?php

class Controller {

	function __construct(){
		
		$this->view = new View();

		//echo '<script type="text/javascript"> console.log("controller class loaded!");</script>';
	}

	public function loadModel($name){

		$path = 'models/'.$name.'_model.php';

		if (file_exists($path)){
			require $path;
			$modelName = $name.'_Model';
			$this->model = new $modelName;
		}

		//echo '<script type="text/javascript"> console.log("model loaded!");</script>';
	}

}

