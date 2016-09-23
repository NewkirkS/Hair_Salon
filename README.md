# _Hair Salon_

#### _9-23-16_

#### By _**Stephen Newkirk**_

## Description

_Website allowing user to manage stylists and their clients._

## Specifications

| Behavior      | Input       |Output|
| ------------- |-------------| -----|
| 1: Store new stylists | "Jim" | "Jim" |
| 2: Display a list of all stylists stored | "Jim", "Jen" | "Jim", "Jen" |
| 3: Delete a specific stylist from the list | Click delete button on "Jim" | "Jim" deleted |
| 4: Update a specific stylist from the list | "Jim": new name = "Jill" | "Jill" |
| 5: Store clients of particular stylists | "Jim" > "Jennifer" | "Jennifer" |
| 6: Display a list of all of a stylist's clients | Click "Jim" | "Jennifer", "Jason" |
| 7: Delete a specific client from a stylist | Click delete on "Jennifer" | *Deleted* |
| 8: Update a Client in a cuisine | New Name = "Jasper" | "Jennifer" -> "Jasper" |



## Setup/Installation Requirements

_In Terminal:_

`git clone 'URL'`

`$ cd 'directory name'`

`$ composer install`

`$ cd web`

`$ php -S localhost:8000`

_In Browser:_

`localhost:8000`

_Database:_

_Import compressed database from project folder in PHPMyAdmin or create from manual instructions_

## Manual Database Setup Instructions

_In Terminal:_

`mysql -uroot -proot`

`CREATE DATABASE hair_salon;`

`USE hair_salon;`

`CREATE TABLE stylist (id serial PRIMARY KEY, name VARCHAR (255));`

`CREATE TABLE client (id serial PRIMARY KEY, name VARCHAR (255), stylist_id INT);`

****Make copy of hair_salon named hair_salon_test in PHPMyAdmin, copying all tables and columns but no data.****

## Known Bugs

_None yet_

## Support and contact details

_Stephen Newkirk: newkirk771@gmail.com_

## Technologies Used

_HTML,
PHP,
Silex,
Twig,
PHPUnit,
MySQL_

### License

*This webpage is licensed under the MIT license.*

Copyright (c) 2016 **_Stephen Newkirk_**
