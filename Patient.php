<?php
/**
 * Created by PhpStorm.
 * User: deusm
 * Date: 2/16/2019
 * Time: 8:59 PM
 */

class Patient
{
    public $patientFirstName;
    public $patientLastName;
    public $patientDOB;
    public $patientGender;
    public $patientId;
    public $patientAge;

    public function __construct($patientId, $patientFirstName, $patientLastName, $patientGender, $patientDOB)
    {
        $this->patientDOB = $patientDOB;
        $this->patientAge = $this->findAge();
        $this->patientFirstName = $patientFirstName;
        $this->patientLastName = $patientLastName;
        $this->patientGender = $patientGender;
        $this->patientId = $patientId;

    }

    private function findAge()//gets age from date or birth
    {
        $birthDate = explode("-",$this->patientDOB);

        $this->patientAge = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));

    }


}