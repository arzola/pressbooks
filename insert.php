<?php

require_once 'vendor/autoload.php';

use Pressbooks\Database\Connection;
use Pressbooks\Database\Drivers\Sqlite;

$name = $_REQUEST['name'];
$weight = $_REQUEST['weight'];


if(!is_numeric($weight) || preg_match('/^[a-zA-Z\s]+$/',$name) !== 1) {

    die(
    'Validation Error'
    );

}

$connection = new Connection(new Sqlite('db/nasa.sqlite','astronauts'));

//This could be easily swaped to a MySQL Database just changing the Driver

//$connection = new Connection(new Mysql());

$connection->insert(
    ['name' => $name, 'weight' => $weight]
);

print_r($connection->getRecords());
