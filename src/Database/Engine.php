<?php

namespace Pressbooks\Database;

interface Engine
{
    public function connect();
    public function insert(array $data);
}
