<?php

namespace Models;

use Interfaces\ICleanHouse;

abstract class Human implements ICleanHouse
{
    private $height;
    private $weight;
    private $age;

    public function __construct($height, $weight, $age)
    {
        $this->setHeight($height);
        $this->setWeight($weight);
        $this->setAge($age);
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setHeight($height)
    {
        if (is_numeric($height) && $height > 0) {
            $this->height = $height;
        } else {
            echo "Некоректне значення зросту";
            $this->height = null;
        }
        return $height;
    }

    public function setWeight($weight)
    {
        if (is_numeric($weight) && $weight > 0) {
            $this->weight = $weight;
        } else {
            echo "Некоректне значення ваги";
            $this->weight = null;
        }
        return $weight;
    }
    public function setAge($age) : void
    {
        if (is_numeric($age) && $age > 0) {
            $this->age = $age;
        }else{
            echo "Некоректне значення віку";
        }

    }
    public function birthChild() : string
    {
        return $this->birthChildMessage();
    }
    abstract protected function birthChildMessage() : string;

    abstract public function cleanRoom(): string;
    abstract public function cleanKitchen(): string;

}