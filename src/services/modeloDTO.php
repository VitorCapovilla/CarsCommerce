<?php 

class modeloDTO{
    private $codigo;
    private $modelo;

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
}

?>