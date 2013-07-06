<?php

class Model {
	private $user;
	private $pass;
	private $host;
	private $dbName = "bCleff";
	private $conn;
	public $sql;

	public function __construct() {
		$this->user = "root";
		$this->pass = "";
		$this->host = "localhost";
		$this->dbName = "bCleff";
		
		$this->connect();
		$this->init();
	}

	public function connect() {
		$this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbName);
	}

	private function init() {

		// CREATE USERS TABLE
		$query = "CREATE TABLE IF NOT EXISTS users ("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`profileName` VARCHAR(25) NOT NULL, "
				."`first_name` VARCHAR(50) NOT NULL, "
				."`last_name` VARCHAR(50) NOT NULL, "
				."`password` VARCHAR(100) NOT NULL, "
				."`email` VARCHAR(50) NOT NULL, "
				."PRIMARY KEY(id)"
				.");";
		$this->runQuery($query);

		$query = "CREATE TABLE IF NOT EXISTS artists("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`profile_manager` INT NOT NULL, "
				."`name` VARCHAR(50) NOT NULL, "
				."`year_established` INT NOT NULL, "
				."`about` VARCHAR(200), "
				."PRIMARY KEY(id), "
				."FOREIGN KEY(profile_manager) REFERENCES users(id) ON DELETE CASCADE"
				.");";
		$this->runQuery($query);

		//CREATE ALBUMS TABLE
		$query = "CREATE TABLE IF NOT EXISTS albums ("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`artist` INT NOT NULL, "
				."`title` VARCHAR(50) NOT NULL, "
				."`release_date` DATE NOT NULL, "
				."`songs` VARCHAR(50) NOT NULL, "
				."`img` VARCHAR(150), "
				."`days_to_dl`, INT NOT NULL, "
				."`price` DOUBLE, "
				."`notes` VARCHAR(150), "
				."PRIMARY KEY(id), "
				."FOREIGN KEY(artist) REFERENCES users(id) ON DELETE CASCADE"
				.");";
		$this->runQuery($query);

		// CREATE AUDIO TABLE
		$query = "CREATE TABLE IF NOT EXISTS audio ("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`owner` INT NOT NULL, "
				."`title` VARCHAR(50) NOT NULL, "
				."`genre` VARCHAR(15) NOT NULL, "
				."`description` VARCHAR(140) NOT NULL, "
				."`source` VARCHAR(150) NOT NULL, "
				."`sampleAudio_src` VARCHAR(150), "
				."`img` VARCHAR(150), "
				."`is_dl` INT NOT NULL, "
				."`days_to_dl`, INT NOT NULL, "
				."`tags` VARCHAR(150), "
				."`price` DOUBLE, "
				."`notes` VARCHAR(150), "
				."PRIMARY KEY(id), "
				."FOREIGN KEY(owner) REFERENCES users(id) ON DELETE CASCADE"
				.");";
		$this->runQuery($query);

		// CREATE FOLLOW TABLE
		$query = "CREATE TABLE IF NOT EXISTS follows ("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`followee` INT NOT NULL, "
				."`follower` INT NOT NULL, "
				."PRIMARY KEY(id), "
				."FOREIGN KEY(followee) REFERENCES users(id) ON DELETE CASCADE, "
				."FOREIGN KEY(follower) REFERENCES users(id) ON DELETE CASCADE"
				.");";
		$this->runQuery($query);

		// CREATE SALES TABLE
		$query = "CREATE TABLE IF NOT EXISTS sales ("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`date` DATE NOT NULL, "
				."`validity`, INT NOT NULL, "
				."`token` VARCHAR(50) NOT NULL, "
				."`item` INT NOT NULL, "
				."`buyer` INT, " // IF BUYER IS MEMBER
				."PRIMARY KEY(id)"
				.");";
		$this->runQuery($query);

		$query = "CREATE TABLE IF NOT EXISTS news ("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`title` VARCHAR(50) NOT NULL, "
				."`date` DATE NOT NULL, "
				."`img` VARCHAR(150) NOT NULL, "
				."`content` VARCHAR(1500) NOT NULL, "
				."PRIMARY KEY(id)"
				.")";
		$this->runQuery($query);

		$query = "CREATE TABLE IF NOT EXISTS comments("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`author` INT NOT NULL, "
				."`date` DATETIME NOT NULL, "
				."`content` VARCHAR(500) NOT NULL, "
				."`object` INT NOT NULL, "
				."PRIMARY KEY(id), "
				."FOREIGN KEY(author) REFERENCES users(id) ON DELETE CASCADE, "
				."FOREIGN KEY(object) REFERENCES news(id) ON DELETE CASCADE"
				.")";
		$this->runQuery($query);

		// $this->get_dummy();
	}

	private function get_dummy() {
		$query = "INSERT INTO users(`profileName`, `first_name`, `last_name`, `email`, `password`) "
				."VALUES('mongs', 'admin', 'asdf', 'ricardo.emong@gmail.com', 'asdf')";
		$this->runQuery($query);
	}	

	public function insert($table, $values) {
		$head = "INSERT INTO {$table}";
		$columns = "";
		$val = "";
		foreach($values as $key => $k) {
			$columns .= "`".$key."`, ";
			$val .= "'".$k."', ";
		}
		$columns = "(".substr($columns, 0, -2).")";
		$val = "VALUES(".substr($val, 0, -2).");";
		$query = $head.$columns.$val;
		return $this->runQuery($query);
	}

	public function getUserFromID($id) {
		$query = "SELECT * FROM users WHERE id={$id}";
		$result = $this->runQuery($query);
		$row = $result->fetch_array();
		$result->free();
		return $row;
	}

	protected function runQuery($query) {
		if($this->conn->query($query)) return true;
		return false;
	}

	private function runMultiQuery($query) {
		$this->conn->multi_query($query);
	}

}