<?php 

class Interview{
	
	protected $pdo;

 	public function __construct($pdo){											
	    $this->pdo = $pdo;
	}

	public function applicantExist($email,$telephone){
		$stmt = $this->pdo->prepare("SELECT `ApplicantId` FROM `hiring_applicants_external_hiring` WHERE `emailId` = :email or `phno` = :telephone ");
		$stmt->bindValue(':email', $email, PDO::PARAM_STR);
		$stmt->bindValue(':telephone', $telephone, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}

	public function checkInput($data){
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripcslashes($data);
		return $data;
	}

	public function create($table, $fields = array()){
		$columns = implode(',', array_keys($fields));
		$values  = ':'.implode(', :', array_keys($fields));
		$sql     = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

		if($stmt = $this->pdo->prepare($sql)){
			foreach ($fields as $key => $data) {
				$stmt->bindValue(':'.$key, $data);
			}
			$stmt->execute();
			//var_dump($stmt->errorInfo());
			return $this->pdo->lastInsertId();
		}
	}

	public function createonupdate($table, $fields = array()){
		$columns = implode(',', array_keys($fields));
		$values  = ':'.implode(', :', array_keys($fields));
		$onDupKeyUpdate = '';
		$i       = 1;
		foreach ($fields as $name => $value) {
			$onDupKeyUpdate .= "`{$name}` = VALUES({$name})";
			if($i < count($fields)){
				$onDupKeyUpdate .= ', ';
			}
			$i++;
		}

		$sql     = "INSERT INTO {$table} ({$columns}) VALUES ({$values}) ON DUPLICATE KEY UPDATE {$onDupKeyUpdate}";
		if($stmt = $this->pdo->prepare($sql)){
			foreach ($fields as $key => $data) {
				$stmt->bindValue(':'.$key, $data);
			}
			$stmt->execute();

			//var_dump($stmt->errorInfo());
			return $this->pdo->lastInsertId();
		}
	}		


	public function getAllHiringType_withtypeofinterview($HiringType){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_typeofinterview`  WHERE `HiringType` = :HiringType');
		$stmt->bindValue(':HiringType', $HiringType, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllVendors(){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_vendor_skills` Where Active in (1)');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllTechnology(){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_technology_skills` Where Active in (1) ');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}	

	public function getAllSkills(){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_skills` ');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllHiringType_withtypeofSubType($Id){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_typeofinterview`  WHERE `Id` = :Id');
		$stmt->bindValue(':Id', $Id, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}	

	public function getAllHiringType(){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_typeofinterview` ');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function get_hiring_assesmentcriteria_list($InterviewId){
		$stmt = $this->pdo->prepare('SELECT * FROM hiring_assesmentcriteria WHERE `InterviewId` = :InterviewId ');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function get_applicant_list($InterviewId){
		$stmt = $this->pdo->prepare('SELECT * FROM hiring_applicants WHERE `InterviewId` = :InterviewId ');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function get_applicant_external_hiring_list($InterviewId){
		$stmt = $this->pdo->prepare('SELECT * FROM hiring_applicants_external_hiring WHERE `InterviewId` = :InterviewId ');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}			

	public function getAllHiringType_withId($Id){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_typeofinterview`  WHERE `Id` = :Id');
		$stmt->bindValue(':Id', $Id, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getAllFeedback_External($Id){
		$stmt = $this->pdo->prepare('SELECT B.Area,GROUP_CONCAT(A.Remarks) AS Remarks FROM hiring_assessmentrawresult_external_hiring AS A, hiring_assesmentcriteria AS B WHERE ApplicantId = :Id AND A.AssCriteriaId = B.AssCriteriaId GROUP BY B.Area');
		$stmt->bindValue(':Id', $Id, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllskillvendors($emailId){
		$stmt = $this->pdo->prepare('SELECT B.technology,A.level from hiring_profiletechnology AS A,hiring_technology_skills AS B WHERE emailId = :emailId AND A.skillId = B.skillId');
		$stmt->bindValue(':emailId', $emailId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getOwnershipDetails($Signum,$InterviewId,$OwnerShip){
		$stmt = $this->pdo->prepare('SELECT * FROM hiring_interviewownerlist WHERE `OwnerShip` = :OwnerShip AND `InterviewId` = :InterviewId AND `Signum` = :Signum');
		$stmt->bindValue(':Signum', $Signum, PDO::PARAM_STR);
		$stmt->bindValue(':OwnerShip', $OwnerShip, PDO::PARAM_STR);
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getOwnersOfTheIterview($InterviewId){
		$stmt = $this->pdo->prepare('SELECT * FROM hiring_interviewownerlist WHERE OwnerShip IN (1) AND `InterviewId` = :InterviewId ');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getPanelManagersOfTheIterview($InterviewId){
		$stmt = $this->pdo->prepare('SELECT * FROM hiring_interviewownerlist WHERE OwnerShip IN (2) AND `InterviewId` = :InterviewId ');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}			

	public function getAllInterviews(){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_interviewlist` ');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllInterviews_userspecific($Signum,$InterviewType){
		$QUERRY = "SELECT * FROM `hiring_interviewlist` WHERE InterviewType IN (".$InterviewType.") AND InterviewId IN (SELECT DISTINCT InterviewId FROM hiring_interviewownerlist WHERE Signum IN ('".$Signum."') )";
		$stmt = $this->pdo->prepare($QUERRY);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllInterviews_external_Active($InterviewType){
		$QUERRY = "SELECT * FROM `hiring_interviewlist` WHERE InterviewType IN (".$InterviewType.") and Status <> 1";
		$stmt = $this->pdo->prepare($QUERRY);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


	public function getAllUserAttendatedInterviews($Signum,$InterviewId){
		$QUERRY = "SELECT * FROM hiring_applicants WHERE signum IN ('".$Signum."') AND result IN (1,2,3,-1) AND InterviewId <> ".$InterviewId.";";
		$stmt = $this->pdo->prepare($QUERRY);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllUserAttendatedInterviews_externalhiring($emailId,$InterviewId){
		$QUERRY = "SELECT * FROM hiring_applicants_external_hiring WHERE emailId IN ('".$emailId."') AND result IN (1,2,3,-1) ;";
		//$QUERRY = "SELECT * FROM hiring_applicants_external_hiring WHERE emailId IN ('".$emailId."') AND result IN (-1,2,1) AND InterviewId <> ".$InterviewId.";";
		$stmt = $this->pdo->prepare($QUERRY);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}		

	public function getAllInterviews_userspecifictopanelmember($Signum){
		$QUERRY = "SELECT * FROM hiring_interviewlist WHERE InterviewId IN (SELECT DISTINCT InterviewId FROM hiring_applicants WHERE ApplicantId IN (SELECT DISTINCT ApplicantId FROM hiring_panelmember WHERE Signum IN ('".$Signum."')))";
		$stmt = $this->pdo->prepare($QUERRY);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllInterviews_externalhiring_userspecifictopanelmember($Signum){
		$QUERRY = "SELECT * FROM hiring_interviewlist WHERE InterviewId IN (SELECT DISTINCT InterviewId FROM hiring_applicants_external_hiring WHERE ApplicantId IN (SELECT DISTINCT ApplicantId FROM hiring_panelmember_external_hiring WHERE Signum IN ('".$Signum."')))";
		$stmt = $this->pdo->prepare($QUERRY);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}	

	public function getCriterias($InterviewId,$JobStage,$Round,$AsserId){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_assesmentcriteria` WHERE `InterviewId` = :InterviewId and JobStage = :JobStage and Round = :Round and AsserId = :AsserId');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->bindValue(':JobStage', $JobStage, PDO::PARAM_STR);
		$stmt->bindValue(':Round', $Round, PDO::PARAM_STR);
		$stmt->bindValue(':AsserId', $AsserId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getRAWResult($ApplicantId,$assesername,$jobrequestionId,$AsserId,$ApplicantSignum,$AssCriteriaId){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_assessmentrawresult` WHERE `ApplicantId` = :ApplicantId And `assesername` = :assesername And `jobrequestionId` = :jobrequestionId And `AsserId` = :AsserId And `ApplicantSignum` = :ApplicantSignum And `AssCriteriaId` = :AssCriteriaId ');
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->bindValue(':assesername', $assesername, PDO::PARAM_STR);
		$stmt->bindValue(':jobrequestionId', $jobrequestionId, PDO::PARAM_STR);
		$stmt->bindValue(':AsserId', $AsserId, PDO::PARAM_STR);
		$stmt->bindValue(':ApplicantSignum', $ApplicantSignum, PDO::PARAM_STR);
		$stmt->bindValue(':AssCriteriaId', $AssCriteriaId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getRAWResult_ExternalHiring($ApplicantId,$assesername,$jobrequestionId,$AsserId,$AssCriteriaId){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_assessmentrawresult_external_hiring` WHERE `ApplicantId` = :ApplicantId And `assesername` = :assesername And `jobrequestionId` = :jobrequestionId And `AsserId` = :AsserId And `AssCriteriaId` = :AssCriteriaId ');
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->bindValue(':assesername', $assesername, PDO::PARAM_STR);
		$stmt->bindValue(':jobrequestionId', $jobrequestionId, PDO::PARAM_STR);
		$stmt->bindValue(':AsserId', $AsserId, PDO::PARAM_STR);
		$stmt->bindValue(':AssCriteriaId', $AssCriteriaId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}			

	public function getPanel_member_Details($Signum,$ApplicantId){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_panelmember` WHERE `Signum` = :Signum and ApplicantId = :ApplicantId ');
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->bindValue(':Signum', $Signum, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getPanel_member_ExternalHiring_Details($Signum,$ApplicantId){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_panelmember_external_hiring` WHERE `Signum` = :Signum and ApplicantId = :ApplicantId ');
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->bindValue(':Signum', $Signum, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}				

	public function getAllRoundsForExternalHiring($InterviewId){
		$stmt = $this->pdo->prepare('SELECT DISTINCT Round FROM hiring_applicants_external_hiring WHERE `InterviewId` = :InterviewId');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllRoundsForInternalHiring($InterviewId){
		$stmt = $this->pdo->prepare('SELECT DISTINCT Round FROM hiring_applicants WHERE `InterviewId` = :InterviewId');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}	

	public function getAllPanelMemberStatusExternalHiring($InterviewId,$Round){
			$stmt = $this->pdo->prepare('SELECT TP.Signum, ifnull(TP.TOTALAPPLICANT,0) AS TOTALAPPLICANT, ifnull(C.COMPLETED,0) AS COMPLETED, ifnull(P.PENDING,0) AS PENDING FROM 
				(SELECT Signum,COUNT(ApplicantId) AS TOTALAPPLICANT FROM hiring_panelmember_external_hiring 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants_external_hiring WHERE InterviewId = :InterviewId AND ROUND = :Round) GROUP BY Signum) AS TP
				LEFT JOIN 
				(SELECT Signum,COUNT(ApplicantId) AS COMPLETED FROM hiring_panelmember_external_hiring 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants_external_hiring WHERE InterviewId = :InterviewId AND ROUND = :Round) 
				AND ISInterviewPending IN(1) GROUP BY Signum) AS C 
				ON TP.Signum = C.Signum
				LEFT JOIN 
				(SELECT Signum,COUNT(ApplicantId) AS PENDING FROM hiring_panelmember_external_hiring 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants_external_hiring WHERE InterviewId = :InterviewId AND ROUND = :Round) 
				AND ISInterviewPending IN(-2,-1) GROUP BY Signum) AS P
				ON TP.Signum = P.Signum ORDER BY P.PENDING DESC ');
				$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
				$stmt->bindValue(':Round', $Round, PDO::PARAM_STR);
				$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllPanelMemberStatusInternalHiring($InterviewId,$Round){
			$stmt = $this->pdo->prepare('SELECT TP.Signum, ifnull(TP.TOTALAPPLICANT,0) AS TOTALAPPLICANT, ifnull(C.COMPLETED,0) AS COMPLETED, ifnull(P.PENDING,0) AS PENDING FROM 
				(SELECT Signum,COUNT(ApplicantId) AS TOTALAPPLICANT FROM hiring_panelmember 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants WHERE InterviewId = :InterviewId AND ROUND = :Round) GROUP BY Signum) AS TP
				LEFT JOIN 
				(SELECT Signum,COUNT(ApplicantId) AS COMPLETED FROM hiring_panelmember 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants WHERE InterviewId = :InterviewId AND ROUND = :Round) 
				AND ISInterviewPending IN(1) GROUP BY Signum) AS C 
				ON TP.Signum = C.Signum
				LEFT JOIN 
				(SELECT Signum,COUNT(ApplicantId) AS PENDING FROM hiring_panelmember 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants WHERE InterviewId = :InterviewId AND ROUND = :Round) 
				AND ISInterviewPending IN(-2,-1) GROUP BY Signum) AS P
				ON TP.Signum = P.Signum ORDER BY P.PENDING DESC ');
				$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
				$stmt->bindValue(':Round', $Round, PDO::PARAM_STR);
				$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


	public function getAllPanelMemberStatusInternal_FreePanel($InterviewId,$Round){
			$stmt = $this->pdo->prepare('SELECT TP.Signum, ifnull(TP.TOTALAPPLICANT,0) AS TOTALAPPLICANT, ifnull(C.COMPLETED,0) AS COMPLETED, ifnull(P.PENDING,0) AS PENDING FROM 
				(SELECT Signum,COUNT(ApplicantId) AS TOTALAPPLICANT FROM hiring_panelmember 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants WHERE InterviewId = :InterviewId AND ROUND = :Round) GROUP BY Signum) AS TP
				LEFT JOIN 
				(SELECT Signum,COUNT(ApplicantId) AS COMPLETED FROM hiring_panelmember 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants WHERE InterviewId = :InterviewId AND ROUND = :Round) 
				AND ISInterviewPending IN(1) GROUP BY Signum) AS C 
				ON TP.Signum = C.Signum
				LEFT JOIN 
				(SELECT Signum,COUNT(ApplicantId) AS PENDING FROM hiring_panelmember 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants WHERE InterviewId = :InterviewId AND ROUND = :Round) 
				AND ISInterviewPending IN(-2,-1) GROUP BY Signum) AS P
				ON TP.Signum = P.Signum ORDER BY P.PENDING ASC LIMIT 8 ');
				$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
				$stmt->bindValue(':Round', $Round, PDO::PARAM_STR);
				$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllPanelMemberStatusExternalHiring_FreePanel($InterviewId,$Round){
			$stmt = $this->pdo->prepare('SELECT TP.Signum, ifnull(TP.TOTALAPPLICANT,0) AS TOTALAPPLICANT, ifnull(C.COMPLETED,0) AS COMPLETED, ifnull(P.PENDING,0) AS PENDING FROM 
				(SELECT Signum,COUNT(ApplicantId) AS TOTALAPPLICANT FROM hiring_panelmember_external_hiring 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants_external_hiring WHERE InterviewId = :InterviewId AND ROUND = :Round) GROUP BY Signum) AS TP
				LEFT JOIN 
				(SELECT Signum,COUNT(ApplicantId) AS COMPLETED FROM hiring_panelmember_external_hiring 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants_external_hiring WHERE InterviewId = :InterviewId AND ROUND = :Round) 
				AND ISInterviewPending IN(1) GROUP BY Signum) AS C 
				ON TP.Signum = C.Signum
				LEFT JOIN 
				(SELECT Signum,COUNT(ApplicantId) AS PENDING FROM hiring_panelmember_external_hiring 
				WHERE ApplicantId IN (SELECT ApplicantId FROM hiring_applicants_external_hiring WHERE InterviewId = :InterviewId AND ROUND = :Round) 
				AND ISInterviewPending IN(-2,-1) GROUP BY Signum) AS P
				ON TP.Signum = P.Signum ORDER BY P.PENDING ASC LIMIT 8 ');
				$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
				$stmt->bindValue(':Round', $Round, PDO::PARAM_STR);
				$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}		

	public function getAllApplicantCountsExternalHiring($InterviewId,$Round){
			$stmt = $this->pdo->prepare('SELECT ifnull(APPLICANTCOUNT.NoC,0) AS APPLICANTCOUNT,ifnull(COMPLETED.NoC,0) AS COMPLETED,ifnull(REJECTED.NoC,0) AS REJECTED,ifnull(STANDBY.NoC,0) AS STANDBY,ifnull(OKONROLL.NoC,0) AS OKONROLL,ifnull(OKARP.NoC,0) AS OKARP FROM (
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants_external_hiring WHERE `InterviewId` = :InterviewId AND `Round` = :Round) AS APPLICANTCOUNT,
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants_external_hiring WHERE `InterviewId` = :InterviewId AND `Round` = :Round AND result IN (1,-1,2,3)) AS COMPLETED,
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants_external_hiring WHERE `InterviewId` = :InterviewId AND `Round` = :Round AND result IN (-1)) AS REJECTED,
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants_external_hiring WHERE `InterviewId` = :InterviewId AND `Round` = :Round AND result IN (2)) AS STANDBY,
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants_external_hiring WHERE `InterviewId` = :InterviewId AND `Round` = :Round AND result IN (1)) AS OKONROLL,
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants_external_hiring WHERE `InterviewId` = :InterviewId AND `Round` = :Round AND result IN (3)) AS OKARP)');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->bindValue(':Round', $Round, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}	

	public function getAllApplicantCountsInternalHiring($InterviewId,$Round){
			$stmt = $this->pdo->prepare('SELECT ifnull(APPLICANTCOUNT.NoC,0) AS APPLICANTCOUNT,ifnull(COMPLETED.NoC,0) AS COMPLETED,ifnull(REJECTED.NoC,0) AS REJECTED,ifnull(STANDBY.NoC,0) AS STANDBY,ifnull(OKONROLL.NoC,0) AS OKONROLL,ifnull(OKARP.NoC,0) AS OKARP FROM (
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants WHERE `InterviewId` = :InterviewId AND `Round` = :Round) AS APPLICANTCOUNT,
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants WHERE `InterviewId` = :InterviewId AND `Round` = :Round AND result IN (1,-1,2,3)) AS COMPLETED,
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants WHERE `InterviewId` = :InterviewId AND `Round` = :Round AND result IN (-1)) AS REJECTED,
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants WHERE `InterviewId` = :InterviewId AND `Round` = :Round AND result IN (2)) AS STANDBY,
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants WHERE `InterviewId` = :InterviewId AND `Round` = :Round AND result IN (1)) AS OKONROLL,
	(SELECT COUNT(ApplicantId) AS NoC FROM hiring_applicants WHERE `InterviewId` = :InterviewId AND `Round` = :Round AND result IN (3)) AS OKARP)');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->bindValue(':Round', $Round, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getAllMappingApplicantCountsExternalHiring($InterviewId,$Round){
			$stmt = $this->pdo->prepare('SELECT Count(A.ApplicantId) AS APPLICANTCOUNT,Count(B.ApplicantId) AS COMPLETED FROM 
			(SELECT DISTINCT ApplicantId FROM hiring_applicants_external_hiring WHERE ROUND = :Round AND InterviewId = :InterviewId ) AS A LEFT JOIN
			(SELECT DISTINCT ApplicantId from hiring_panelmember_external_hiring) AS B
			ON A.ApplicantId = B.ApplicantId');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->bindValue(':Round', $Round, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getAllMappingApplicantCountsInternalHiring($InterviewId,$Round){
			$stmt = $this->pdo->prepare('SELECT Count(A.ApplicantId) AS APPLICANTCOUNT,Count(B.ApplicantId) AS COMPLETED FROM 
			(SELECT DISTINCT ApplicantId FROM hiring_applicants WHERE ROUND = :Round AND InterviewId = :InterviewId ) AS A LEFT JOIN
			(SELECT DISTINCT ApplicantId from hiring_panelmember) AS B
			ON A.ApplicantId = B.ApplicantId');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->bindValue(':Round', $Round, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getInterviewDetails($InterviewId){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_interviewlist` WHERE `InterviewId` = :InterviewId');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getSummaryScore_Chairman_Round($ApplicantId){
		$stmt = $this->pdo->prepare('select C.ApplicantId,C.ApplicantSignum,C.jobrequestionId,C.AsserId,ROUND(Sum(C.Score),2) AS Score, MAX(C.maxval) AS maxval FROM(
		select A.ApplicantId,A.ApplicantSignum,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area,ROUND((Avg(A.AssValue)*B.Weightage/100),4) as Score,
		B.maxval from hiring_assessmentrawresult as A,hiring_assesmentcriteria as B where A.ApplicantId IN ('.$ApplicantId.') and B.AsserId IN (1)
		and A.AssCriteriaId = B.AssCriteriaId 
		group by A.ApplicantId,A.ApplicantSignum,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area) as C
		group by C.ApplicantId,C.ApplicantSignum,C.jobrequestionId,C.AsserId');
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getSummaryScore_ExternalHiring_Chairman_Round($ApplicantId){
		$stmt = $this->pdo->prepare('select C.ApplicantId,C.ApplicantEmailId,C.jobrequestionId,C.AsserId,ROUND(Sum(C.Score),2) AS Score, MAX(C.maxval) AS maxval FROM(
		select A.ApplicantId,A.ApplicantEmailId,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area,ROUND((Avg(A.AssValue)*B.Weightage/100),4) as Score,
		B.maxval from hiring_assessmentrawresult_external_hiring as A,hiring_assesmentcriteria as B where A.ApplicantId IN ('.$ApplicantId.') and B.AsserId IN (1)
		and A.AssCriteriaId = B.AssCriteriaId 
		group by A.ApplicantId,A.ApplicantEmailId,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area) as C
		group by C.ApplicantId,C.ApplicantEmailId,C.jobrequestionId,C.AsserId');
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}	

	public function getSummaryScore_SME_Round($ApplicantId){
		$stmt = $this->pdo->prepare('select C.ApplicantId,C.ApplicantSignum,C.jobrequestionId,C.AsserId,ROUND(Sum(C.Score),2) AS Score, MAX(C.maxval) AS maxval FROM(
		select A.ApplicantId,A.ApplicantSignum,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area,ROUND((Avg(A.AssValue)*B.Weightage/100),4) as Score,
		B.maxval from hiring_assessmentrawresult as A,hiring_assesmentcriteria as B where A.ApplicantId IN ('.$ApplicantId.') and B.AsserId IN (2)
		and A.AssCriteriaId = B.AssCriteriaId 
		group by A.ApplicantId,A.ApplicantSignum,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area) as C
		group by C.ApplicantId,C.ApplicantSignum,C.jobrequestionId,C.AsserId');
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getSummaryScore_ExternalHiring_SME_Round($ApplicantId){
		$stmt = $this->pdo->prepare('select C.ApplicantId,C.ApplicantEmailId,C.jobrequestionId,C.AsserId,ROUND(Sum(C.Score),2) AS Score, MAX(C.maxval) AS maxval FROM(
		select A.ApplicantId,A.ApplicantEmailId,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area,ROUND((Avg(A.AssValue)*B.Weightage/100),4) as Score,
		B.maxval from hiring_assessmentrawresult_external_hiring as A,hiring_assesmentcriteria as B where A.ApplicantId IN ('.$ApplicantId.') and B.AsserId IN (2)
		and A.AssCriteriaId = B.AssCriteriaId 
		group by A.ApplicantId,A.ApplicantEmailId,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area) as C
		group by C.ApplicantId,C.ApplicantEmailId,C.jobrequestionId,C.AsserId');
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getDetailScore_Chairman_Round($ApplicantId){
		$stmt = $this->pdo->prepare('select A.ApplicantId,A.ApplicantSignum,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area,B.SubArea,
		ROUND((Avg(A.AssValue)*B.Weightage/100),3) as Score, ROUND((B.maxval*B.Weightage/100),2) as MaxScore,B.Weightage 
		from hiring_assessmentrawresult as A,hiring_assesmentcriteria as B where A.ApplicantId in ('.$ApplicantId.')  AND B.AsserId IN (1)
		and A.AssCriteriaId = B.AssCriteriaId
		group by A.ApplicantId,A.ApplicantSignum,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.SubArea;');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getDetailScore_ExternalHiring_Chairman_Round($ApplicantId){
		$stmt = $this->pdo->prepare('select A.ApplicantId,A.ApplicantEmailId,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area,B.SubArea,
		ROUND((Avg(A.AssValue)*B.Weightage/100),3) as Score, ROUND((B.maxval*B.Weightage/100),2) as MaxScore,B.Weightage 
		from hiring_assessmentrawresult_external_hiring as A,hiring_assesmentcriteria as B where A.ApplicantId in ('.$ApplicantId.')  AND B.AsserId IN (1)
		and A.AssCriteriaId = B.AssCriteriaId
		group by A.ApplicantId,A.ApplicantEmailId,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.SubArea;');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getDetailScore_SME_Round($ApplicantId){
		$stmt = $this->pdo->prepare('select A.ApplicantId,A.ApplicantSignum,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area,B.SubArea,
		ROUND((Avg(A.AssValue)*B.Weightage/100),3) as Score, ROUND((B.maxval*B.Weightage/100),2) as MaxScore,B.Weightage 
		from hiring_assessmentrawresult as A,hiring_assesmentcriteria as B where A.ApplicantId in ('.$ApplicantId.')  AND B.AsserId IN (2)
		and A.AssCriteriaId = B.AssCriteriaId
		group by A.ApplicantId,A.ApplicantSignum,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.SubArea;');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getDetailScore_ExternalHiring_SME_Round($ApplicantId){
		$stmt = $this->pdo->prepare('select A.ApplicantId,A.ApplicantEmailId,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.Area,B.SubArea,
		ROUND((Avg(A.AssValue)*B.Weightage/100),3) as Score, ROUND((B.maxval*B.Weightage/100),2) as MaxScore,B.Weightage 
		from hiring_assessmentrawresult_external_hiring as A,hiring_assesmentcriteria as B where A.ApplicantId in ('.$ApplicantId.')  AND B.AsserId IN (2)
		and A.AssCriteriaId = B.AssCriteriaId
		group by A.ApplicantId,A.ApplicantEmailId,A.jobrequestionId,A.AssCriteriaId,B.AsserId,B.SubArea;');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}	

	public function getIndividualInterviewCriteria($InterviewId,$AppliedJobStage,$Round){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_qualifyingcriteria` WHERE `InterviewId` = :InterviewId and AppliedJobStage = :AppliedJobStage and Round = :Round');
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->bindValue(':AppliedJobStage', $AppliedJobStage, PDO::PARAM_STR);
		$stmt->bindValue(':Round', $Round, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function checkInterviewExistCriteria($InterviewId){
		$stmt = $this->pdo->prepare("SELECT * FROM `hiring_qualifyingcriteria` WHERE `InterviewId` = :InterviewId ");
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}

	public function update($table, $Id, $fields){
		$columns = '';
		$i       = 1;

		foreach ($fields as $name => $value) {
			$columns .= "`{$name}` = :{$name} ";
			if($i < count($fields)){
				$columns .= ', ';
			}
			$i++;
		}
		$sql = "UPDATE {$table} SET {$columns} WHERE `ApplicantId` = '{$Id}'";
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

	public function updateInterview($table, $InterviewId, $fields){
		$columns = '';
		$i       = 1;

		foreach ($fields as $name => $value) {
			$columns .= "`{$name}` = :{$name} ";
			if($i < count($fields)){
				$columns .= ', ';
			}
			$i++;
		}
		$sql = "UPDATE {$table} SET {$columns} WHERE `InterviewId` = '{$InterviewId}'";
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

	public function updatepanelmember_usingApplicant($table, $ApplicantId, $fields){
		$columns = '';
		$i       = 1;

		foreach ($fields as $name => $value) {
			$columns .= "`{$name}` = :{$name} ";
			if($i < count($fields)){
				$columns .= ', ';
			}
			$i++;
		}
		$sql = "UPDATE {$table} SET {$columns} WHERE `ApplicantId` = {$ApplicantId}";
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

	public function updatepanelmember($table, $MemberId, $fields){
		$columns = '';
		$i       = 1;

		foreach ($fields as $name => $value) {
			$columns .= "`{$name}` = :{$name} ";
			if($i < count($fields)){
				$columns .= ', ';
			}
			$i++;
		}
		$sql = "UPDATE {$table} SET {$columns} WHERE `MemberId` = {$MemberId}";
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


	public function delete($table, $array){
		$sql   = "DELETE FROM " . $table;
		$where = " WHERE ";

		foreach($array as $key => $value){
			$sql .= $where . $key . " = '" . $value . "'";
			$where = " AND ";
		}
		$sql .= ";";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
	}

	public function uploadFile($file){
 		 	$filename   = $file['name'];
			$fileTmp    = $file['tmp_name'];
			$fileSize   = $file['size'];
			$errors     = $file['error'];

 			$ext = explode('.', $filename);
			$ext = strtolower(end($ext));
				
				if($errors ===0){
					
					if($fileSize <= 2097152){
		 				$root = 'data/docs/external_hiring/resume/' . date("Ymdhms").".". $ext;
					  	 move_uploaded_file($fileTmp,$_SERVER['DOCUMENT_ROOT'].'/smart_bridge/'.$root);
						 return $root;

					}else{
							$GLOBALS['imgError'] = "File Size is too large";
						    return $GLOBALS['imgError'];
					    }
			    }
 		}
	public function uploadZip($file){
 		 	$filename   = $file['name'];
			$fileTmp    = $file['tmp_name'];
			$fileSize   = $file['size'];
			$errors     = $file['error'];

 			$ext = explode('.', $filename);
			$ext = strtolower(end($ext));

 			
 			$allowed_extensions  = array('zip');
		
			if(in_array($ext, $allowed_extensions)){
				
				if($errors ===0){
					
					if($fileSize <= 2097152){

		 				$root = 'users/achivementcontent/' . date("Ymdhms").".". $ext;
					  	 move_uploaded_file($fileTmp,$_SERVER['DOCUMENT_ROOT'].'/SM/'.$root);
						 return $root;

					}else{
							$GLOBALS['imgError'] = "File Size is too large";
					    }
			    }
			  }else{
						$GLOBALS['imgError'] = "Only alloewd .zip extensions";
		  	       }
 		}

 	public function allpanelistcompletedtheinterview($ApplicantId){
 		$stmt = $this->pdo->prepare('SELECT * FROM hiring_panelmember WHERE ApplicantId = :ApplicantId AND ISInterviewPending IN (-2)');
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			return false;
		    exit;
		}else{
			return true;
		    exit;
		}
 	}

 	public function allpanelistcompletedtheinterview_external_interview($ApplicantId){
 		$stmt = $this->pdo->prepare('SELECT * FROM hiring_panelmember_external_hiring WHERE ApplicantId = :ApplicantId AND ISInterviewPending IN (-2)');
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			return false;
		    exit;
		}else{
			return true;
		    exit;
		}
 	}

 	public function allpanelistcompletedtheexternalinterview($ApplicantId){
 		$stmt = $this->pdo->prepare('SELECT * FROM hiring_panelmember_external_hiring WHERE ApplicantId = :ApplicantId AND ISInterviewPending IN (-2)');
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			return false;
		    exit;
		}else{
			return true;
		    exit;
		}
 	} 	

	public function getAllPanel_member_list_from_ApplicantId($ApplicantId){
		$stmt = $this->pdo->prepare('SELECT * FROM hiring_panelmember WHERE ApplicantId = :ApplicantId');
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllPanel_member_list_external_hiring_from_ApplicantId($ApplicantId){
		$stmt = $this->pdo->prepare('SELECT * FROM hiring_panelmember_external_hiring WHERE ApplicantId = :ApplicantId');
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}	
 	
}
?>	