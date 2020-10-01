<?php

namespace Core;

class Db
{

    private static $instance = null;
    private $conn;
    private $table;
    private $query;


    private function __construct()
    {
        $this->conn = new \mysqli("localhost", "root", "", "posts");
        if ($this->conn->connect_error) {
            die("Connection Field: " . $this->conn->connect_error);
        }

    }

    public static function getInstance()
    {
        if (!Db::$instance) {
            Db::$instance = new Db();
        }

        return Db::$instance;
    }


    public function table(string $table)
    {
        $this->table = $table;
        $this->query = '';
        return $this;
    }


    public function select(string $fields = "*")
    {
        $this->query = "SELECT $fields FROM $this->table";
        return $this;

    }

    public function where(string $filed, string $op, $value)
    {
        $this->query .= " WHERE $filed $op $value";
        return $this;
    }

    public function andWhere(string $filed, string $op, $value)
    {
        $this->query .= " AND $filed $op '$value'";
        return $this;
    }

    public function orWhere(string $field, string $op, $value)
    {
        $this->query .= " OR $field $op '$value'";
        return $this;
    }

    public function orderBy(string $field, string $dir = "ASC")
    {
        $this->query .= " ORDER BY $field $dir";
        return $this;
    }

    public function limit(int $number)
    {
        $this->query .= " LIMIT $number";
        return $this;
    }


    public function get()
    {

        $result = $this->conn->query($this->query);
        if ($result->num_rows > 0) {

            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }


    public function getOne()
    {
        $this->query .= " LIMIT 1";
        $result = $this->conn->query($this->query);
        if ($result->num_rows > 0) {

            return $result->fetch_assoc();
        } else {
            return [];
        }
    }

    public function insert(array $data)
    {
        $keys = '';
        $values = '';
        foreach ($data as $key => $value) {

            $keys .= "`$key`,";
            $values .= "'$value',";

        }

        $keys = substr($keys, 0, -1);
        $values = substr($values, 0, -1);
        $this->query .= " INSERT INTO $this->table ($keys) VALUES ($values)";
        return $this;
    }

    public function delete()
    {
        $this->query .= " DELETE FROM $this->table";
        return $this;
    }

    public function save()
    {
        $this->conn->query($this->query);
        return $this;
    }


    public function update(array $data)
    {
        $set = '';

        foreach ($data as $key => $value) {

            $set .= "`$key` = '$value' ,";
        }

        $set = substr($set, 0, -1);
        $this->query .= " UPDATE $this->table SET $set";
        return $this;
    }

}