<?php
/**
 * Examen 2016: Restaurant Project
 *
 * @since         1.0.0
 * @author        Nathalie Braczek <nathalie.braczek.gmx.de>
 * @copyright (C) 2016 Nathalie Braczek. All rights reserved.
 * @license       MIT, see LICENCE
 */

namespace Nathalie\Exam16;

/**
 * Class Repository
 *
 * @package Nathalie\Exam16
 */
abstract class Repository
{
    /** @var  \mysqli */
    private $database;

    protected $table;
    protected $prefix;

    /**
     * ArticleRepo constructor.
     *
     * @param $database
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param $sql
     *
     * @return object
     */
    protected function getOne($sql)
    {
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        return $result->fetch_object();
    }

    /**
     * @param $sql
     *
     * @return array
     */
    protected function getMultiple($sql)
    {
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[$row[$this->prefix . 'ID']] = (object)$row;
        }

        return $all;
    }

    /**
     * @param integer $id
     *
     * @return object|\stdClass
     */
    public function getById($id)
    {
        return $this->getOne("SELECT * FROM {$this->table} WHERE {$this->prefix}ID=" . (int)$id);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->getMultiple("SELECT * FROM {$this->table}");
    }

    /**
     * @param $id
     *
     * @return bool|\mysqli_result
     */
    public function delete($id)
    {
        return mysqli_query($this->database, "DELETE FROM {$this->table} WHERE {$this->prefix}ID=" . (int)$id);
    }

    /**
     * @param array $entity
     *
     * @return int
     */
    public function save($entity)
    {
        $cleaned = [];
        foreach ($entity as $key => $value)
        {
            if (preg_match('~^' . $this->prefix . '\w+$~', $key))
            {
                $cleaned[$key] = mysqli_escape_string($this->database, $value);
            }
        }
        if (empty($cleaned["{$this->prefix}ID"]))
        {
            return $this->insert($cleaned);
        }
        return $this->update($cleaned);
    }

    /**
     * @param $entity
     *
     * @return int
     */
    private function insert($entity)
    {
        unset($entity["{$this->prefix}ID"]);

        $columns = implode(',', array_keys($entity));
        $values = "'" . implode("','", array_values($entity)) . "'";

        mysqli_query($this->database, "INSERT INTO {$this->table} ({$columns}) VALUES ($values)");
        return mysqli_insert_id($this->database);
    }

    /**
     * @param $entity
     *
     * @return int
     */
    private function update($entity)
    {
        $id = (int)$entity["{$this->prefix}ID"];
        unset($entity["{$this->prefix}ID"]);

        $assignments = [];
        foreach ($entity as $key => $value)
        {
            $assignments[] = "$key='$value'";
        }
        $assignments = implode(',', $assignments);

        mysqli_query($this->database, "UPDATE {$this->table} SET $assignments WHERE {$this->prefix}ID=$id");
        return $id;
    }
}
