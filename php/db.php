<?php  
 
    class POO {
        private $host = '172.16.117.6';  //192.168.0.2 
        private $username = 'yohan';
        private $password = 'yohan';
        private $dbname = 'noel';
        private $port = 3306;
        private $connection;
 
        public function __construct() {
            $this->connexion();
        }
    
        public function connexion() {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname, $this->port);
        
            if ($this->connection->connect_error) {
                die("Erreur de connexion : " . $this->connection->connect_error);
            }
        
            //var_dump($this->connection); 
            return $this->connection;
        }
        

        public function getConnection() {
            return $this->connection;
        }
    
        public function deconnexion() {
            if ($this->connection) {
                $this->connection->close();
            }
        }
    
        
    }
    
 
 
 
?>
 