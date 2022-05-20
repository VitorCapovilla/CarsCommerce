<?php 

    class produtoDTO{
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

        function set_codigo($x){
            $this->codigo = $x;
        }

        function get_codigo(){
            return $this->codigo;
        }

        function set_modelo($x){
            $this->modelo = $x;
        }

        function get_modelo(){
            return $this->modelo;
        }

        function set_marca($x){
            $this->marca = $x;
        }

        function get_marca(){
            return $this->marca;
        }

        function set_ano($x){
            $this->ano = $x;
        }

        function get_ano(){
            return $this->ano;
        }

        function set_vendido($x){
            $this->vendido = $x;
        }

        function get_vendido(){
            return $this->vendido;
        }

        function set_descricao($x){
            $this->descricao = $x;
        }

        function get_descricao(){
            return $this->descricao;
        }

        function set_placa($x){
            $this->placa = $x;
        }

        function get_placa(){
            return $this->placa;
        }

        function set_preco($x){
            $this->preco = $x;
        }

        function get_preco(){
            return $this->preco;
        }

        function set_km($x){
            $this->km = $x;
        }

        function get_km(){
            return $this->km;
        }

        function set_cambio($x){
            $this->cambio = $x;
        }

        function get_cambio(){
            return $this->cambio;
        }

        function set_garantia_fabrica($x){
            $this->garantia_fabrica = $x;
        }

        function get_garantia_fabrica(){
            return $this->garantia_fabrica;
        }
    }

?>