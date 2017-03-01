<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Headphones.php";

$server = 'mysql:host=localhost:3306;dbname=headphones_site_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class HeadphonesTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Headphones::deleteAll();
    }
    function test_getters()
    {
        // Arrange
        $brand = "Monoprice";
        $make = "M1060";
        $style = "Open-Back";
        $description = "Seriously a steal for $300. They sound as good as $1000 headphones";
        $price = 300;
        $id = 1;
        $test_headphones = new Headphones ($brand, $make, $style, $description, $price, $id);
        // Act
        $result = array ($test_headphones->getBrand(), $test_headphones->getMake(),$test_headphones->getStyle(), $test_headphones->getDescription(),$test_headphones->getPrice(), $test_headphones->getId());
        $expected_result = array($brand, $make, $style, $description, $price, null);
        // Assert
        $this->assertEquals($result, $expected_result);
    }

}
?>
