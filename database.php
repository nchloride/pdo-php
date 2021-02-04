<?php
	
	class Database{
		private $server= "localhost";
		private $databasename = "lopez_db";
		private $username = "root";
		private $password = "";
		private $dbconn;
		public function connection (){
			$this->dbconn = new PDO ("mysql:host=".$this->server.";dbname=".$this->databasename,$this->username,$this->password);
			 return $this->dbconn;
		}
	}
?>