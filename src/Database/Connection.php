<?php

namespace Pressbooks\Database;

/**
 * Class Connection
 *
 * @package Pressbooks\Database
 */
class Connection
{
    /**
     * @var \Pressbooks\Database\Engine
     */
    private Engine $engine;

    /**
     * Connection constructor.
     *
     * @param  \Pressbooks\Database\Engine  $engine
     */
    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
        $this->engine->connect();
    }

    /**
     * @param $data
     */
    public function insert($data)
    {
        $this->engine->insert($data);
    }

    /**
     * @return mixed
     */
    public function getRecords()
    {
        return $this->engine->getAll();
    }
}
