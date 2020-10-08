<?php

use Pressbooks\Database\Drivers\Sqlite;
use Pressbooks\Database\Drivers\Mysql;
use Pressbooks\Database\Connection;

test('if database record is created with SQLite adapter', function() {

    $db =  new Connection(new Sqlite('db/nasa.sqlite','astronaut'));

    $db->insert(['name'=>'Oscar','weight'=>100]);

    $records = $db->getRecords();

    $this->assertEquals('Oscar',$records[0]['name']);

    unlink('db/nasa.sqlite');

});


test('if database record is created with MySQL adapter', function() {

    /*
     * I created a mock implementation of MySQL but in the real world it would be used like this
     * new Connection(new Mysql('localhost','astronaut','nasa','nasa'));
     */

    $mock = $this->createMock(Mysql::class);

    $mock->method('insert')
        ->willReturn(1);

    $mock->method('getAll')
        ->willReturn([
            [
                'name' => 'Oscar',
                'weight'=>100
            ]
        ]);

    $db =  new Connection($mock);

    $db->insert(['name'=>'Oscar','weight'=>100]);

    $records = $db->getRecords();

    $this->assertEquals('Oscar',$records[0]['name']);


});
