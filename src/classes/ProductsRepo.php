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
 * Class ProductsRepo
 *
 * @package Nathalie\Exam16
 */
class ProductsRepo
{
    /** @var  \mysqli */
    private $database;

    /**
     * ProductsRepo constructor.
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
        $sql    = "SELECT * FROM products WHERE Product_ID=" . (int)$id;
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        return $result->fetch_object();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql    = "SELECT * FROM products";
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[] = (object)$row;
        }

        return $all;
    }

    /**
     * @param $restriction
     *
     * @return array
     */
    public function getByRestriction($restriction)
    {
        $sql    = "SELECT * FROM products WHERE Product_Restriction='" . $restriction . "'";
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[] = (object)$row;
        }

        return $all;
    }

    /**
     * @param $category
     *
     * @return array
     */
    public function getByCategory($category)
    {
        $sql    = "SELECT * FROM products WHERE Product_Category='" . $category . "'";
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[] = (object)$row;
        }

        return $all;
    }

    /**
     * @return object|\stdClass
     */
    public function getSpecial()
    {
        $sql    = "SELECT * FROM products WHERE Product_Special=1";
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        return $result->fetch_object();
    }

    /**
     * @param $category
     * @param $restiction
     *
     * @return array
     */
    public function getFiltered($category, $restiction)
    {
        $conditions   = ['1=1'];
        $conditions[] = empty($category) ? "" : "Product_Category='" . $category . "'";
        $conditions[] = empty($restiction) ? "" : "Product_Restriction='" . $restiction . "'";

        $sql    = "SELECT * FROM products WHERE " . implode(' AND ', array_filter($conditions));
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[] = (object)$row;
        }

        return $all;
    }
}
