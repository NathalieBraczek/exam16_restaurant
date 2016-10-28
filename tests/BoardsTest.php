<?php
use Nathalie\Exam16\BoardsRepo;
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
        $boardsRepo = new BoardsRepo($this->database);
        $boards     = $boardsRepo->getById(1);

        $this->assertEquals(2, $boards->Boards_Seats);
    }

    public function testGetAll()
    {
        $boardsRepo = new BoardsRepo($this->database);
        $all         = $boardsRepo->getAll();

        $this->assertEquals(10, count($all));
    }
}