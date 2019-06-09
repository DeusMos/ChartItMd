<?php
/**
 * Created by PhpStorm.
 * User: deusm
 * Date: 6/9/2019
 * Time: 4:18 PM
 */
if(isset($_POST["submit"]))
{
    session_start();
    $text= $_POST["textarea"];
    require_once 'DBConnection.php';
    $patientId = $_SESSION['activePatientID'];
    $userId = $_SESSION['user_id'];

    $statement = $db->prepare ("INSERT INTO `nurse_notes` (`nurse_note_id`, `user_id`, `patient_id`, `nurse_note_datetime`, `text`) VALUES (NULL, :user_id, :patient_id, now(),:text)");
    $statement->bindValue(':user_id', $userId);
    $statement->bindValue(':patient_id', $patientId);
    $statement->bindValue(':text', $text);
    $statement->execute();



    $statement->closeCursor();
    header("location: NursesNotes.php");
}