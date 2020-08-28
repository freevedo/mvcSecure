<?php
 
    abstract class Model
    {
        private static $_bdd;

        private static $dbHost = "localhost";
        private static $dbName = "mvc";
        private static $dbUsername = "root";
        private static $dbUserpassword = "";

        private static $connection = null;
    
        private static function connect()
        {
            if(self::$connection == null)
            {
                try
                {
                    self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUsername, self::$dbUserpassword);
                }
                catch(PDOException $e)
                {
                    die($e->getMessage());
                }
            }
            return self::$connection;
        }
        public static function disconnect()
        {
            self::$connection = null;
        }

        public function getAll($table,$obj)
        {
            $db = Model::connect();
            $var = [];
            $req = $db->prepare('SELECT *FROM ' .$table. ' ORDER BY id desc');
            $req->execute();
            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $var[] = new $obj($data);
            }
            return $var;
            $req->closeCursor();
        }
    }