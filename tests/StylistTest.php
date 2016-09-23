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
        function tearDown()
        {
            Stylist::deleteAll();
        }

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

        function test_save()
        {
            //Arrange
            $name = "Jim";
            $test_stylist = new Stylist($name);

            //Act
            $test_stylist->save();

            //Assert
            $result = Stylist::getAll();
            $this->assertEquals([$test_stylist], $result);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Jim";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Jeremy";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Jim";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Jeremy";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act
            Stylist::deleteAll();

            //Assert
            $result = Stylist::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $name = "Jim";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Jeremy";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            $name3 = "Justin";
            $test_stylist3 = new Stylist($name3);
            $test_stylist3->save();

            //Act
            $result = Stylist::find($test_stylist->getId());

            //Assert
            $this->assertEquals($test_stylist, $result);
        }

    }
 ?>
