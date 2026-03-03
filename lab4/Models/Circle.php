<?php

namespace Models;

class Circle
{
    public $coordX;
    public $coordY;
    public $radius;

    public function __construct($coordX, $coordY, $radius){
        $this->coordX = $coordX;
        $this->coordY = $coordY;
        $this->radius = $radius;
    }

    public function getCoordX()
    {
        return $this->coordX;
    }
    public function getCoordY(){
        return $this->coordY;
    }
    public function getRadius(){
        return $this->radius;
    }
    public  function setCoordX($coordX){
        $this->coordX = $coordX;
    }
    public  function setCoordY($coordY){
        $this->coordY = $coordY;
    }
    public  function setRadius($radius){
        if($radius > 0)
            $this->radius = $radius;
    }

    public function __toString() : string
    {
        return "<br>Коло з центром в ($this->coordX, $this->coordY) і радіусом $this->radius<br>";
    }

}