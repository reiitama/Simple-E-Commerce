<?php
	
class database{
	//property 1
	private $dbhost;
	private $dbuser;
	private $dbpassword;
	private $dbname;
	public $dbkonek;

	// constructor setting property 2
	function __construct($host, $user, $pass, $db){
		$this->dbhost = $host;
		$this->dbuser = $user;
		$this->dbpassword = $pass;
		$this->dbname = $db;
	}

	// method koneksi ke MySQL 3
	function connectMySQL(){
		$this->dbkonek = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpassword,$this->dbname);

		return $this->dbkonek;
	}
	// membuat method filterinput 6 
	function filterinput($data){
		return mysqli_real_escape_string($this->dbkonek,$data);// memfilter keamana data
	}	
}
?>