<?php
/**
 * Created by PhpStorm.
 * User: deusm
 * Date: 5/21/2019
 * Time: 3:37 PM
 */

include("DBConnection.php");

echo('hi');
session_start();
// username and password sent from form
var_dump($_POST);
$myusername = $_POST['username'];
$mypassword = $_POST['password'];
var_dump($mypassword);
var_dump($myusername);
$sql = "SELECT user_type, user_id FROM users WHERE user_name = :username and user_password = :userpassword";

$statement = $db->prepare($sql);

$statement->bindValue(':username', $myusername);
$statement->bindValue(':userpassword', $mypassword);

$statement->execute();
$returned = $statement->fetchAll();

$statement->closeCursor();


var_dump($returned);

// If result matched $myusername and $mypassword, table row must be 1 row

if (count($returned) == 1) {

    $_SESSION['login_user'] = $myusername;
    $_SESSION['user_type'] =  $returned[0]['user_type'];
    $_SESSION['user_id'] =  $returned[0]['user_id'];
    header("location: PatientLookup.php");
} else {
    $error = "Your Login Name or Password is invalid";
    header("location: loginretry.html");
}
echo('Wrong password');

?>
<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"  ></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" id="themeStyles" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"/>




</head>
