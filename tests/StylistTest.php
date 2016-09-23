<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    // require_once "src/Client.php";

    $server = "mysql:host=localhost;dbname=hair_salon_test";
    $username = "root";
    $password = "root";
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {

        function test_getId()
        {
            //Arrange
            $id = 1;
            $name = "Jim";
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function test_getName()
        {
            //Arrange
            $name = "Jim";
            $test_stylist = new Stylist($name);

            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "Jim";
            $test_stylist = new Stylist($name);

            $new_name = "Phil";

            //Act
            $test_stylist->setName($new_name);

            //Assert
            $this->assertEquals($new_name, $test_stylist->getName());
        }

    }
 ?>
