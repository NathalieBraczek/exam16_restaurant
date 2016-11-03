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
            $all[] = (object)$row;
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
     */
    public function delete($id)
    {

    }
}
