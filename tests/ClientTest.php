<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $server = "mysql:host=localhost;dbname=hair_salon_test";
    $username = "root";
    $password = "root";
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        function test_getId()
        {
            //Arrange
            $id = 1;
            $name = "Santa";
            $test_client = new Client($name, $id);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        // function test_getName()
        // {
        //     //Arrange
        //     $name = "Jim";
        //     $test_client = new Client($name);
        //
        //     //Act
        //     $result = $test_client->getName();
        //
        //     //Assert
        //     $this->assertEquals($name, $result);
        // }
        //
        // function test_setName()
        // {
        //     //Arrange
        //     $name = "Jim";
        //     $test_client = new Client($name);
        //
        //     $new_name = "Phil";
        //
        //     //Act
        //     $test_client->setName($new_name);
        //
        //     //Assert
        //     $this->assertEquals($new_name, $test_client->getName());
        // }
    }

 ?>
