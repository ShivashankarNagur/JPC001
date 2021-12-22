<?php 

class Applicants{
	
	protected $pdo;
 	public function __construct($pdo){	
	    $this->pdo = $pdo;
	}


	public function getallApplicantsWithInterviewId($InterviewId){
		$stmt = $this->pdo->prepare("select * from hiring_applicants where `InterviewId` =:InterviewId");
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getallApplicantsWithInterviewId_ExternalHiring($InterviewId){
		$stmt = $this->pdo->prepare("select * from hiring_applicants_external_hiring where `InterviewId` =:InterviewId");
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}




	public function getallApplicantsMappingStatus_ExternalHiring($ApplicantId){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_panelmember_external_hiring` WHERE `ApplicantId` = :ApplicantId');
			$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				return true;
		    	exit;
			}else{
				return false;
		    	exit;
			}
	}

	public function getallApplicantsMappingStatus_InternalHiring($ApplicantId){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_panelmember` WHERE `ApplicantId` = :ApplicantId');
			$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				return true;
		    	exit;
			}else{
				return false;
		    	exit;
			}
	}		

	public function getallApplicantsWithInterviewId_ExternalHiringCompleted($InterviewId){
		$stmt = $this->pdo->prepare("select * from hiring_applicants_external_hiring where `InterviewId` =:InterviewId and result in (1,2,3,-1)");
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getallApplicantsWithInterviewId_InternallHiringCompleted($InterviewId){
		$stmt = $this->pdo->prepare("select * from hiring_applicants where `InterviewId` =:InterviewId and result in (1,2,3,-1)");
		$stmt->bindValue(':InterviewId', $InterviewId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}			

	public function getApplicantDetails($ApplicantId){
		$stmt = $this->pdo->prepare("select * from hiring_applicants where `ApplicantId` =:ApplicantId");
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getApplicantDetails_ExternalHiring($ApplicantId){
		$stmt = $this->pdo->prepare("select * from hiring_applicants_external_hiring where `ApplicantId` =:ApplicantId");
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}	

	public function get_allmember_list($ApplicantId){
		$stmt = $this->pdo->prepare("select * from hiring_panelmember where `ApplicantId` =:ApplicantId");
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function get_allmember_list_ExternalHiring($ApplicantId){
		$stmt = $this->pdo->prepare("select * from hiring_panelmember_external_hiring where `ApplicantId` =:ApplicantId");
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}	

	public function getallApplicants_WithPendingInterview_ByAssessorSignum($signum){
		$stmt = $this->pdo->prepare("SELECT * FROM hiring_applicants WHERE ApplicantId IN (
				SELECT Distinct ApplicantId FROM hiring_panelmember WHERE Signum IN ('".$signum."') AND ISInterviewPending IN (-2,-1))");
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getallApplicants_ExternalHiring_WithPendingInterview_ByAssessorSignum($signum){
		$stmt = $this->pdo->prepare("SELECT * FROM hiring_applicants_external_hiring WHERE ApplicantId IN (
				SELECT Distinct ApplicantId FROM hiring_panelmember_external_hiring WHERE Signum IN ('".$signum."') AND ISInterviewPending IN (-2,-1))");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}	

	public function getallApplicants_WithCompletedInterview_ByAssessorSignum($signum){
		$stmt = $this->pdo->prepare("SELECT * FROM hiring_applicants WHERE ApplicantId IN (
				SELECT Distinct ApplicantId FROM hiring_panelmember WHERE Signum IN ('".$signum."') AND ISInterviewPending IN (1))");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getallApplicants_ExternalHiring_WithCompletedInterview_ByAssessorSignum($signum){
		$stmt = $this->pdo->prepare("SELECT * FROM hiring_applicants_external_hiring WHERE ApplicantId IN (
				SELECT Distinct ApplicantId FROM hiring_panelmember_external_hiring WHERE Signum IN ('".$signum."') AND ISInterviewPending IN (1))");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getExternalApplicantFromAplicantId($ApplicantId){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_applicants_external_hiring` WHERE `ApplicantId` = :ApplicantId');
		$stmt->bindValue(':ApplicantId', $ApplicantId, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}	

	public function update_hiring_self_registration($table, $Id, $fields){
		$columns = '';
		$i       = 1;

		foreach ($fields as $name => $value) {
			$columns .= "`{$name}` = :{$name} ";
			if($i < count($fields)){
				$columns .= ', ';
			}
			$i++;
		}
		$sql = "UPDATE {$table} SET {$columns} WHERE `OTP` = '{$Id}'";
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


	public function updateApplicant($table, $ApplicantId, $fields){
		$columns = '';
		$i       = 1;

		foreach ($fields as $name => $value) {
			$columns .= "`{$name}` = :{$name} ";
			if($i < count($fields)){
				$columns .= ', ';
			}
			$i++;
		}
		$sql = "UPDATE {$table} SET {$columns} WHERE `ApplicantId` = '{$ApplicantId}'";
		if($stmt = $this->pdo->prepare($sql)){
			foreach ($fields as $key => $value) {
				$stmt->bindValue(':'.$key, $value);
			}
			$stmt->execute();
			var_dump($stmt->errorInfo());
			if($stmt->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}
	}						

}
?>				