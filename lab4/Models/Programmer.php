<?php

namespace Models;

class Programmer extends Human
{
    private array $arrLanguage = [];
    private $experience;
    public function __construct($firstName, $lastName, $age, array $arrLanguage, $experience)
    {
        parent::__construct($firstName, $lastName, $age);
        $this->setArrLanguage($arrLanguage);
        $this->setExperience($experience);
    }

    public function getArrLanguage()
    {
        return $this->arrLanguage;
    }
    public function getExperience(){
        return $this->experience;
    }

    public function setExperience($experience) : void{
        if(!empty($experience)){
            $this->experience = $experience;
        }else{
            echo 'недопустимі дані досвіду';
        }
    }
    public function setArrLanguage($arrLanguage) : void{
        if(is_array($arrLanguage)){
            $this->arrLanguage = $arrLanguage;
        }else{
            echo 'Некоректні дані';
        }
    }

    public function addLanguage($lang) : void{
        $this->arrLanguage[] = $lang;
    }
    protected function birthChildMessage(): string
    {
        return 'День народження програміста';
    }

    function cleanRoom() : string
    {
        return 'Програміст прибирає кімнату';
    }
    function cleanKitchen() : string
    {
        return 'Програміст прибирає кухню';
    }

}