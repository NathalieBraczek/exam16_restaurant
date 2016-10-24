<?php
namespace Nathalie\Exam16;

class DatabaseConnection
{
    public function connect()
    {
        return new \PDO('mysql://localhost/restaurant', 'root', '');
    }
}
