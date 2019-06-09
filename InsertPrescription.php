<?php
if($_POST) {
    session_start();
    var_dump($_POST);
    var_dump($_SESSION);
    require_once 'DBConnection.php';
    $patientId = $_SESSION['activePatientID'];
    $userId = $_SESSION['user_id'];


    $med_id = $_POST['med_id'];
    $med_dose = $_POST['med_dose'];
    $statement = $db->prepare("
INSERT INTO `prescriptions` (`script_id`, `patient_id`, `med_id`, `user_id`, `script_dose`)
 VALUES (NULL, :patientId, :med_id, :user_id, :med_dose)
");
    $statement->bindValue(':patientId', $patientId);
    $statement->bindValue(':med_id', $med_id);
    $statement->bindValue(':user_id', $userId);
    $statement->bindValue(':med_dose', $med_dose);
    $statement->execute();



    $statement->closeCursor();
}

