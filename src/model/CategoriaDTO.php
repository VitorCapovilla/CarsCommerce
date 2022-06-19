<?php 

    class categoria{
        private $codigo;
        private $categoria;

        public function set_codigo($obj){
            $this->codigo = $obj;
        }

        public function get_codigo(){
            return $this->codigo;
        }

        public function set_categoria($obj){
            $this->categoria = $obj;
        }

        public function get_categoria(){
            return $this->categoria;
        }
    }


?>