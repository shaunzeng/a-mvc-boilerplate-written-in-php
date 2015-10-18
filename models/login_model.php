<?php 

class Login_Model extends Model
{
	function __construct()
	{
		parent::__construct();
		//echo "login model";
	}

	public function run(){
		
		$login    = $_POST['user_login'];
		$password = $_POST['password_login'];
		
		$sth = $this->db->prepare("SELECT id, role FROM users WHERE username= :login AND password=:password");
		$sth->execute(array(':login' => $login,':password' => $password));

		$data = $sth->fetch();

		$count = $sth->rowCount();

		if ($count >0){
			Session::set('role',$data['role']);
			Session::set('user_login', $login);
			header('location:'.URL.'dashboard');
		} else {
			header('location:'.URL.'login');
		}

	}
}