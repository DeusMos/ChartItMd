<?php
	session_start();
	require_once 'DBConnection.php';
	$patientId = $_SESSION['activePatientID'];
	
	$sql = 'SELECT * FROM allergies WHERE patient_id = :patient_id';
	
	$statement = $db->prepare($sql);
	
	$statement->bindValue(':patient_id', $patientId);
	
	$statement->execute();
	
	$returned = $statement->fetchAll();
	
	print_r($returned[0]);
	$statement->closeCursor();
?>