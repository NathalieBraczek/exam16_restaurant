<?php
use Nathalie\Exam16\DatabaseConnection;

class DatabaseConnectionTest extends PHPUnit_Framework_TestCase
{
    public function testConnection()
    {
        $database = (new DatabaseConnection)->connect();

        $this->assertInstanceOf(PDO::class, $database, 'Database connection should provide a PDO');
    }
}