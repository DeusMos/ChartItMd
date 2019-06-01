<?php
session_start();
require_once 'DBConnection.php';


?>



<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"  ></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" id="themeStyles" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"/>




</head>
<body>
<br><br>
<?php include"banner.html";?>

<?php include"measurementInputpage.php";?>

<div class="row">
        <?php include"navbar.php";?>
    <div class="col-5">
        <div class="header">
            <div style="display:inline-block;"><?php include 'PatientIDBar.php'; ?></div>
        </div>
        <div>
            <?php include 'summary.html';?>
        </div>
    </div>
</div>
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" >
    Add Vital
</button>
<br>
<br><br>
<button type="button" class="btn btn-primary" onclick="alertSavedValues()">Text Box values</button>

</body>
</html>