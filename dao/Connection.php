<?php
    namespace dao;
    class Connection{
        public $myPdo;
        public function Conectar()
        {
            try {
                $this->myPdo = new \PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PASS);
                return $this->myPdo;
            } catch (PDOException $e) {
                print "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    }
?>
