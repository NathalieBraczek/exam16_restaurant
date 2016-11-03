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
 * Class BoardsRepo
 *
 * @package Nathalie\Exam16
 */
class BoardRepo extends Repository
{
    protected $table = 'boards';
    protected $prefix = 'Boards_';

    /**
     * @param $date
     * @param $time
     *
     * @return array
     */
    public function getOccupied($date, $time = null)
    {
        $sql    = "SELECT * FROM boards LEFT JOIN reservations ON Reservations_Board_ID=Boards_ID";
        $sql .= " WHERE Reservations_Date='$date'" . ReservationRepo::getTimeConstraint($time);

        return $this->getMultiple($sql);
    }

    /**
     * @param $date
     * @param $time
     * @param $seats
     *
     * @return array
     */
    public function getAvailable($date, $time, $seats)
    {
        $ids = [];
        foreach ($this->getOccupied($date, $time) as $board)
        {
            $ids[] = $board->Boards_ID;
        }

        return $this->getMultiple("SELECT * FROM boards WHERE Boards_ID NOT IN (" . implode(',', $ids) . ") AND Boards_Seats >= " . (int) $seats);
    }
}
