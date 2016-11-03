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
 * Class ArticleRepo
 *
 * @package Nathalie\Exam16
 */
class ArticleRepo extends Repository
{
    protected $table = 'article';
    protected $prefix = 'Article_';

    /**
     * @return object|\stdClass
     */
    public function getNewest()
    {
        return $this->getOne("SELECT * FROM {$this->table} ORDER BY {$this->prefix}Created DESC");
    }

    /**
     * @param string $orderDirection
     *
     * @return array
     */
    public function getAll($orderDirection = 'DESC')
    {
        return $this->getMultiple("SELECT * FROM {$this->table} ORDER BY {$this->prefix}Created $orderDirection");
    }
}
