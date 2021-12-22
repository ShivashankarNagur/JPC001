<?php 
	session_start();
//echo $pdo;exit;
	include 'database/connection.php';
	include 'classes/user.php';
	include 'classes/skills.php';
	include 'classes/bot.php';
	include 'classes/interview.php';
	include 'classes/applicant.php';
	

  	global $pdo;
	//echo $pdo;exit;
	
  	$getFromU = new User($pdo);
  	$getFromSK = new Skills($pdo);
  	$getFromBT = new Bots($pdo);
  	$getFromI = new Interview($pdo); 
  	$getFromA = new Applicants($pdo);



  	

  	//$getFromA = new Applicantss($pdo);
  	//define('BASE_URL', 'https://sgh452rx1l.ericsson.se/smart_bridge/');
  	define('BASE_URL', 'http://localhost/smart_bridge/');

 ?>      
