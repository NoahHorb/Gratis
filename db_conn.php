<?php

class Database {
    public function connect() {
        try {
            // Change this to your connection info.
            $DATABASE_USER = 'root';
            $DATABASE_PASS = '';
            $database = new PDO("mysql:host=localhost;dbname=gratis;port=3306", $DATABASE_USER, $DATABASE_PASS);
            return $database;
        } catch(PDOException $e) {
            exit('Failed to connect to database: ' . mysqli_connect_error());
            die();
        }
    }
}
