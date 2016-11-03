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
class ProductRepo extends Repository
{
    protected $table = 'products';
    protected $prefix = 'Product_';

    /**
     * @param $restriction
     *
     * @return array
     */
    public function getByRestriction($restriction)
    {
        return $this->getMultiple("SELECT * FROM products WHERE Product_Restriction='" . $restriction . "'");
    }

    /**
     * @param $category
     *
     * @return array
     */
    public function getByCategory($category)
    {
        return $this->getMultiple("SELECT * FROM products WHERE Product_Category='" . $category . "'");
    }

    /**
     * @return object|\stdClass
     */
    public function getSpecial()
    {
        return $this->getOne("SELECT * FROM products WHERE Product_Special=1");
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

        return $this->getMultiple("SELECT * FROM products WHERE " . implode(' AND ', array_filter($conditions)));
    }
}
