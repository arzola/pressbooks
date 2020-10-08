<?php

namespace Pressbooks\Database\Drivers;

use Pressbooks\Database\Engine;

class Sqlite implements Engine
{
    private $connection;

    private string $path;

    private string $table;

    /**
     * Sqlite constructor.
     *
     * @param  string  $path
     */
    public function __construct(string $path, $table = 'default')
    {
        $this->path = $path;
        $this->table = $table;
    }

    public function createTable()
    {
        $tableCreationScript = "CREATE TABLE IF NOT EXISTS {$this->table} ( name TEXT, weight INTEGER )";
        $this->connection->exec($tableCreationScript);
    }

    public function getAll() : array
    {
        $items = [];

        $stmt = $this->connection->query("SELECT * FROM {$this->table}");

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $items[] = $row;
        }
        return $items;

    }

    public function connect()
    {
        if ($this->connection === null) {
            $this->connection = new \PDO("sqlite:".$this->path);
        }

        $this->createTable();

        return $this->connection;
    }

    public function insert($data)
    {
        $sql = "INSERT INTO {$this->table}(name,weight) VALUES(:name,:weight)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':weight', $data['weight']);
        $stmt->execute();

        return $this->connection->lastInsertId();
    }
}
