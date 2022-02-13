<?php

namespace App\User;
use App\Database\Database;

class  Admin

{
    public Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;

    }

    public function insert()
    {
      $query = "SELECT * FROM user";
      return $query;
    }
}
