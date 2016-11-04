<?php
use Nathalie\Exam16\DatabaseConnection;
use Nathalie\Exam16\ReservationRepo;

/**
 * Class ReservationsTest
 */
class ReservationsTest extends PHPUnit_Framework_TestCase
{
    private $database;

    public function setUp()
    {
        $databaseConnection = new DatabaseConnection();
        $this->database     = $databaseConnection->connect();
    }

    public function testGetById()
    {
        $reservationsRepo = new ReservationRepo($this->database);
        $reservations     = $reservationsRepo->getById(1);

        $this->assertEquals('Max Mustermann', $reservations->Reservations_Name);
    }

    public function testGetAll()
    {
        $reservationsRepo = new ReservationRepo($this->database);
        $all         = $reservationsRepo->getAll();

        $this->assertEquals(1, count($all));
    }

    public function testGetByDateTimeWithBothParameters()
    {
        $reservationsRepo = new ReservationRepo($this->database);
        $reservations     = $reservationsRepo->getByDateTime('2016-10-31', '19:00');

        $this->assertEquals(1, count($reservations));
        $this->assertEquals('Max Mustermann', reset($reservations)->Reservations_Name);
    }

    public function testGetByDateTimeWithJustDateParameter()
    {
        $reservationsRepo = new ReservationRepo($this->database);
        $reservations     = $reservationsRepo->getByDateTime('2016-10-31');

        $this->assertEquals(1, count($reservations));
        $this->assertEquals('Max Mustermann', reset($reservations)->Reservations_Name);
    }

    public function testGetByDateTimeWithNoReservation()
    {
        $reservationsRepo = new ReservationRepo($this->database);
        $reservations     = $reservationsRepo->getByDateTime('2016-10-30', '19:00');

        $this->assertEquals(0, count($reservations));
    }
}