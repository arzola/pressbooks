<?php

use Pressbooks\Astronaut;
use Pressbooks\Spaceship;

test('chinese string is correctly interpolated', function() {

    $string = 'drinking giving jogging 喝 喝 passing 制图 giving 跑步 吃';

    $result = cleanFancyString($string);

    $this->assertEquals('drinking giving jogging passing吃步跑图制喝喝',$result);

});

test('if astronaut can be created', function() {

    $astronaut = new Astronaut('Os',123.4);

    $this->assertEquals('Os',$astronaut->name);
    $this->assertEquals(123.4,$astronaut->weight);
    $this->assertTrue(is_float($astronaut->weight));

});

test('if an astronaut cannot be created without params', function() {
    $astronaut = new Astronaut();
})->throws(ArgumentCountError::class);


test('if an astronaut data types are validated runtime', function() {
    $astronaut = new Astronaut(7877,'o');
})->throws(TypeError::class);


test('if weight can be added to the astronaut', function() {

    $astronaut = new Astronaut('Maria',100);

    $astronaut->addWeight(40);

    $this->assertEquals(140,$astronaut->weight);

});


test('if astronaut spaceship can launch a heavy astronaut', function() {

    $joe = new Astronaut('Joe L',400);
    $jenny = new Astronaut('Jennifer M',150);

    $launchResult = Spaceship::launch($joe);
    $launchResult2 = Spaceship::launch($jenny);

    $this->assertEquals('Joe L too heavy, grounded.',$launchResult);
    $this->assertEquals('Jennifer M going where no human has gone before.',$launchResult2);

});
