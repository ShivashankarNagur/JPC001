<?php 
	//$dsn = 'mysql:host=sgh452rx1l.ericsson.se; dbname=smart_bridge';
	$dsn = 'mysql:host=localhost; dbname=jrtracker';
	$user = 'root';
	$password = '';
	
 //echo $dsn;exit;

	try{
		$pdo = new PDO($dsn, $user, $password);
		echo $pdo;exit;
	}catch(PDOException $e){
		//echo $e;exit;
		echo 'connection error! ' . $e;
	}	
?>