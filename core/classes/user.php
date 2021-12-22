<?php 

class User{
	
	protected $pdo;

 	public function __construct($pdo){											
	    $this->pdo = $pdo;
	}

	public function checkInput($data){
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripcslashes($data);
		return $data;
	}

	public function getAllAutomationaguys(){
		$stmt = $this->pdo->prepare('SELECT * FROM `hrms_data` WHERE `Signum` in (SELECT signum from profile)');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}		

	public function getReportees($username,$Is_Line_Manager){
		$stmt = $this->pdo->prepare('SELECT * FROM `hrms_data` WHERE `Manager_Signum` = :username and Is_Line_Manager = :Is_Line_Manager');
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->bindValue(':Is_Line_Manager', $Is_Line_Manager, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


	public function login($signum, $password){
		$server = 'ericsson.se';
		$domain = '@ericsson.se';
		$port = 389;
		$ldap_connection = ldap_connect($server, $port);
		if (! $ldap_connection)
		{
		    return false;
		    exit;
		}
		ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0);
		$ldap_bind = @ldap_bind($ldap_connection, $signum.$domain, $password);

		if (! $ldap_bind /*&& $password!='123456'*/)
		{   //echo 'error in binding';
		    return false;
		    exit;
		}else{
			$stmt = $this->pdo->prepare('SELECT * FROM `hrms_data` WHERE `Signum` = :signum');
			$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();

			if($count > 0){
				$_SESSION['signum'] = $signum;
				$stmt = $this->pdo->prepare('SELECT * FROM `hiring_panelmember` WHERE `Signum` = :signum');
				$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
				$stmt->execute();
				$ispanelmembercount = $stmt->rowCount();
				if($ispanelmembercount > 0){
					$_SESSION['IsPanelMemeber'] = 'Y';
				}else{
					$_SESSION['IsPanelMemeber'] = 'N';
				}
				$stmt = $this->pdo->prepare('SELECT * FROM `hiring_panelmember_external_hiring` WHERE `Signum` = :signum');
				$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
				$stmt->execute();
				$ispanelmembercount_external_hiring = $stmt->rowCount();
				if($ispanelmembercount_external_hiring > 0){
					$_SESSION['IsExternalPanelMemeber'] = 'Y';
				}else{
					$_SESSION['IsExternalPanelMemeber'] = 'N';
				}



				$stmt = $this->pdo->prepare('SELECT * FROM `user_access` WHERE `Signum` = :signum');
				$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
				$stmt->execute();
				$useraccesscount = $stmt->rowCount();
				if($useraccesscount > 0){
					$_SESSION['accesslevel_adm'] = 'Y';
				}else{
					$_SESSION['accesslevel_adm'] = 'N';
				}

				$stmt = $this->pdo->prepare('SELECT * FROM `hiring_interviewownerlist` WHERE `Signum` = :signum And InterviewId IN (SELECT InterviewId FROM hiring_interviewlist WHERE InterviewType IN (1))');
				$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
				$stmt->execute();
				$coownerofinterviewcount = $stmt->rowCount();
				if($coownerofinterviewcount > 0){
					$_SESSION['accesslevel_owner'] = 'Y';
				}else{
					$_SESSION['accesslevel_owner'] = 'N';
				}


				$stmt = $this->pdo->prepare('SELECT * FROM `hiring_interviewownerlist` WHERE `Signum` = :signum And InterviewId IN (SELECT InterviewId FROM hiring_interviewlist WHERE InterviewType IN (2))');
				$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
				$stmt->execute();
				$coownerofinterviewcount = $stmt->rowCount();
				if($coownerofinterviewcount > 0){
					$_SESSION['externalaccesslevel_owner'] = 'Y';
				}else{
					$_SESSION['externalaccesslevel_owner'] = 'N';
				}

				return true;
		    	exit;
			}else{
				return false;
		    	exit;
			}

		}		
	}

	public function getOTP(){
		$stmt = $this->pdo->prepare('SELECT OTP FROM hiring_auto_refresh WHERE Id IN (SELECT MAX(Id) FROM hiring_auto_refresh)');
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function getOTPValidity($OTP){
		$stmt = $this->pdo->prepare('SELECT * FROM `hiring_self_registration` WHERE `OTP` = :OTP and Status in (0) ');
			$stmt->bindValue(':OTP', $OTP, PDO::PARAM_STR);
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

	public function getHrmsUser($signum){
		$stmt = $this->pdo->prepare('SELECT * FROM `hrms_data` WHERE `Signum` = :signum');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function profileData($signum){
		$stmt = $this->pdo->prepare('SELECT * FROM `profile` WHERE `signum` = :signum');
		$stmt->bindValue(':signum', $signum, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}


	public function getDistinctJobRole(){
		$stmt = $this->pdo->prepare('SELECT Distinct categories FROM `jobrole` ');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllHrmsUser(){
		$stmt = $this->pdo->prepare('SELECT * FROM `hrms_data`');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getAllHrmsUser_restricteddetails(){
		$stmt = $this->pdo->prepare('SELECT Signum,Full_Name FROM `hrms_data`');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}		

	public function loggedIn(){
		return (isset($_SESSION['signum'])) ? true : false;
	}
     
	public function logout(){
		$_SESSION = array();
		session_destroy();
		header('Location: ../index.php');
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

	public function update($table, $signum, $fields){
		$columns = '';
		$i       = 1;
		foreach ($fields as $name => $value) {
			$columns .= "`{$name}` = :{$name} ";
			if($i < count($fields)){
				$columns .= ', ';
			}
			$i++;
		}
		$sql = "UPDATE {$table} SET {$columns} WHERE `signum` = '{$signum}'";
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

}
?>