<?php

namespace Pressbooks;

/**
 * Class Astronaut
 *
 * @package Pressbooks
 */
class Astronaut
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var float
     */
    public float $weight;

    /**
     * Astronaut constructor.
     *
     * @param  string  $name
     * @param  float  $weight
     */
    public function __construct(string $name,float $weight)
    {
        $this->name = $name;
        $this->weight = $weight;
    }

    /**
     * Function to add pounds to the astronaut
     * @param  float  $pounds
     */
    public function addWeight(float $pounds): void
    {
        $this->weight += $pounds;
    }

}
