<?php
use Nathalie\Exam16\DatabaseConnection;
use Nathalie\Exam16\ProductsRepo;

/**
 * Class ProductsTest
 */
class ProductsTest extends PHPUnit_Framework_TestCase
{
    private $database;

    public function setUp()
    {
        $databaseConnection = new DatabaseConnection();
        $this->database     = $databaseConnection->connect();
    }

    public function testGetById()
    {
        $productsRepo = new ProductsRepo($this->database);
        $products     = $productsRepo->getById(1);

        $this->assertEquals('The Trump', $products->Product_Title);
    }

    public function testGetAll()
    {
        $productsRepo = new ProductsRepo($this->database);
        $all          = $productsRepo->getAll();

        $this->assertEquals(5, count($all));
    }

    public function testGetByRestriction()
    {
        $productsRepo = new ProductsRepo($this->database);
        $restriction  = $productsRepo->getByRestriction('vegan');

        $this->assertEquals(1, count($restriction));
    }
    public function testGetByCategory()
    {
        $productsRepo = new ProductsRepo($this->database);
        $category  = $productsRepo->getByCategory('food');

        $this->assertEquals(3, count($category));
    }
}