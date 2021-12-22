<?php 

class Skills{
	
	protected $pdo;

 	public function __construct($pdo){											
	    $this->pdo = $pdo;
	}

	public function getAllSkillsWithSkillType($skillTypeId){
		$stmt = $this->pdo->prepare('SELECT *  FROM `skilldevelopment_skillset` WHERE `skillType` = :skillTypeId');
		$stmt->bindValue(':skillTypeId', $skillTypeId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllSkillsWithSkillId($skillId){
		$stmt = $this->pdo->prepare('SELECT *  FROM `skilldevelopment_skillset` WHERE `skillId` = :skillId');
		$stmt->bindValue(':skillId', $skillId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllSkillsWithSkillIdAndProficiencyId($skillId,$proficiencyId){
		$stmt = $this->pdo->prepare('SELECT *  FROM `skilldevelopment_skillset` WHERE `skillId` = :skillId  and `proficiencyId` = :proficiencyId' );
		$stmt->bindValue(':skillId', $skillId, PDO::PARAM_STR);
		$stmt->bindValue(':proficiencyId', $proficiencyId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllSkillsWithSkillIdAndProficiencyIdAndskillType($skillId,$proficiencyId,$skillType){
		$stmt = $this->pdo->prepare('SELECT *  FROM `skilldevelopment_skillset` WHERE `skillId` = :skillId  and `proficiencyId` = :proficiencyId and `skillType` = :skillType and `Active` in (1)' );
		$stmt->bindValue(':skillId', $skillId, PDO::PARAM_STR);
		$stmt->bindValue(':proficiencyId', $proficiencyId, PDO::PARAM_STR);
		$stmt->bindValue(':skillType', $skillType, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}		

	public function profilejobrole($signum){
		$stmt = $this->pdo->prepare('SELECT * FROM `profilejobrole` WHERE `signum` = :signum ');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}		

	public function getprofileJob($signum,$skillId){
		$stmt = $this->pdo->prepare('SELECT * FROM `profilejobrole` WHERE `signum` = :signum and `skillId` = :skillId');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->bindValue(':skillId', $skillId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getprofileJobWithProficencyAndApproval($signum,$skillId){
		$stmt = $this->pdo->prepare('SELECT * FROM `profilejobrole_with_proficiencyid_approval` WHERE `signum` = :signum and `skillId` = :skillId');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->bindValue(':skillId', $skillId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getprofileBOTID($signum,$BOTID){
		$stmt = $this->pdo->prepare('SELECT * FROM `profilebotlist` WHERE `signum` = :signum and `BOTID` = :BOTID');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->bindValue(':BOTID', $BOTID, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getSkillDetail($EventId){
		$stmt = $this->pdo->prepare('SELECT * FROM `skilldevelopment_skillset` WHERE `eventId` = :EventId ');
		$stmt->bindValue(':EventId', $EventId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getRawSkillData($skillId){
		$stmt = $this->pdo->prepare('SELECT * FROM `skills` WHERE `skillId` = :skillId ');
		$stmt->bindValue(':skillId', $skillId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}			

	public function getAllQuestion($EventId){
		$stmt = $this->pdo->prepare('SELECT *  FROM `quiz` WHERE `EventId` = :EventId ORDER BY RAND()');
		$stmt->bindValue(':EventId', $EventId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getscorecard($signum,$eventId){
		$stmt = $this->pdo->prepare('SELECT max(score) as score FROM `scorecard` WHERE `signum` = :signum and `eventId` = :eventId');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->bindValue(':eventId', $eventId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function noOfPersonRegistered($eventId){
		$stmt = $this->pdo->prepare('SELECT count(Signum) as registered FROM `skilldevelopment_userandsessionmapping` WHERE `eventId` = :eventId');
		$stmt->bindValue(':eventId', $eventId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}	

	public function isRegisteredforSession($signum,$eventId){
		$stmt = $this->pdo->prepare('SELECT * FROM `skilldevelopment_userandsessionmapping` WHERE `Signum` = :signum and `eventId` = :eventId');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->bindValue(':eventId', $eventId, PDO::PARAM_STR);
		$stmt->execute();
		$isRegisteredforSession = $stmt->rowCount();
		if($isRegisteredforSession > 0){
			return true;
		    exit;
		}else{
			return false;
		    exit;
		}
	}	

	public function geturl($eventId){
		$stmt = $this->pdo->prepare('SELECT url FROM `url` WHERE `eventId` = :eventId');
		$stmt->bindValue(':eventId', $eventId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}	

	public function getDetailscorecard($signum,$eventId){
		$stmt = $this->pdo->prepare('SELECT * FROM `scorecard` WHERE `signum` = :signum and `eventId` = :eventId');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->bindValue(':eventId', $eventId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}	

	public function getAllProfficency(){
		$stmt = $this->pdo->prepare('select * from proficiency');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getProfficency($PId){
		$stmt = $this->pdo->prepare('SELECT * from `proficiency` WHERE `PId` = :PId');
		$stmt->bindValue(':PId', $PId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}	

	public function getProfficency_with_proficiencyid_approval($PId,$Signum){
		$stmt = $this->pdo->prepare('SELECT * from `profilejobrole_with_proficiencyid_approval` WHERE `skillId` = :PId and  `signum` = :signum ');
		$stmt->bindValue(':PId', $PId, PDO::PARAM_STR);
		$stmt->bindValue(':signum', $Signum, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getAllscorecard(){
		$stmt = $this->pdo->prepare('select * from scorecard');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function skillQs($signum){
		$stmt = $this->pdo->prepare("select a.skillId,a.personal,b.topper from (
					(select sks.skillId, max(sc.score) as personal from scorecard as sc,skilldevelopment_skillset as sks  where sc.eventId = sks.eventId and sc.signum = '".$signum."' group by sks.skillId ) as a,
					(select sks.skillId, max(sc.score) as topper from scorecard as sc,skilldevelopment_skillset as sks  where sc.eventId = sks.eventId  group by sks.skillId ) as b ) where 
					a.skillId = b.skillId");
		$stmt->execute();
		//var_dump($stmt->errorInfo());
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}		

	public function updateprofilejobrole($table, $Id, $fields){
		$columns = '';
		$i       = 1;

		foreach ($fields as $name => $value) {
			$columns .= "`{$name}` = :{$name} ";
			if($i < count($fields)){
				$columns .= ', ';
			}
			$i++;
		}
		$sql = "UPDATE {$table} SET {$columns} WHERE `Id` = '{$Id}'";
		if($stmt = $this->pdo->prepare($sql)){
			foreach ($fields as $key => $value) {
				$stmt->bindValue(':'.$key, $value);
			}
			$stmt->execute();
			//var_dump($stmt->errorInfo());
			if($stmt->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}
	}

	public function skillData($signum){
		$stmt = $this->pdo->prepare('SELECT * FROM `profilejobrole` WHERE `signum` = :signum');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function skillData_with_proficiencyid_approval($signum){
		$stmt = $this->pdo->prepare('SELECT * FROM `profilejobrole_with_proficiencyid_approval` WHERE `signum` = :signum');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}	

	public function getAllSkills(){
		$stmt = $this->pdo->prepare('SELECT * FROM `skills` Where Active in (1)');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getDetailSkills($skillId){
		$stmt = $this->pdo->prepare('SELECT * FROM `skills` WHERE `skillId` = :skillId');
		$stmt->bindValue(':skillId', $skillId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getprofileJobs($signum){
		$stmt = $this->pdo->prepare('SELECT * FROM `profilejobrole` WHERE `signum` = :signum');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}			
     
}
?>		