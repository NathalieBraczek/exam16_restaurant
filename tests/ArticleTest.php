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

        $this->assertEquals('Oldest Article', $article->Article_Title);
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
        $all         = array_values($articleRepo->getAll());

        $this->assertEquals(2, count($all));
        $this->assertEquals('2016-10-08', $all[0]->Article_Created);
        $this->assertEquals('2016-10-01', $all[1]->Article_Created);
    }

    /**
     * @return int
     */
    public function testCreate()
    {
        $articleRepo = new ArticleRepo($this->database);
        $id          = $articleRepo->save([
            'Article_ID'      => '',
            'Article_Title'   => 'Test Article',
            'Article_Created' => '2016-11-04',
            'Article_Content' => 'This article is for testing purposes only.',
        ]);

        $this->assertNotEmpty($id);

        $article = $articleRepo->getById($id);

        $this->assertEquals('Test Article', $article->Article_Title);

        return $id;
    }

    /**
     * @param $id
     *
     * @depends testCreate
     */
    public function testUpdate($id)
    {
        $articleRepo            = new ArticleRepo($this->database);
        $article                = $articleRepo->getById($id);
        $article->Article_Title = 'Changed Title';

        $this->assertEquals($id, $articleRepo->save(get_object_vars($article)));

        $article = $articleRepo->getById($id);

        $this->assertEquals('Changed Title', $article->Article_Title);

        return $id;
    }

    /**
     * @param $id
     *
     * @depends testUpdate
     */
    public function testDelete($id)
    {
        $articleRepo = new ArticleRepo($this->database);
        $articleRepo->delete($id);

        $this->assertArrayNotHasKey($id, $articleRepo->getAll());
    }
}
