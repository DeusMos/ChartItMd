<?php
/**
 * Created by PhpStorm.
 * User: deusm
 * Date: 5/22/2019
 * Time: 8:15 AM
 */
session_start();
require_once 'DBConnection.php';
$patientId = $_SESSION['activePatientID'];


?>

<?php include "banner.html"; ?>

<html>
<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"  ></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" id="themeStyles" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"/>

    <title>Medications</title>
</head>
<body>
<div class="row">

    <?php include "navbar.php"; ?>

    <div class="col-5">
        <div class="header">
            <div style="display:inline-block;"><?php include 'PatientIDBar.php'; ?></div>
        </div>
        <table class="striped">
            <tr class="header">
                <td>Generic</td>
                <td>Brand</td>
                <td>Type</td>
                <td>Dose</td>
                <td>Last Taken</td>
                <td>Administer</td>
            </tr>
            <?php
            $query = 'SELECT medications.med_id, med_chemname as cname , med_brandname as bname, med_type, script_dose, time_taken, prescriptions.script_id as id
FROM medications 
INNER JOIN prescriptions 
on medications.med_id = prescriptions.med_id
INNER JOIN medication_administration
ON medication_administration.patient_id = prescriptions.patient_id
WHERE prescriptions.patient_id = :patient_id';

            $statement = $db->prepare($query);

            $statement->bindValue(':patient_id', $patientId);


            $statement->execute();

            $returned = $statement->fetchAll();

            $statement->closeCursor();


            foreach ($returned as &$item) {
                echo '<form action = "MedicationAdmin.php" method="post">';
                echo '<tr>';


                echo '</td><td>';
                echo $item['cname'];
                echo '</td><td>';
                echo $item['bname'];
                echo '</td><td>';
                echo $item['med_type'];
                echo '</td><td>';
                echo $item['script_dose'];
                '<input name="script_dose" hidden value="';
                echo $item['script_dose'];
                echo '">';
                echo '</td>';
                echo '<td>';
                echo $item['time_taken'];
                echo '<input name="script_id" hidden value="';
                echo $item['id'];
                echo '">';
                echo '</td>';
                echo '<td>';
                echo ' <button type = "submit" name="id"value= "';
                echo $item['id'];
                echo ' " >';
                echo $_SESSION['login_user'];
                echo '</button>';
                echo '</tr>';
                echo '</form>';

            } ?>
        </table>
    </div>
    <?php include"NewPrescription.php";?>
    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#NewPrescriptionModal" >
        Prescribe New
    </button>


</div>
</body>
</html>