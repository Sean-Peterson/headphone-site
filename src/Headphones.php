<?php

class Headphones
{
    private $brand;
    private $make;
    private $style;
    private $description;
    private $price;


    function __construct($brand, $make, $style, $description, $price)
    {
        $this->brand = $brand;
        $this->make = $make;
        $this->style = $style;
        $this->description = $description;
        $this->price = $price;
    }

    function getBrand()
    {
        return $this->brand;
    }

    function getMake()
    {
        return $this->make;
    }

    function getStyle()
    {
        return $this->style;
    }

    function getDescription()
    {
        return $this->description;
    }

    function getPrice()
    {
        return $this->price;
    }

    


}

?>
