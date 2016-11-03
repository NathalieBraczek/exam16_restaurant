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
 * Class ReservationRepo
 *
 * @package Nathalie\Exam16
 */
class ReservationRepo extends Repository
{
    protected $table = 'reservations';
    protected $prefix = 'Reservations_';

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
     * @param string     $date
     * @param string $time
     *
     * @return array
     */
    public function getByDateTime($date, $time = null)
    {
        return $this->getMultiple("SELECT * FROM reservations WHERE Reservations_Date='$date'" .  self::getTimeConstraint($time));
    }
}
