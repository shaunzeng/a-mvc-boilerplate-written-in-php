<?php

class Error extends Controller{

	function __construct(){
		parent::__construct();
		//echo "This is an error!<br/>";
	}

	public function index(){
		$this->view->msg = 'This page does not exist';
		$this->view->render('error/index');
	}
}