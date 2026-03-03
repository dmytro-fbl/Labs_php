<?php

namespace Models;

class Student extends Human
{
    private $VNZ;
    private $course;
    public function __construct($height, $weight, $age, $VNZ, $course){
        parent::__construct($weight, $height, $age);
        $this->setVNZ($VNZ);
        $this->setCourse($course);
    }
    public function getVNZ(){
        return $this->VNZ;
    }
    public function getCourse(){
        return $this->course;
    }

    public function setVNZ($VNZ) : void
    {
        if ($VNZ != null && $VNZ != ""){
            $this->VNZ = $VNZ;
        }else{
            echo "Некоректний ВНЗ";
        }
    }

    public function setCourse($course) : void
    {
        if(is_numeric($course) && $course > 0 && $course <= 4){
            $this->course = $course;
        }else{
            echo "Некоректний курс";
        }
    }

    public function upCourse() : void
    {
        if ($this->course >= 4) {
            echo "Студент вже закінчив останній курс";
        } else {
            $this->setCourse($this->course + 1);
        }
    }

    protected function birthChildMessage(): string
    {
        return 'День народження студента';
    }

    function cleanRoom() : string
    {
        return 'Студент прибирає кімнату';
    }
    function cleanKitchen() : string
    {
        return 'Студент прибирає кухню';
    }
}