<?php 

class Login extends Controller{

	function __construct(){
		parent::__construct();
		if(Session::get('user_login')){
			echo '<script type="text/javascript"> window.location.replace("'.URL.'dashboard") </script>';

		}
	}

	public function index(){
		
		$this->view->render('login/index');
	}

	public function run(){

		$this->model->run();
	}
}