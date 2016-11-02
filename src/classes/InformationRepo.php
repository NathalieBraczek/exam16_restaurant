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
 * Class InformationRepo
 *
 * @package Nathalie\Exam16
 */
class InformationRepo
{
    /** @var  \mysqli */
    private $database;

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
     * @param integer $id
     *
     * @return object|\stdClass
     */
    public function getById($id)
    {
        $sql    = "SELECT * FROM information WHERE Information_ID=" . (int)$id;
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        return $result->fetch_object();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql    = "SELECT * FROM information";
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[] = (object)$row;
        }

        return $all;
    }

    /**
     * @param $name
     *
     * @return object|\stdClass
     */
    public function getByName($name)
    {
        $sql    = "SELECT * FROM information WHERE Information_Name='" . $name . "'";
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        return $result->fetch_object();
    }
}
