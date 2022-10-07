<?php 
    require_once('MarcaDTO.php');
    require_once('CategoriaDTO.php');

    class modelo{
        private $codigo;
        private $nome;
        private $marca;
        private $categoria;

        public function __construct(){
            $this->marca = new marca();
            $this->categoria = new categoria();
        }

        public function set_codigo($obj){
            $this->codigo = $obj;
        }

        public function get_codigo(){
            return $this->codigo;
        }

        public function set_nome_modelo($obj){
            $this->nome = $obj;
        }

        public function get_nome_modelo(){
            return $this->nome;
        }

        public function set_marca($obj){
            $this->marca = $obj;
        }

        public function get_marca(){
            return $this->marca;
        }

        public function set_categoria($obj){
            $this->categoria = $obj;
        }

        public function get_categoria(){
            return $this->categoria;
        }
    }

?>