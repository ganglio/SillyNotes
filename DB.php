<?php

require_once("sql_db.php");

class DB {

	private $db;
	private $res;

	protected function __constructor() {}
	
	public function __destruct() {}
	
	public function connect($url) {
		$data=parse_url($url);
		$data['path']=substr($data['path'],1);
		
		$this->db = new sql_db($data['host'], $data['user'], $data['pass'], $data['path'], false);
		if(!$this->db->db_connect_id) die(_CRITICAL_ERROR."Could not connect to the database");	
	}
	
	public function query($query,$return=false) {
		$this->res=$this->db->sql_query($query) or die(mysql_error()." $query");
		
		return $this->res;
	}
	
	public function num($res=0) {
		if (!$res)
			$res=$this->res;
		return ($res?$this->db->sql_numrows($res):false);
	}
	
	public function fetch($res=0) {
		if (!$res)
			$res=$this->res;
		return ($res?$this->db->sql_fetchrow($res):false);
	}
	
	public function fetchAll($res=0) {
		if (!$res)
			$res=$this->res;
		while ($row=$this->db->sql_fetchrow($res))
			$rows[]=$row;
		
		return ($res?$rows:false);
	}
	
	public function iterate($fn,$res=0) {
		if (!$res)
			$res=$this->res;
		while ($row=$this->db->sql_fetchrow($res))
			$rows[]=$fn($row);
		
		return ($res?$rows:false);
	}
}

?>
