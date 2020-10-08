<?php

namespace Pressbooks;

class Spaceship
{

    public const MAX_WEIGHT_ALLOWED = 200;

    public static function launch(Astronaut $astronaut): string
    {
        if($astronaut->weight > static::MAX_WEIGHT_ALLOWED) {
            return "{$astronaut->name} too heavy, grounded.";
        }

        return "{$astronaut->name} going where no human has gone before.";
    }
}
