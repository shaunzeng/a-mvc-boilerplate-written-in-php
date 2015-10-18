<?php

class Database extends PDO
{
	function __construct()
	{
		parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
	}

	public function insert($table, $data){

	}

	public function update($table, $data, $where){
		foreach ($data as $key=>$value){
			$sth->bindValue(':$key','$value');
		}
	}

	public function delete($table, $where, $limit = 1){
		$sth = $this->prepare('DELETE FROM $table WHERE $where LIMIT $limit');
		return $sth->execute();
	}
}