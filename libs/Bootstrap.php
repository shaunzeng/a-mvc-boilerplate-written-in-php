<?php

class Bootstrap{

	function __construct(){
		
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url,'/');
		$url = filter_var($url,FILTER_SANITIZE_URL);
		$url = explode('/', $url);

		// no url, then direct to index page
		if(empty($url[0])){
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			return false;
		}

		$this->direct($url);
	}

	public function direct($url){

		$file = 'controllers/'.$url[0].'.php';

		if(file_exists($file)){
			require $file;
		} else {
			$this->error();
			return false;
		}

		Session::init();
		$controller = new $url[0];
		$controller->loadModel($url[0]);


		if (isset($url[1]) && $url[0] =='users' ){

			if ($url[1] == Session::get("user_login")){
				header('location:'.URL.'dashboard');
			} else {
				$controller->loadUser($url[1]);
				$controller->index();
				return;
			}
		}

		if (isset($url[2]) && $url[1] != 'users') {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				$this->error();
			}
		} else {
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else {
					$this->error();
				}
			} else {
				$controller->index();
			}
		}
	}

	function error(){
		require 'controllers/error.php';
		$controller = new Error();
		$controller->index();
		return false;
	}
}
