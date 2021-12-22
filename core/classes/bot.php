<?php 

class Bots{
	
	protected $pdo;

 	public function __construct($pdo){											
	    $this->pdo = $pdo;
	}

	public function getAllBotList(){
		$stmt = $this->pdo->prepare('SELECT * FROM `botrawdump`');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}	

}
?>