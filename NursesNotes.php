<?php
/**
 * Created by PhpStorm.
 * User: deusm
 * Date: 5/22/2019
 * Time: 8:17 AM
 */
session_start();
require_once 'DBConnection.php';
$patientId = $_SESSION['activePatientID'];
$userId = $_SESSION['user_id'];
$statement = $db->prepare("SELECT text FROM `nurse_notes` where  patient_id = :patient_id ORDER BY nurse_note_datetime DESC Limit 1");

$statement->bindValue(':patient_id', $patientId);

$statement->execute();


$text = $statement->fetchAll();
$statement->closeCursor();


?>

<?php include "banner.html"; ?>

<html>
<head>

    <title>Nurse's Notes</title>

</head>
<body>
<div class="row">

    <?php include "navbar.php"; ?>

    <div class="col-5">
        <div class="header">
            <div style="display:inline-block;"><?php include 'PatientIDBar.php'; ?></div>
        </div>
        <div>
            <form action="InsertNurseNote.php" method="post">

                <textarea name="textarea" rows="30" cols="50"><?php echo($text[0][0]); ?></textarea>
                <input type="submit" name="submit">
            </form>
        </div>
    </div>


</div>
</body>
</html>