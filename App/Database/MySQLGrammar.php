<?php
namespace App\Database;

class MySQLGrammar
{

    public static function buildInsertQuery(string $table, $keys)
    {
        $values = '';

        for ($i =1; $i <= count($keys) ;  $i++) :

            $values .= '?';
            if ($i < count($keys)):
                $values .= ',';
            endif;

        endfor;

        $query = "INSERT INTO" . " " . $table . "(`" . implode('` , `', $keys )  . "`) VALUES(". $values .")";

        return $query;
    }

    public static function buildSelectQuery (string $table)
    {


        return "SELECT * FROM " .  $table;
 
    }

}