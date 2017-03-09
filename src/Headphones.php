<?php

class Headphones
{
    private $model;
    private $price;
    private $description;
    private $brand_id;
    private $style_id;
    private $design_id;
    private $connection_id;
    private $setting_id;
    private $portability_id;
    private $signature_id;
    private $price_table_id;
    private $id;


    function __construct($model, $price, $description, $brand_id, $style_id, $design_id, $connection_id, $setting_id, $portability_id, $signature_id, $price_table_id, $id=null)
    {
        $this->model = $model;
        $this->price = $price;
        $this->description = $description;
        $this->brand = $brand_id;
        $this->style = $style_id;
        $this->design = $design_id;
        $this->connection = $connection_id;
        $this->setting = $setting_id;
        $this->portability = $portability_id;
        $this->signature = $signature_id;
        $this->price_table = $price_table_id;
        $this->id = $id;
    }

    function getModel()
    {
        return $this->model;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getDescription()
    {
        return $this->description;
    }

    function getBrandId()
    {
        return $this->brand_id;
    }

    function getStyleId()
    {
        return $this->style_id;
    }

    function getDesignId()
    {
        return $this->design_id;
    }

    function getConnectionId()
    {
        return $this->connection_id;
    }

    function getSettingId()
    {
        return $this->setting_id;
    }

    function getPortabiliityId()
    {
        return $this->portability_id;
    }

    function getSignatureId()
    {
        return $this->signature_id;
    }
    function getPriceTableId()
    {
        return $this->price_table_id;
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
