<?php 


class Help extends Controller {

	function __construct() {
		parent::__construct();
		//echo 'We are inside help<br />';
	}

	public function index(){
		$this->view->render('help/index');
	}


}

