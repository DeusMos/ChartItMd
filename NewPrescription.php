<?php
/**
 * Created by PhpStorm.
 * User: deusm
 * Date: 5/31/2019
 * Time: 5:08 PM
 *
 * todo fix the dose auto populator.
 */
require_once 'DBConnection.php';
$query = 'SELECT * FROM medications WHERE 1';

$statement = $db->prepare($query);
$statement->execute();
$types = $statement->fetchAll();

$statement->closeCursor();
echo(' <script type="text/javascript">
        var med_type = "";
        var med_id = "";
        var dose = "";

        function saveTextBoxes() {
            med_type = $("#med_type").val();
            med_id = $("#med_id").val();
            dose = $("#dose").val();
        }

        function alertSavedValues() {
            alert("med_type: " + med_type + " value: " + value + " " + unit)
        }
        function valueSelected(selection){
            if (selection.value != "0"){
            //alert("called");
            document.getElementById(\'med_id\').disabled = false;
            document.getElementById(\'med_dose\').disabled = false;
            document.getElementById(\'med_dose\').value = types[selection.value-1][3];
            }
            else{
                document.getElementById(\'value\').disabled = true;
                document.getElementById(\'med_dose\').disabled = true;
            }
        }
        
        function setFocus(){
           alert("called");
            document.getElementById("med_type").focus();
        }

    </script>');

echo('<div class="modal fade" id="NewPrescriptionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Prescription Input Form</h4>
                </div> 
                <form action="InsertPrescription.php" method="post">
                <div class="modal-body">
                <div class="container-fluid">
                   
                    <div class="row">
                    
                    Type <select id="med_type" name="med_type" onchange="valueSelected(this);">
                    
                    <option value="0">Select a type</option>');
echo('<script> types = [];</script>');
foreach ($types as &$type) {
    echo('<option value="' .
        $type["med_id"] .
        '" >' .
        $type["med_type"] .
        '</option> ');
    echo('<script> types.push(["'.
        $type["med_id"].'","'.
        $type["med_type"].'","'.
        $type["med_chemname"].'","'.
        $type["med_dose"].'","'.
        '"])</script>');
}

echo('</select>
                    </div>
                    
                    <div class="row">
                    
                    Generic <select  id="med_id" name="med_id" disabled> 
                    <option value="0">Select a type</option>\');
                    
                    
                    
                    ');
foreach ($types as $type)
    echo('<option value="' .
        $type["med_id"] .
        '" >' .
        $type["med_chemname"] .
        '</option> ');
echo('<script> types.push(["'.
    $type["med_id"].'","'.
    $type["med_type"].'","'.
    $type["med_chemname"].'","'.
    $type["med_dose"].'","'.
    '"])</script>');

echo('</select>
                    Dose <input type="textbox" name="med_dose" id="med_dose" disabled> 
                    </div>
                    
                </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save changes</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->');