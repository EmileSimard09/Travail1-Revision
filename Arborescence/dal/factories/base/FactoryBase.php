<?php

abstract class FactoryBase
{
    //Genere la connexion a la BD
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=sql.decinfo-cchic.ca;port=33306;dbname=h24_web_transac_1832183;charset=utf8', 'dev-1832183', '143Nataniel');
        return $db;
    }
}
