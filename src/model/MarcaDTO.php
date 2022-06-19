<?php 

    class marca{
        private $codigo;
        private $nome;

        public function __construct(){

        }

        public function set_codigo($obj){
            $this->codigo = $obj;
        }

        public function get_codigo(){
            return $this->codigo;
        }

        public function set_nome_marca($obj){
            $this->nome = $obj;
        }

        public function get_nome_marca(){
            return $this->nome;
        }
    }

?>