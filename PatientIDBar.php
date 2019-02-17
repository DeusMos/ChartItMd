<?php
require_once  'DBConnection.php';
$patientid = 1;


$query = 'SELECT patient_id, patient_firstname,
patient_lastname,patient_dob , gender_id FROM patients WHERE patient_id =
:patient_id';

$statement = $db->prepare($query);

$statement->bindValue(':patient_id', $patientid);


$statement->execute();

$returned = $statement->fetchAll();

$statement->closeCursor();



?>
<html lang="en">
<link rel="stylesheet" type="text/css" href="main.css" />

<table>
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Date Of Birth</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Patient ID</th>

    </tr>

        <tr>
            <td> <?php echo $returned[0]['patient_lastname']; ?></td>
            <td> <?php echo $returned[0]['patient_firstname']; ?></td>
            <td> <?php echo $returned[0]['patient_dob']; ?></td>
            <td> age</td>
            <td> <?php echo $returned[0]['gender_id']; ?></td>
            <td> <?php echo $returned[0]['patient_id']; ?></td>


        </tr>

</table>
