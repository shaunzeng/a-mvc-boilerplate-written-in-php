<?php

class Users extends Controller {

	public $this_user;

	public function __construct() {
		parent::__construct();
		//echo 'We are inside help<br />';
		$logged = Session::get("user_login");
		if ($logged == false){
			Session::destroy();
			header('location:'.URL.'login');
			exit();
		}

		$this->view->js = array('users/js/users.js');
		
		//echo '<script type="text/javascript"> console.log("dashboard controller loaded!");</script>';
	}

	public function index(){
		$this->view->render('users/index');
	}

	public function loadUser($name){
		$this->this_user = $name;
		$this->xhrGetInfo();
		$this->xhrGetPosts();
	}


	public function xhrInsert(){
		$this->model->xhrInsert($this->this_user);

	}

	public function xhrGetPosts(){
		$this->view->this_user_posts = $this->model->xhrGetPosts($this->this_user);
	}

	public function xhrGetInfo(){
		$this->view->this_user_info = $this->model->xhrGetInfo($this->this_user);
	}

}