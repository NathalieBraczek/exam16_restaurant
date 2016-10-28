<?php
/**
 * Created by PhpStorm.
 * User: Nathalie
 * Date: 24-10-2016
 * Time: 18:22
 */

namespace Nathalie\Exam16;

/**
 * Class BoardsRepo
 *
 * @package Nathalie\Exam16
 */
class BoardsRepo
{
    /** @var  \mysqli */
    private $database;

    /**
     * BoardsRepo constructor.
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
        $sql    = "SELECT * FROM boards WHERE Boards_ID=" . (int)$id;
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        return $result->fetch_object();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql    = "SELECT * FROM boards";
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[] = (object)$row;
        }

        return $all;
    }

    /**
     * @param $date
     * @param $time
     *
     * @return array
     */
    public function getOccupied($date, $time = null)
    {
        $sql    = "SELECT * FROM boards LEFT JOIN reservations ON Reservations_Board_ID=Boards_ID";
        $sql .= " WHERE Reservations_Date='$date'" . ReservationsRepo::getTimeConstraint($time);
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[] = (object)$row;
        }

        return $all;
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
        $sql    = "SELECT * FROM boards WHERE Boards_ID NOT IN (" . implode(',', $ids) . ") AND Boards_Seats >= " . (int) $seats;
        $result = mysqli_query($this->database, $sql, MYSQLI_ASSOC);

        $all = [];

        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
        {
            $all[] = (object)$row;
        }

        return $all;
    }
}
