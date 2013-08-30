<?php

class SQLHelper {

	protected $user = "root";
	protected $pass = "";
	protected $host = "localhost";
	protected $dbName = "bCleff";
	protected $conn;
	private $sql;

	function __construct() {
		new SQLHelper();
		$this->connect();
	}

	private function connect() {
		try {
			$conn = mysqli_connect($this->$host, $this->$user, $this->$pass, $this->$dbName);
		} catch(Exception $e) {
			echo $e->getMessage();
			$conn = mysqli_connect($this->$host, $this->$user, $this->$pass);
		}
		
	}

	private function init() {
		$query = "CREATE DB IF NOT EXISTS bCleff";
		runQuery($query);

		// CREATE USERS TABLE
		$query = "CREATE TABLE IF NOT EXISTS users ("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`first_name` VARCHAR(50) NOT NULL, "
				."`middle_name`VARCHAR(50) NOT NULL, "
				."`last_name` VARCHAR(50) NOT NULL, "
				."`email` VARCHAR(50) NOT NULL, "
				."PRIMARY KEY(id)"
				.");";

		//CREATE ALBUMS TABLE
		$query .= "CREATE TABLE IF NOT EXISTS albums ("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`artist` INT NOT NULL, "
				."`title` VARCHAR(50) NOT NULL, "
				."`release_date` DATE NOT NULL, "
				."`songs` VARCHAR(50) NOT NULL, "
				."`img` VARCHAR(150), "
				."`price` DOUBLE, "
				."`notes` VARCHAR(150), "
				.");";

		// CREATE AUDIO TABLE
		$query .= "CREATE TABLE IF NOT EXISTS audio ("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`owner` INT NOT NULL, "
				."`title` VARCHAR(50) NOT NULL, "
				."`genre` VARCHAR(15) NOT NULL, "
				."`description` VARCHAR(140) NOT NULL, "
				."`source` VARCHAR(150) NOT NULL, "
				."`sampleAudio_src` VARCHAR(150), "
				."`img` VARCHAR(150), "
				."`is_dl` INT NOT NULL, "
				."`tags` VARCHAR(150), "
				."`price` DOUBLE, "
				."`notes` VARCHAR(150), "
				."PRIMARY KEY(id), "
				."FOREIGN KEY(owner) REFERENCES users(id) ON DELETE CASCADE"
				.");";

		// CREATE FOLLOW TABLE
		$query .= "CREATE TABLE IF NOT EXISTS follows ("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`followee` INT NOT NULL, "
				."`follower` INT NOT NULL, "
				."PRIMARY KEY(id), "
				."FOREIGN KEY(followee) REFERENCES users(id) ON DELETE CASCADE, "
				."FOREIGN KEY(follower) REFERENCES users(id) ON DELETE CASCADE"
				.");";

		// CREATE SALES TABLE
		$query .= "CREATE TABLE IF NOT EXISTS sales ("
				."`id` INT NOT NULL AUTO_INCREMENT, "
				."`date` DATE NOT NULL, "
				."`item` INT NOT NULL, "
				."`buyer` INT, " // IF BUYER IS MEMBER
				."PRIMARY KEY(id)"
				.");";

		runMultiQuery($query);
	}

	public function insert($table, $values) {
		
	}

	protected function runQuery($query) {
		$conn->query($query);
	}

	protected function runMultiQuery($query) {
		$conn->multi_query($query);
	}

}