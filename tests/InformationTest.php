<?php
use Nathalie\Exam16\InformationRepo;
use Nathalie\Exam16\DatabaseConnection;

/**
 * Class ArticleTest
 */
class InformationTest extends PHPUnit_Framework_TestCase
{
    private $database;

    public function setUp()
    {
        $databaseConnection = new DatabaseConnection();
        $this->database     = $databaseConnection->connect();
    }

    public function testGetById()
    {
        $informationRepo = new InformationRepo($this->database);
        $information     = $informationRepo->getById(1);

        $this->assertEquals('Slogan', $information->Information_Name);
    }

    public function testGetAll()
    {
        $informationRepo = new InformationRepo($this->database);
        $all             = $informationRepo->getAll();

        $this->assertEquals(5, count($all));
        $this->assertEquals('Slogan', $all[0]->Information_Name);
        $this->assertEquals('Description', $all[1]->Information_Name);
        $this->assertEquals('Opening Hours', $all[2]->Information_Name);
        $this->assertEquals('Phone', $all[3]->Information_Name);
        $this->assertEquals('Email', $all[4]->Information_Name);
    }

    public function testGetByName()
    {
        $informationRepo = new InformationRepo($this->database);
        $information     = $informationRepo->getByName('Email');

        $this->assertEquals('nathalie.braczek@gmx.de', $information->Information_Content);
    }
}