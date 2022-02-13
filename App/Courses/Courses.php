<?php
namespace App\Courses;

use App\Database\Database;



class Courses
{

    public Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;

    }

}