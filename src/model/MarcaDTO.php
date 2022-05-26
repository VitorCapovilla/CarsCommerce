<?php 

    class MarcaDTO{
        private $codigo;
        private $marca;

        public function __construct(){

        }

        public function set_codigo($obj){
            $this->codigo = $obj;
        }

        public function get_codigo(){
            return $this->codigo;
        }

        public function set_marca($obj){
            $this->marca = $obj;
        }

        public function get_marca(){
            return $this->marca;
        }
    }

?>