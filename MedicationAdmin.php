<?php
if($_POST) {
    session_start();
    var_dump($_POST);
    var_dump($_SESSION);
    require_once 'DBConnection.php';
    $patientId = $_SESSION['activePatientID'];
    $userId = $_SESSION['user_id'];


    $script_id = $_POST['script_id'];
    $script_dose = $_POST['script_dose'];
    $statement = $db->prepare("
INSERT INTO `medication_administration` (`admin_id`, `patient_id`, `user_id`, `script_id`, `time_taken`,  `dose`)
 VALUES (NULL, :patientId, :user_id, :script_id, now(), :script_dose)
");
    $statement->bindValue(':patientId', $patientId);
    $statement->bindValue(':user_id', $userId);
    $statement->bindValue(':script_id', $script_id);

    $statement->bindValue(':script_dose', $script_dose);
    $statement->execute();



    $statement->closeCursor();
    header("location: Medications.php");
}

