<?php

class Users_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}

	public function xhrInsert($user){

		$post = $_POST['post'];
		$date_added = date("y-m-d");
		$added_by = Session::get('user_login');
		$added_to = Session::get('user_login');
		$sth = $this->db->prepare('INSERT INTO posts VALUE("",:post,:date_added,:added_by,:added_to)');
		$sth->execute(array(
			':post' => $post,
			':date_added' => $date_added,
			':added_by' => $added_by,
			':added_to' => $added_to,
		));

		echo json_encode(array(
			'id'=>'',
			'body'=>$post,
			'date_added'=>$date_added,
			'added_by'=>$added_by,
			'user_posted_to'=>$added_to,
		), TRUE);
	}

	public function xhrGetPosts($user){
		$sth = $this->db->prepare('SELECT * FROM posts WHERE user_posted_to=:user ORDER BY id desc LIMIT 10');
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute(array(':user' => $user));
		$data = $sth->fetchAll();
		return $data;
	}

	public function xhrGetInfo($user){
		$sth = $this->db->prepare('SELECT * FROM users WHERE username = :user');
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute(array(':user' => $user));
		$data = $sth->fetchAll();
		return $data;
	}

}