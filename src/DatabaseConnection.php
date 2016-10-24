<?php
/**
 * This file is part of the exam project.
 *
 * @since   1.0.0
 * @author  Nathalie Braczek <nathalie.braczek.gmx.de>
 * @license MIT, see LICENCE
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
     * @return \PDO
     */
    public function connect()
    {
        return new \PDO('mysql://localhost/restaurant', 'root', '');
    }
}
