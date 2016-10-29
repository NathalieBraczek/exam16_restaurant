<?php
/**
 * Created by PhpStorm.
 * User: Nathalie
 * Date: 24-10-2016
 * Time: 18:22
 */

namespace Nathalie\Exam16;

/**
 * Class ArticleRepo
 *
 * @package Nathalie\Exam16
 */
class ArticleRepo
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
        $sql    = "SELECT * FROM article WHERE Article_ID=" . (int)$id;
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        return $result->fetch_object();
    }

    /**
     * @return object|\stdClass
     */
    public function getNewest()
    {
        $sql    = "SELECT * FROM article ORDER BY Article_Created DESC";
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        return $result->fetch_object();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql    = "SELECT * FROM article ORDER BY Article_Created DESC";
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[] = (object)$row;
        }

        return $all;
    }

}
