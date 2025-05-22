<?php

    include('php/db.php');

    class AppMVC{

        private $dbb;

        public function _construct(){
            $this -> dbb = new POO();
        }

        public function pageAcceuil(){
            include('template/PageAcceuil.html');
        }
    

    }

?>