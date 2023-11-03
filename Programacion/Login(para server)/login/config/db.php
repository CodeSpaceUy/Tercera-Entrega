<?php

/*Conexion a la base de datos 
/ @return PDO
*/

    class db{
        private $host="localhost";
        private $dbname="tutoria";
        private $user="root";
        private $password="";


        public static function conexion(){
            try {
                $PDO = new PDO("mysql:host=localhost;dbname=tutoria","root","");
                return $PDO;
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }

 
?>