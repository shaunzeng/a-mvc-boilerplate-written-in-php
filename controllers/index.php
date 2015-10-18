<?php 

class Index extends Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->view->msg = 'This is index page';
		$this->view->render('index/index');
	}

}

