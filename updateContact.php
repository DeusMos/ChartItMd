<?php
	session_start();
	require_once  'DBConnection.php';
	
	$patientid = $_SESSION['activePatientID'];
	$user = $_SESSION['user_id'];
	
	$address1 = $_POST["address1"];
	$address2 = $_POST["address2"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$date = date("Y-m-d");
	
		$sql = 'UPDATE patient_contact
				SET address1 = :address1,
					address2 = :address2,
					phone = :phone,
					email = :email,
					updated_at = :updated_at,
					updated_by = :updated_by
				WHERE patient_id = :patient_id';
	
		$statement = $db->prepare($sql);
	
		$statement->bindValue(':address1', $address1);
		$statement->bindValue(':address2', $address2);
		$statement->bindValue(':phone', $phone);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':updated_at', $date);
		$statement->bindValue(':updated_by', $user);
		$statement->bindValue(':patient_id', $patientid);
	
		$statement->execute();
		
		$statement->closeCursor();
		
		header('location: patientContact.php');
?>