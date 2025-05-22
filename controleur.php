<?php

    include('/db.php');
    include('/template/index.php');

    class AppMVC{

        private $dbb;

        public function _construct(){
            $this -> dbb = new Database();
        }

        public function pageAcceuil(){
            include('template/PageAcceuil.html');
        }
    

    }

?>