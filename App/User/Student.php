<?php

namespace App\User;
use App\Database\Database;

class  Student

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


    public function insert(string $username, string $email, string $password)
    {
       // return $this->db->create($username,$email,$password);
        $sql = "INSERT INTO users(`username`,email,`password`) VALUES(?,?,?)";
        $stm = $this->db->prepare($sql);

        //$stm->execute([$username, $email, $password]);

        $stm->execute([$username, $email, $password]);
    }


}
