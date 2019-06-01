<?php
/**
 * Created by PhpStorm.
 * User: deusm
 * Date: 5/21/2019
 * Time: 5:34 PM
 */
session_start();
if($_POST) {
    $_SESSION['activePatientID'] = $_POST['patient_id'];
    header("location: index.php");
}