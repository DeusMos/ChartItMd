<?php
require_once  'DBConnection.php';

$patientid = $_SESSION['activePatientID'];


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
            <td> <?php
                $birthDate = explode("-",$returned[0]['patient_dob']);

                $Age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                    ? ((date("Y") - $birthDate[0]) - 1)
                    : (date("Y") - $birthDate[0]));
                echo $Age;
                ?></td>
            <td> <?php echo $returned[0]['gender_id']; ?></td>
            <td> <?php echo $returned[0]['patient_id']; ?></td>


        </tr>

</table>
