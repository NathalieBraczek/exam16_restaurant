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
 * Class ReservationsRepo
 *
 * @package Nathalie\Exam16
 */
class ReservationsRepo
{
    /** @var  \mysqli */
    private $database;

    /**
     * ReservationsRepo constructor.
     *
     * @param $database
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    /**
     * @param $time
     *
     * @return string
     */
    public static function getTimeConstraint($time):string
    {
        $constraint = '';
        if (!is_null($time))
        {
            list($hour, $minute) = explode(':', $time);
            $from       = $hour . ':' . $minute . ':00';
            $till       = ($hour + 2) . ':' . $minute . ':00';
            $constraint = " AND Reservations_Time BETWEEN '$from' AND '$till'";

            return $constraint;
        }

        return $constraint;
    }

    /**
     * @param integer $id
     *
     * @return object|\stdClass
     */
    public function getById($id)
    {
        $sql    = "SELECT * FROM reservations WHERE Reservations_ID=" . (int)$id;
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        return $result->fetch_object();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql    = "SELECT * FROM reservations";
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[] = (object)$row;
        }

        return $all;
    }

    /**
     * @param string     $date
     * @param string $time
     *
     * @return array
     */
    public function getByDateTime($date, $time = null)
    {
        $sql    = "SELECT * FROM reservations WHERE Reservations_Date='$date'" .  self::getTimeConstraint($time);
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[] = (object)$row;
        }

        return $all;
    }
}
