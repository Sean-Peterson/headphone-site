<?php

class Headphones
{
    private $brand;
    private $make;
    private $style;
    private $description;
    private $price;
    private $id;


    function __construct($brand, $make, $style, $description, $price, $id=null)
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

    function getId()
    {
        return $this->id;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM headphones;");
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO headphones (brand, make, style, description, price) VALUES ('{$this->brand}', '{$this->make}', '{$this->style}', '{$this->description}', {$this->price});");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM headphones WHERE id = {$this->getId()};");
        }

        static function getAll()
            {
                $returned_headphones = $GLOBALS['DB']->query("SELECT * FROM headphones;");
                $headphones = array();
                foreach($returned_headphones as $headphone)
                {
                    $new_headphone = new headphones($headphone['brand'], $headphone['make'], $headphone['style'], $headphone['description'], $headphone['price']);
                    array_push($headphones, $new_headphone);
                }
                return $headphones;
            }

            static function findHeadphone($id)
            {
                $find_headphone = $GLOBALS['DB']->query("SELECT * FROM headphones WHERE id = {$id};");
                $found_headphone = null;
                foreach($find_headphone as $headphone)
                {
                    $found_headphone = new headphones($headphone['brand'], $headphone['make'], $headphone['style'], $headphone['description'], $headphone['price']);
                }
                return $found_headphone;
            }

            function updateCourse($property, $update_value)
            {
                $GLOBALS['DB']->exec("UPDATE headphones SET {$property} = '{$update_value}' WHERE id = {$this->getId()};");
                $this->$property = $update_value;
            }

            function deleteCourse()
            {
                $GLOBALS['DB']->exec("DELETE FROM headhones WHERE id = {$this->getId()}");
            }


}

?>
