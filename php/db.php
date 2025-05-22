<?php  
 
    class Database {
        private $host = '172.16.117.5';
        private $username = 'mathias';
        private $password = 'azerty1234';
        private $dbname = 'noel';
        private $port = 3306;
        private $connection;
 
        public function __construct() {
            $this->connexion();
        }
    
        public function connexion() {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname, $this->port);
        
            if ($this->connection->connect_error) {
                die(" Erreur de connexion : " . $this->connection->connect_error);
            }
        
            return $this->connection;
        }
        
    }
    
 
 
 
 
 
 
 
?>
 
