<?php
	session_start();
	require_once 'DBConnection.php';
	$patientid = $_SESSION['activePatientID'];
	
	$sql = 'SELECT address1, address2, phone, email FROM patient_contact
			WHERE patient_id = :patient_id';
			
			
	$statement = $db->prepare($sql);
	
	$statement->bindValue(':patient_id', $patientid);
	
	$statement->execute();
	
	$returned = $statement->fetchAll();
	
	$array = array_values($returned);
	
	$statement->closeCursor();
?>
<?php include "banner.html"; ?>
<html>


<head>

    <title>Patient Contact</title>
</head>
<body>


<div class="row">
	<?php include "navbar.php"; ?>
	<div class="col-5">
<form action="updateContact.php" method="post">
    <table class="striped">
        <!-- <tr>
            <td>First name</td>
            <td>
                <label id="patient-firstName-item">
                    <input id="patient-firstName" name="patient-firstName" readonly required type="text" value= <?php $returned[firstname]?> />
                </label>
            </td>
        </tr>
        <tr>
            <td>Last name</td>
            <td>
                <label id="patient-lastName-item">
                    <input id="patient-lastName" name="patient-lastName" readonly required type="text" value= <?php $returned[lastname]?> />
                </label>
            </td>
        </tr>
		-->
			<tr>
				<td>Address 1:</td>
				<td><input type="text" name="address1" id="address1" <?php echo 'value="'.$array[0]['address1'].'"'?> disabled></td
			</tr>
			<tr>
				<td>Address 2:</td>
				<td><input type="text" name="address2" id="address2" <?php echo 'value="'.$array[0]['address2'].'"'?> disabled></td>
			</tr>
			<tr>
				<td>Phone number</td>
				<td><input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="phone" <?php echo 'value="'.$array[0]['phone'].'"'?> disabled></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" id="email" <?php echo 'value="'.$array[0]['email'].'"'?> disabled></td>
			</tr>
		
    </table>

	<input type="submit" id="saveAll" value="Save">
</form>
<button id="editAll">Edit</button>
</div>
</div>
<script src="patientContact.js"></script>
</body>
</html>


