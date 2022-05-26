<?php 

    class CarroDTO{
        private $codigo;
        private $modelo;
        private $marca;
        private $ano;
        private $vendido;
        private $descricao;
        private $placa;
        private $preco;
        private $km;
        private $cambio;
        private $garantia_fabrica;

        public function set_codigo($obj){
            $this->codigo = $obj;
        }

        public function get_codigo(){
            return $this->codigo;
        }

        public function set_modelo($obj){
            $this->modelo = $obj;
        }

        public function get_modelo(){
            return $this->modelo;
        }

        public function set_marca($obj){
            $this->marca = $obj;
        }

        public function get_marca(){
            return $this->marca;
        }

        public function set_ano($obj){
            $this->ano = $obj;
        }

        public function get_ano(){
            return $this->ano;
        }

        public function set_vendido($obj){
            $this->vendido = $obj;
        }

        public function get_vendido(){
            return $this->vendido;
        }

        public function set_descricao($obj){
            $this->descricao = $obj;
        }

        public function get_descricao(){
            return $this->descricao;
        }

        public function set_placa($obj){
            $this->placa = $obj;
        }

        public function get_placa(){
            return $this->placa;
        }

        public function set_preco($obj){
            $this->preco = $obj;
        }

        public function get_preco(){
            return $this->preco;
        }

        public function set_km($obj){
            $this->km = $obj;
        }

        public function get_km(){
            return $this->km;
        }

        public function set_cambio($obj){
            $this->cambio = $obj;
        }

        public function get_cambio(){
            return $this->cambio;
        }

        public function set_garantia_fabrica($obj){
            $this->garantia_fabrica = $obj;
        }

        public function get_garantia_fabrica(){
            return $this->garantia_fabrica;
        }
    }



?>