<?php
    function db_connect()
        {
            $db = new PDO('mysql:host=localhost:3306;dbname=benifital_database_1071', 'root', '');
            $db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
            return $db;
        }
?>