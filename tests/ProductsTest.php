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

    /**
     * @return array
     */
    public function dataRestrictions()
    {
        return [
            'Vegan'       => ['Vegan', 1],
            'Vegetarian'  => ['Vegetarian', 1],
            'Normal'      => ['Normal', 3],
            'Pescetarian' => ['Pescetarian', 0],
        ];
    }

    /**
     * @dataProvider dataRestrictions
     *
     * @param $restriction
     * @param $quantity
     */
    public function testGetByRestriction($restriction, $quantity)
    {
        $productsRepo = new ProductsRepo($this->database);
        $products     = $productsRepo->getByRestriction($restriction);

        $this->assertEquals($quantity, count($products));

        foreach ($products as $product)
        {
            $this->assertEquals($restriction, $product->Product_Restriction);
        }
    }

    /**
     * @return array
     */
    public function dataCategory()
    {
        return [
            'Food'  => ['Food', 3],
            'Drink' => ['Drink', 1],
            'Menue' => ['Menue', 1],
        ];
    }

    /**
     * @param $category
     * @param $quantity
     * @dataProvider dataCategory
     */
    public function testGetByCategory($category, $quantity)
    {
        $productsRepo = new ProductsRepo($this->database);
        $products     = $productsRepo->getByCategory($category);

        $this->assertEquals($quantity, count($products));

        foreach ($products as $product)
        {
            $this->assertEquals($category, $product->Product_Category);
        }
    }
}