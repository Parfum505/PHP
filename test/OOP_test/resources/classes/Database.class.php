<?php
/**
*
*/
class Database
{
	private $host	= DB_HOST;
	private $user	= DB_USER;
	private $pass	= DB_PASS;
	private $dbname	= DB_NAME;

	private $dbh;
	private $error;
	private $stmt;

	function __construct()
	{
		$dsn = 'mysql:host='. $this->host . ';dbname='. $this->dbname;
		$options = array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		} catch(PDOEception $e){
			$this->error = $e->getMessage();
			die ('Connection failed: '. $e->getMessage());
		}
	}
	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}
	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
					default:
					$type = PDO::PARAM_STR;
			}
		}
		return $stmt->bindValue($param, $value, $type);
	}
	public function execute($stmt){
		return $stmt->execute();
	}
	public function resultset($stmt){
		$stmt = execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}