<?php
/**
 * Created by PhpStorm.
 * User: deusm
 * Date: 5/21/2019
 * Time: 7:24 PM
 */
session_start();
require_once 'DBConnection.php';
?>

<?php include"banner.html";?>

<html>
<head>

    <title>ConsentForms</title>
</head>
<body>
<div class="row">

    <?php include"navbar.php";?>

    <div class="col-5">
        <div class="header">
            <div style="display:inline-block;"><?php include 'PatientIDBar.php'; ?></div>
        </div>
        <div>
            <?php include"about.html";?>
        </div>
    </div>



</div>
</body>
</html>