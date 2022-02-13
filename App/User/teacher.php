<?php

namespace App\User;
use App\Database\Database;

class  teacher

{
    public Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;

    }

    public function read()
    {
     $query = "SELECT * FROM user";
    }
}
