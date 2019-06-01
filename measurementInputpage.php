<?php
/**
 * Created by PhpStorm.
 * User: deusm
 * Date: 3/10/2019
 * Time: 5:08 PM
 */
require_once 'DBConnection.php';


$query = 'SELECT * FROM measurement_types WHERE 1';

$statement = $db->prepare($query);


$statement->execute();

$types = $statement->fetchAll();

$statement->closeCursor();

echo(' <script type="text/javascript">
        var measuretype = "";
        var value = "";
        var unit = "";

        function saveTextBoxes() {
            measuretype = $("#type").val();
            value = $("#value").val();
            unit = $("#unit").val();
        }

        function alertSavedValues() {
            alert("type: " + measuretype + " value: " + value + " " + unit)
        }
        function valueSelected(selection){
            if (selection.value != "0"){
            //alert("called");
            document.getElementById(\'value\').disabled = false;
            document.getElementById(\'unit\').disabled = false;
            document.getElementById(\'unit\').value = types[selection.value-1][3];
            }
            else{
                document.getElementById(\'value\').disabled = true;
                document.getElementById(\'unit\').disabled = true;
            }
        }
        
        function setFocus(){
           alert("called");
            document.getElementById("type").focus();
        }

    </script>');

echo('<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Measurement Input Form</h4>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                    Type <select id ="type" name="type" onchange="valueSelected(this);">
                    
                    <option value="0">Select a type</option>');
echo('<script> types = [];</script>');
foreach ($types as &$type) {
    echo('<option value="' .
        $type["id"] .
        '" >' .
        $type["type"] .
        '</option> ');
    echo('<script> types.push(["'.
        $type["id"].'","'.
        $type["type"].'","'.
        $type["numberofvalues"].'","'.
        $type["unit"].'","'.
        '"])</script>');
}

echo('</select>
                    </div>
                    
                    <div class="row">
                    
                    Value <input type="textbox" id="value" disabled="true"> </input>
                    Unit <input type="textbox" id="unit" disabled="true"> </input>
                    </div>
                </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveTextBoxes()">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->');




