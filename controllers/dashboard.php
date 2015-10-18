<?php

class Dashboard extends Controller {

	public function __construct() {
		parent::__construct();
		//echo 'We are inside help<br />';
		$logged = Session::get("user_login");
		if ($logged == false){
			Session::destroy();
			header('location:'.URL.'login');
			exit();
		}

		$this->view->js = array('dashboard/js/dashboard.js');
		
		//echo '<script type="text/javascript"> console.log("dashboard controller loaded!");</script>';
	}

	public function index(){
		$this->view->render('dashboard/index');
	}

	public function logout() {
		
		Session::destroy();
		header('location:'.URL.'login');
		exit();
	}

	public function xhrInsert(){
		$this->model->xhrInsert();

	}

	public function xhrGetPosts(){
		$this->model->xhrGetPosts();
	}

	public function loginUserInfo(){

		$this->model->loginUserInfo();
	}

}
