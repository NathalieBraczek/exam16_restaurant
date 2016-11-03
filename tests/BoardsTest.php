<?php
use Nathalie\Exam16\BoardRepo;
use Nathalie\Exam16\DatabaseConnection;

/**
 * Class BoardsTest
 */
class BoardsTest extends PHPUnit_Framework_TestCase
{
    private $database;

    public function setUp()
    {
        $databaseConnection = new DatabaseConnection();
        $this->database     = $databaseConnection->connect();
    }

    public function testGetById()
    {
        $boardsRepo = new BoardRepo($this->database);
        $board      = $boardsRepo->getById(1);

        $this->assertEquals(2, $board->Boards_Seats);
    }

    public function testGetAll()
    {
        $boardsRepo = new BoardRepo($this->database);
        $all        = $boardsRepo->getAll();

        $this->assertEquals(10, count($all));
    }

    public function testGetOccupied()
    {
        $boardsRepo = new BoardRepo($this->database);
        $boards     = $boardsRepo->getOccupied('2016-10-31', '19:00');

        $this->assertEquals(1, count($boards));
        $this->assertEquals(2, $boards[0]->Boards_ID);
    }

    public function testGetAvailable()
    {
        $boardsRepo = new BoardRepo($this->database);
        $boards     = $boardsRepo->getAvailable('2016-10-31', '19:00', 2);

        $this->assertEquals(9, count($boards));
    }
}