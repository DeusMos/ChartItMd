<html>
<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"  ></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" id="themeStyles" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
    <style type="text/css">
        tr.header {
            font-weight: bold;
        }

        tr.alt {
            background-color: #777777;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.striped tr:even').addClass('alt');
        });
    </script>
    <title></title>
</head>
<body>
<?php include("banner.html")?>
<form action="PatientLookup.php" method="post">
    <label>Enter patient Date of birth</label>
    <input type="text" name="dob">
    <input type="submit" value="Find">
</form>
<?php
if($_POST) {
    include("DBConnection.php");
    $dob = $_POST['dob'];
    $statement = $db->prepare("select * from patients where patient_dob = :patient_dob ");
    $statement->bindValue(':patient_dob', $dob);
    $statement->execute();

    $returned = $statement->fetchAll();

    $statement->closeCursor();
}
?>

<table class="striped">
    <tr class="header">
        <td>Id</td>
        <td>First name</td>
        <td>Last name</td>
        <td>Date of birth</td>
    </tr>
    <?php
    if($_POST) {
        foreach ($returned as &$item) {
            echo '<form action = "SetPatient.php" method="post">';
            echo '<tr>';
            echo '<td>';
            echo ' <input type = "submit" name="patient_id"value= "';
            echo $item['patient_id'];
            echo '" />';

            echo '</td><td>';
            echo $item['patient_firstname'];
            echo '</td><td>';
            echo $item['patient_lastname'];
            echo '</td><td>';
            echo $item['patient_dob'];
            echo '</td>';
            echo '</tr>';
            echo '</form>';
        }
    }


    ?>
</table>
</body>
</html>