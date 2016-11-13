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
 * Class DatabaseConnection
 *
 * @package Nathalie\Exam16
 */
class DatabaseConnection
{
    /**
     * Create database connection
     *
     * @return \mysqli
     */
    public function connect()
    {
        return mysqli_connect('', '', '', '');
    }
}
