<?php
use Nathalie\Exam16\ArticleRepo;
use Nathalie\Exam16\DatabaseConnection;

/**
 * Class ArticleTest
 */
class ArticleTest extends PHPUnit_Framework_TestCase
{
    private $database;

    public function setUp()
    {
        $databaseConnection = new DatabaseConnection();
        $this->database     = $databaseConnection->connect();
    }

    public function testGetById()
    {
        $articleRepo = new ArticleRepo($this->database);
        $article     = $articleRepo->getById(1);

        $this->assertEquals('Article One', $article->Article_Title);
    }

    public function testGetNewest()
    {
        $articleRepo = new ArticleRepo($this->database);
        $article     = $articleRepo->getNewest();

        $this->assertEquals('2016-10-08', $article->Article_Created);
    }

    public function testGetAll()
    {
        $articleRepo = new ArticleRepo($this->database);
        $all         = $articleRepo->getAll();

        $this->assertEquals(2, count($all));
        $this->assertEquals('2016-10-08', $all[0]->Article_Created);
        $this->assertEquals('2016-10-01', $all[1]->Article_Created);
    }
}