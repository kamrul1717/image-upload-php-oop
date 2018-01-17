<?php 

/**
* Database class
*/
class Database{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_NAME;

	public $link;
	public $error;

	function __construct()
	{
		$this->connectDB();
	}

	private function connectDB(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->link){
			$this->error = "Connection Failed.".$this->link->connect_error;
		}
	}

	// Insert Data
	public function insert($data){
		$insert_row = $this->link->query($data) or die($his->link->error.__LINE__);
		if ($insert_row) {
			return $insert_row;
		}else{
			return false;
		}
	}

	//Select Data
	public function select($data){
		$result = $this->link->query($data) or die($his->link->error.__LINE__);
		if ($result->num_rows > 0) {
			return $result;
		}else{
			false;
		}
	}
}


?>