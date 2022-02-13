<?php

namespace App\Database;

use App\Database\MySQLGrammar;
use PDO;
use PDOException;


class Database
{

    public $db;

    public string $user = 'root';

    public string $host = 'localhost';

    public string $password = '';

    public string $dbname = 'education';


    public function __construct()
    {
        if (!$this->db) {
            try {
                $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        }

    }

    public function connect(): PDO
    {
        if (!$this->db) {
            try {
                $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        }
        return $this->db;
    }


    public function query(string $query , $values = [])
    {
        //
    }

    public function create($table, array $data)

    {
        $query = MySQLGrammar::buildInsertQuery($table,array_keys($data));

       $stm = $this->db->prepare($query);

       for ($i = 1 ;$i <=  count($values =  array_values($data)); $i++ ):

           $stm->bindValue($i,$values[$i - 1]);
        endfor;

       return $stm->execute();

    }

    public function read($table)
    {
        $query = MySQLGrammar::buildSelectQuery($table);

        $stm = $this->db->prepare($query);

        $stm->execute();

        $alldata = $stm->fetchAll();

        return $alldata;
    }

    public function update($id , $data)
    {
        //
    }

    public function delete($id)
    {
        //
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->db == null;
    }


}

//var_dump(MySQLGrammar::buildInsertQuery("user",['username'=>'ramadan']));
