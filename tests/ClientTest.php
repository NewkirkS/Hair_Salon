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
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_getId()
        {
            //Arrange
            $id = 1;
            $name = "Santa";
            $test_client = new Client($name, null, $id);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function test_getName()
        {
            //Arrange
            $name = "Santa";
            $test_client = new Client($name);

            //Act
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "Santa";
            $test_client = new Client($name);

            $new_name = "Krampus";

            //Act
            $test_client->setName($new_name);

            //Assert
            $this->assertEquals($new_name, $test_client->getName());
        }

        function test_getStylistId()
        {
            //Arrange
            $stylist_name = "Sandra";
            $test_stylist = new Stylist($stylist_name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Santa";
            $test_client = new Client($name, $stylist_id);

            //Act
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals($stylist_id, $result);
        }

        function test_save()
        {
            //Arrange
            $stylist_name = "Sandra";
            $test_stylist = new Stylist($stylist_name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Santa";
            $test_client = new Client($name, $stylist_id);

            //Act
            $test_client->save();
            $result = Client::getAll();
            //Assert
            $this->assertEquals([$test_client], $result);
        }

        function test_getAll()
        {
            //Arrange
            $stylist_name = "Sandra";
            $test_stylist = new Stylist($stylist_name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Santa";
            $test_client = new Client($name, $stylist_id);
            $test_client->save();

            $name2 = "Krampus";
            $test_client2 = new Client($name2, $stylist_id);
            $test_client2->save();
            //Act

            $result = Client::getAll();
            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $stylist_name = "Sandra";
            $test_stylist = new Stylist($stylist_name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Santa";
            $test_client = new Client($name, $stylist_id);
            $test_client->save();

            $name2 = "Krampus";
            $test_client2 = new Client($name2, $stylist_id);
            $test_client2->save();
            //Act
            Client::deleteAll();
            $result = Client::getAll();
            //Assert
            $this->assertEquals([], $result);
        }
    }

 ?>
