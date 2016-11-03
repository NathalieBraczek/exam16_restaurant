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
class InformationRepo extends Repository
{
    protected $table = 'information';
    protected $prefix = 'Information_';

    /**
     * @param $name
     *
     * @return object|\stdClass
     */
    public function getByName($name)
    {
        return $this->getOne("SELECT * FROM information WHERE Information_Name='" . $name . "'");
    }
}
